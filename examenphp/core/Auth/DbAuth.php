<?php
namespace core\Auth;
use core\Database\MysqlDatabase;

class DbAuth {

    private $db;

    public function __construct(MysqlDatabase $db)
    {
        $this->db = $db;
    }

    public function getUserId()
    {
        if($this->logged()){
            return $_SESSION['auth'];
        }
        return false;
    }

    /**
     * @param $username
     * @param $password
     * @return boolean 
     */
    public function login($email, $password)
    {

        $auth = $this->db->prepareFetch("SELECT * FROM auth where email = :email",['email'=>$email]);
        $useretu= $this->db->prepareFetch("   SELECT id_eleve FROM etudiants WHERE email = ? ",[$email]);
        $userprof= $this->db->prepareFetch("   SELECT id_prof FROM professeurs WHERE email = ? ",[$email]);
        if($auth === false) {
            return null;
        }
            if($auth->mdp === sha1($password)){
                if(session_status() === PHP_SESSION_NONE){
                    session_start();
                }
                if(!empty($userprof->id_prof)){
                    $_SESSION['auth'] = $userprof->id_prof .'.'.'professeurs';
                } elseif (!empty($useretu->id_eleve)){
                    $_SESSION['auth'] = $useretu->id_eleve.'.'.'etudiants';
                }
                return $auth;  
            };
        return null;   
    }


    public function logged()
    {
        return isset($_SESSION['auth']);
    }
}