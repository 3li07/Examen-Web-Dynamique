<?php

namespace core\Table;

use core\Database\MysqlDatabase;



class Table{
    protected $table;
    protected $db;

    public function __construct(MysqlDatabase $db)
    {
        $this->db = $db;
        if(is_null($this->table)){
            $parts = explode('\\',get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table','',$class_name).'s');
        }
    }

    /**
     * maka donner rehetraretra any anaty table an lay base de donne
     */
    public function all()
    {
        return $this->db->queryFetchall('SELECT * From '. $this->table, str_replace('Table','Entity',get_class($this)));
    }

    /**
     * Maka donne any anty base de donnee
     * @param string $statement requete sql utilise 
     * @param bool $all true or false. c'est pour determiner si on veut faire fetchall (true) ou fetch(false)
     * @param array $parametre les parametre du requete
     */
    public function query($statement,bool $all = true, array $parametre = null)
    {
        if(strpos($statement,"UPDATE") === 0 || strpos($statement, "DELETE") === 0 || strpos($statement, "INSERT") === 0){
            return $this->db->prepare($statement, $parametre);
        } else {
            if($all){
                if($parametre){
                    return $this->db->prepareFetchall($statement,$parametre, str_replace('Table','Entity',get_class($this)));
                } else {
                    return $this->db->queryFetchall($statement,str_replace('Table','Entity',get_class($this)));
                }
            } else {
                if($parametre){
                    return $this->db->prepareFetch($statement,$parametre);
                } else {
                    return $this->db->queryFetch($statement);
                }
            }
            }
    }

    public function getById($id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id=:id",false,['id' => $id]);
    }
    /**
     * mis a jour
     * @param $id 
     * @param $fields les champs a modifier
     */
    public function update($id,$fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = "$id";
        $sql_part = implode(',', $sql_parts);
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?",false,$attributes);
    }
    public function create($fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $sql_part = implode(',', $sql_parts);
        return $this->query("INSERT INTO {$this->table} SET $sql_part",false,$attributes);
    }
    public function delete($id)
    {
        return $this->query("DELETE FROM {$this->table} where id = ?", false, [$id]);
    }
    public function extractList($key, $value)
    {
        $records = $this->all();
        $return = [];
        foreach ($records as $v){
            $return[$v->$key] = $v->$value;
        }
        return $return;
    }
    public function insertAuth( array $fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $sql_part = implode(',', $sql_parts);
        return $this->query("INSERT INTO auth SET $sql_part",false,$attributes);
    }

}   