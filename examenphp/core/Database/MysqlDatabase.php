<?php 
namespace core\Database;
use PDO;


class MysqlDatabase extends Database {
        private $db_name;
        private $db_host;
        private $db_user;
        private $db_password;
        private $pdo;

    public function __construct($db_name, $db_host ='127.0.0.1',$db_user = 'root', $db_password = '')
    {
        $this->db_name = $db_name;
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
    }

    private function getPDO()
    {
        if($this->pdo === null){
            $this->pdo = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name.'',''.$this->db_user.'',''.$this->db_password.'',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
        return $this->pdo;
    }
    /**
     * utiliser pour faire une requete sans retour de la base de donne sans parametre
     */
    public function query($statement)
    {
        return $this->getPDO()->query($statement);
    }
    /**
     * maka donnne en objet
     */
    public function prepareFetchObject($statement, $parametre, $class)
    {
        $query = $this->getPDO()->prepare($statement);
        $query->execute($parametre);
        $data = $query->fetchObject($class);
        return $data;
    }
    /**
     * c est comme query du PDO combiner avec fetchall
     * @param string $statement la requete sql utiliser 
     * @param string $class_name la classe que l'objet aura utiliser
     * @return object de class $class_name
     */
    public function queryFetchall($statement, $class_name = null)
    {
        if($class_name === null){
            return $this->getPDO()->query($statement)->fetchAll(PDO::FETCH_OBJ);
        }
        return $this->getPDO()->query($statement)->fetchAll(PDO::FETCH_CLASS, $class_name);
        
    }
    /**
     * c est comme query du PDO combiner avec fetch
     * @param string $statement la requete sql utiliser 
     * @param string $class_name la classe que l'objet aura utiliser
     * @return object de class $class_name
     */
    public function queryFetch($statement)
    {
        return $this->getPDO()->query($statement)->fetch(PDO::FETCH_OBJ);
    }
    /**
     * prepare et execute une requete sql avec un parametre
     * 
     */
    public function prepare(string $statement,array $parametre = [])
    {
        return $this->getPDO()->prepare($statement)->execute($parametre);
    }
    /**
     * prepare une requete puis execute et prend le donnee comme fetch
     * @param string $statement la requete sql utiliser 
     * @param array $parametre parametre 
     * @return object de class $class_name
     */
    public function prepareFetch($statement,array $parametre = [])
    {
        $requete = $this->getPDO()->prepare($statement);
        $requete->execute($parametre);
        return $requete->fetch(PDO::FETCH_OBJ);
    }
        /**
     * prepare une requete puis execute et prend les donnees comme fetchall
     * @param string $statement la requete sql utiliser 
     * @param array parametre utiliser
     * @param string $class_name la classe que l'objet aura utiliser
     * @return object de class $class_name
     */
    public function prepareFetchall($statement,array $parametre = [], $class_name = null)
    {
        if($class_name === null){
            $requete = $this->getPDO()->prepare($statement);
            $requete->execute($parametre);
            return $requete->fetchall(PDO::FETCH_OBJ);  
        }
        $requete = $this->getPDO()->prepare($statement);
        $requete->execute($parametre);
        return $requete->fetchall(PDO::FETCH_CLASS, $class_name);
    }  
}