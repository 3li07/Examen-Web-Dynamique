<?php 
namespace App\Model\Table;
use core\Table\Table;

class AuthTable extends Table{
    public function getemail($email)
    {
        return $this->query("SELECT * FROM auth WHERE email = ?",false,[$email]);
    }
    public function ProfOrEtuInsert($table, array $parametre)
    {
        if($table === 'professeurs'){
            return $this->query("INSERT INTO professeurs SET profil = 'default.jpg', email = :email , nom_prof = :nom, prenom = :prenom",false,$parametre);
        }
        elseif($table === 'etudiants'){
            return $this->query("INSERT INTO etudiants SET profil = 'default.jpg', email = :email , nom = :nom, prenom = :prenom",false,$parametre);
        }
    } 
    public function verif($email)
    {
        return $this->query("SELECT * FROM auth WHERE email = ?",true,[$email]);

    }
    public function deleteAuth($email)
    {
        return $this->query("DELETE FROM auth WHERE email = ?",false,[$email]);
    }
}