<?php 
namespace App\Model\Table;
use app;
use core\Table\Table;

class ProfesseurTable extends Table{
    public function getList()
    {
        return $this->query("SELECT * FROM professeurs");
    }
    public function getById($id)
    {
        return $this->query("SELECT * FROM professeurs WHERE id_prof =:id",false,['id' => $id]);
    }
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
        return $this->query("UPDATE professeurs SET $sql_part WHERE id_prof = ?",false,$attributes);
    }
    public function getModule($id)
    {
        return $this->query("SELECT code_module FROM modules Where id_prof = ?",true,[$id]);
    }
    public function delete($id)
    {
        $user = $_SESSION['auth'];
        $id_Table = explode('.',$user);
        $id_user = $id_Table[0];
        $professeurTable = app::getInstance()->getTable('Professeur');
        $professeur = $professeurTable->getById($id);
        $authTable =app::getInstance()->getTable('Auth');
        $authTable->deleteAuth($professeur->email);
        if($id_user == $id){

            $module = $this->query("SELECT id_module FROM modules WHERE id_prof = ?",false,[$id]);
            $this->query("DELETE FROM cours where id_module = ?",false,[$module->id_module]) .
            $this->query("DELETE FROM modules where id_prof = ?", false, [$id]) .
            $this->query("DELETE FROM professeurs WHERE id_prof = ?",false,[$id]);
            if(session_status() === PHP_SESSION_NONE){
                session_start();
            }
            session_destroy();
            header('Location:?p=auths.login');
        }
        $module = $this->query("SELECT id_module FROM modules WHERE id_prof = ?",false,[$id]);
        return $this->query("DELETE FROM cours where id_module = ?",false,[$module->id_module]) .
                $this->query("DELETE FROM modules where id_prof = ?", false, [$id]) .
                $this->query("DELETE FROM professeurs WHERE id_prof = ?",false,[$id]);
    }
}