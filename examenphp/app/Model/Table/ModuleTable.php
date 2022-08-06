<?php 
namespace App\Model\Table;
use core\Table\Table;

class ModuleTable extends Table{
    public function getList()
    {
        return $this->query("SELECT modules.id_module as id, modules.code_module as code_module, modules.nom_module as nom_module, modules.nombre_heure as nombre_heure, professeurs.id_prof as id_prof, professeurs.nom_prof as nom_prof, professeurs.prenom as prenom
                             FROM modules JOIN professeurs
                             ON modules.id_prof= professeurs.id_prof ");
    }
    public function getById($id)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id_module=:id",false,['id' => $id]);
    }
    public function getInfoById($id)
    {
        return $this->query("SELECT modules.id_module as id_module, modules.code_module as code_module, modules.nom_module as nom_module, modules.nombre_heure as nombre_heure, professeurs.id_prof as id_prof, professeurs.nom_prof as nom_prof, professeurs.prenom as prenom
                             FROM modules JOIN professeurs
                             ON modules.id_prof= professeurs.id_prof
                             WHERE modules.id_module = ? ",false,[$id]);
    }
     /**
     * mis a jour
     * @param $id 
     * @param $fields les champs a modifier
     */
    public function update($id, $fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = "$id";
        $sql_part = implode(',', $sql_parts);
        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id_module = ?",false,$attributes);
    }
    public function delete($id)
    {
        return $this->query("DELETE FROM cours where id_module = ?",false,[$id]) .
                $this->query("DELETE FROM {$this->table} where id_module = ?", false, [$id]);
    }
    public function deleteCour($id)
    {
        return $this->query("DELETE FROM cours where id_cours = ?",false,[$id]);
    }
    public function getCoursById($id)
    {
        return $this->query("SELECT * FROM cours c JOIN modules m ON m.id_module = c.id_module WHERE m.id_module = ?",True,[$id]);
    }
    public function getCour($id)
    {
        return $this->query('SELECT * FROM cours WHERE id_cours = ? ',false, [$id]);
    }
    public function updateCour($id,$fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $attributes[] = "$id";
        $sql_part = implode(',', $sql_parts);
        return $this->query("UPDATE cours SET $sql_part WHERE id_cours = ?",false,$attributes);
    }
    public function createCour($fields)
    {
        $sql_parts = [];
        $attributes = [];
        foreach ($fields as $k => $v){
            $sql_parts[] = "$k = ?";
            $attributes[] = $v;
        }
        $sql_part = implode(',', $sql_parts);
        return $this->query("INSERT INTO cours SET $sql_part",false,$attributes);
    }

}