<?php
namespace Engine;

class Db extends \mysqli
{
    /**
     * @var Db
     */
    private static $_instance;

    private $_lastQuery;
    private $_queriesCount = 0;
    private $_queriesTime = 0;

    function getMicrotime()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float) $usec + (float) $sec);
    }

    public function __construct($host = null, $username = null, $passwd = null, $dbname = null, $port = null, $socket = null)
    {
        @parent::__construct($host, $username, $passwd, $dbname, $port, $socket);
        if (mysqli_connect_errno())
            die(mysqli_connect_errno() . ' ' . mysqli_connect_error());

        self::$_instance = $this;
    }

    public static function getInstance()
    {
        return self::$_instance;
    }

    /**
     * низкоуровневая функция, вызывает оригинальную mysqli::query
     * @return \mysqli_result
     */
    public function query($query)
    {
        $this->_lastQuery = $query;
        $this->_queriesCount++;
        $startTime = $this->getMicrotime();

        $res = parent::query($query);

        if ($res === false) die($query);

        $this->_queriesTime += $this->getMicrotime() - $startTime;
        return $res;
    }

    public function getInsertId()
    {
        return $this->insert_id;
    }

    public function getAffectedRows()
    {
        return $this->affected_rows;
    }

    public function getAll($query)
    {
        $A = false;
        if ($res = $this->query($query))
        {
            $A = $res->fetch_all(MYSQLI_ASSOC);
            if (!is_array($A)) $A = array();

            $res->free();
        }
        return $A;
    }

    public function getAssoc($query)
    {
        $A = false;
        if ($res = $this->query($query))
        {
            $A = array();
            if ($res->field_count == 2)
            {
                while ($row = $res->fetch_row())
                    $A[$row[0]] = $row[1];
            }
            else
            {
                while ($row = $res->fetch_assoc())
                {
                    $key = array_shift($row);
                    $A[$key] = $row;
                }
            }

            $res->free();
        }
        return $A;
    }

    public function getCol($query)
    {
        $A = false;
        if ($res = $this->query($query))
        {
            $A = array();
            while ($row = $res->fetch_row())
                $A[] = $row[0];

            $res->free();
        }
        return $A;
    }

    public function getRow($query)
    {
        $A = false;
        if ($res = $this->query($query))
        {
            $A = array();
            if ($row = $res->fetch_assoc())
                $A = $row;

            $res->free();
        }
        return $A;
    }

    public function getOne($query)
    {
        $A = false;
        if ($res = $this->query($query))
        {
            if ($row = $res->fetch_row())
                $A = $row[0];
            else
                $A = null;

            $res->free();
        }
        return $A;
    }

    public function getCount($table, $where = false)
    {
        $query = "SELECT count(*) FROM `" . $table . "`";
        if ($where) $query .= " WHERE " . $where;
        return $this->getOne($query);
    }


    public function insertRow($fieldValues, $table, $useReplace = false, $onlyFields = null)
    {
        if (!is_array($fieldValues)) $fieldValues = array();

        $fields = array();
        $values = array();
        foreach ($fieldValues as $field => $value)
        {
            if (is_array($onlyFields) and !in_array($field, $onlyFields)) continue;
            if (is_array($value) || is_object($value)) continue;
            $fields[] = '`' . $field . '`';
            $sqlValue = ($value === null) ? 'NULL' : '"' . $this->escape_string($value) . '"';
            $values[] = $sqlValue;
        }
        $fields = implode(",\n ", $fields);
        $values = implode(",\n ", $values);

        if ($useReplace) $query = "REPLACE";
        else $query = "INSERT";

        $query .= " INTO " . $table . " \n(" . $fields . ") \nVALUES \n(" . $values . ");";

        $result = $this->query($query);

        return ($result) ? $this->insert_id : false;
    }

    /**
     * @param  $fieldValues
     * @param  $table
     * @param  $keyField
     * @param  $keyValue
     * @return int affected rows
     */
    public function updateRow($fieldValues, $table, $keyField, $keyValue)
    {
        if (!is_array($fieldValues) || empty($fieldValues)) return 0;

        $keyCondition = '`' . $keyField . '`="' . $this->escape_string($keyValue) . '"';
        $items = array();
        foreach ($fieldValues as $field => $value)
        {
            if (is_array($value) || is_object($value)) $sqlValue = serialize($value);
            elseif (is_null($value)) $sqlValue = 'NULL';
            else $sqlValue = "'" . $this->escape_string($value) . "'";

            $items[] = "`" . $field . "` = " . $sqlValue;
        }
        $items = implode(",\n ", $items);
        $query = "UPDATE " . $table . " \nSET\n " . $items . " \nWHERE " . $keyCondition;

        $this->query($query);

        return $this->affected_rows;
    }

    /**
     * Безопасное удаление записей в базе - удалённая запись сериализуется и записывается в таблицу deleted
     * @param string $tableName записывается в поле deleted.TableName
     * @param string $recordId записывается в поле deleted.RecordID
     * @param string $fullQuery можно переопределить запрос на удаление своим собственным (если нужны хитрые условия)
     *               тогда первые два параметра записываются в табилцу deleted только для справки (не влияют на запрос DELETE)
     * @return bool
     */
    public function deleteRow($tableName, $keyField, $keyValue, $fullQuery = false)
    {
        //Используем либо явно переданный запрос на удаление, либо генерируем свой запрос на основе переданных параметров
        if ($fullQuery) $delQuery = $fullQuery;
        else $delQuery = "DELETE FROM `" . $tableName . "` WHERE `" . $keyField . "` = '" . $this->escape_string($keyValue) . "'";

        //Сформируем запрос на выборку данных удаляемой записи(ей)
        $selectQuery = "SELECT * " . substr($delQuery, 6);
        $data = $this->getAll($selectQuery);
        if ($data)
        {
            //Если были найдены какие-то данные в базе, сериализуем их!
            foreach ($data as $row)
            {
                $json = json_encode($row);
                $insertData = array('TableName' => $tableName,
                                    'RecordID' => $keyValue,
                                    'Query' => $delQuery,
                                    'JSON' => $json,
                                    'CreatedBy' => User::getId());

                //Сохраняем сериализованные данные в таблице deleted
                $res = $this->insertRow($insertData, 'deleted');
                if (!$res)
                {
                    //Если безопасно сохранить данные не удалось, прерываем процесс удаления
                    echo "Can't record deleted data";
                    return false;
                }
            }
        }

        //Физически удаляем требуюемую запись
        return $this->query($delQuery);
    }

    /*******************************
     *
     *   Сервисные функции
     *
     */
    public function getQueriesCount()
    {
        return $this->_queriesCount;
    }

    public function getQueriesTime()
    {
        return $this->_queriesTime;
    }

    public function getErrorDescription()
    {
        return '<p>' . gnGetHtmlMsgError(htmlspecialchars($this->error), 'span', false)
               . '<br><pre>' . gnGetHtmlMsgBad(htmlspecialchars($this->_lastQuery) . '</pre>', 'span')
               . '</p>';
    }
}
