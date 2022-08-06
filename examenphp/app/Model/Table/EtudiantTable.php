<?php 
namespace App\Model\Table;
use app;
use core\Table\Table;

class EtudiantTable extends Table{
    public function getList()
    {
        return $this->query("SELECT * FROM etudiants");
    }
    public function getById($id)
    {
        return $this->query("SELECT * FROM etudiants WHERE id_eleve = :id",false,['id' => $id]);
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
        return $this->query("UPDATE etudiants SET $sql_part WHERE id_eleve = ?",false,$attributes);
    }
    public function delete($id)
    {
        $user = $_SESSION['auth'];
        $id_Table = explode('.',$user);
        $id_user = $id_Table[0];
        $etudiantTable = app::getInstance()->getTable('Etudiant');
        $etudiant = $etudiantTable->getById($id);
        $authTable =app::getInstance()->getTable('Auth');
        $authTable->deleteAuth($etudiant->email);
        if($id_user == $id){

            $this->query("DELETE FROM etudiants where id_eleve = ?", false, [$id]);
            if(session_status() === PHP_SESSION_NONE){
                session_start();
            }
            session_destroy();
            header('Location:?p=auths.login');
        }

        return $this->query("DELETE FROM etudiants where id_eleve = ?", false, [$id]);
    }
}