<?php

namespace App\Core;

use App\Interfaces\CrudDatabase;
use App\Core\Database;
use App\Statics\DatabaseStatic;
use App\Traits\ParameterType;

class BaseModel implements CrudDatabase
{
    use ParameterType;

    protected Database $db;
    protected $nameTable;
    protected $id;
    protected $allowField;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function create($data)
    {
        $sql = $this->prepareDataToInsert($data, DatabaseStatic::$SQL_INSERT_INTO_ID);
        $this->db->prepareStatement($sql);
        $this->bindToInsert($data);
        return $this->db->executeInsert();
    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        $sql = $this->replaceTableName(DatabaseStatic::$SQL_DELETE_BY_ID);
        $sql = $this->replaceId($sql);
        $this->db->prepareStatement($sql);
        $this->db->bindParameter("id", $id, $this->getTypeValuePDO($id));
        $this->db->executeSave();
    }

    public function findAll()
    {
        $sql = $this->replaceTableName(DatabaseStatic::$SQL_FIND_ALL);
        return $this->db->executeQuery($sql);
    }

    private function replaceTableName($sql)
    {
        return str_replace("%table_name%", $this->nameTable, $sql);
    }

    private function prepareDataToInsert($data, $sql)
    {
        $column = "";
        $values = "";
        for ($i = 0; $i < sizeof($this->allowField); $i++) {
            if ($data[$this->allowField[$i]] != null) {
                if ($i == (sizeof($this->allowField) - 1)) {
                        $column .= $this->allowField[$i];
                        $values .= ':' . $this->allowField[$i];
                } else {
                    $column .= $this->allowField[$i] . ',';
                    $values .= ':' . $this->allowField[$i] . ',';
                }
            }
        }
        $sql = $this->replaceTableName($sql);
        $sql = $this->prepareColumn($sql, $column);
        $sql = $this->prepareValues($sql, $values);
        return $sql;
    }

    private function prepareColumn($sql, $column)
    {
        return str_replace("%col%", $column, $sql);
    }
    private function prepareValues($sql, $column)
    {
        return str_replace("%val%", $column, $sql);
    }

    private function replaceId($sql)
    {
        return str_replace("%id%", $this->id, $sql);
    }


    private function bindToInsert($data)
    {
        $value = null;
        for ($i = 0; $i < sizeof($this->allowField); $i++) {
            if ($data[$this->allowField[$i]] != null) {
                $value = $data[$this->allowField[$i]];
                $this->db->bindParameter($this->allowField[$i], $value, $this->getTypeValuePDO($value));
            }
        }
    }

    public function deleteWhere($columnName, $val)
    {
        $sql = $this->replaceTableName(DatabaseStatic::$SQL_DELETE_BY_COL_NAME);
        $sql = $this->prepareColumn($sql, $columnName);
        $this->db->prepareStatement($sql);
        $this->db->bindParameter("id", $val, $this->getTypeValuePDO($val));
        $this->db->executeSave();
    }

    public function findWhere($columnName, $val)
    {
        $sql = $this->replaceTableName(DatabaseStatic::$SQL_FIND_ONE_WHERE);
        $sql = $this->prepareColumn($sql, $columnName);
        $sql = $this->prepareValues($sql, ":" . $columnName);
        $this->db->prepareStatement($sql);
        $this->db->bindParameter(":" . $columnName, $val, $this->getTypeValuePDO($val));
        return $this->db->execute();
    }
}
