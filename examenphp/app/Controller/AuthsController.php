<?php
namespace App\Controller;

use app;
use core\Auth\DbAuth;
use core\Formulaire\BootsrapForm;

class AuthsController extends appController {
    public function login()
    {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        $errors = false;
        if(!empty($_POST)){
            $errors = false;
            $auth = new DbAuth(app::getInstance()->getDb());
            $authTable = app::getInstance()->getTable('Auth');
            $auths = $authTable->getemail($_POST['email']);
            if($auths->email === $_POST['email']){
                if($auth->login($_POST['email'],$_POST['password'])){
                    header('Location:?p=modules.index');
                    exit();
                } else {
                    $errors = true;
                }
            } else {
                $errors = true;
            }
        }
        $form = new BootsrapForm($_POST);
        $this->render('auths.login', compact('form', 'errors'));
        die();
    }
    public function singOut()
    {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        session_destroy();
        header('Location:?p=auths.login');
        die();
    }
    public function singUp()
    {
        $erreur = null;
        if(!empty($_POST)){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $type = $_POST['type'];
            $email = $_POST['email'];
            $password1 = sha1($_POST['password1']);
            $password2 = sha1($_POST['password2']);
            //verifiaction si le compte existe déjà 
            $authTable = app::getInstance()->getTable('Auth');
            $user = $authTable->verif($email); 
            if(empty($user)) {
                //verififvation si les deux mot de passe sont égaaux
                if($password1 != $password2){
                    $erreur = "<div class=\"alert alert-danger\">les deux mots de passe ne sont pas égeaux !</div>";
                    $this->render('auths.register', compact('erreur'));
                    die();    
                } else {
                    //insertion table auth
                    $password = $password1;
                    $authTable->insertAuth(['email' => $email, 'mdp' => $password]);
                    
                    //insertion aux tables prod ou étudaintans
                    $authTable->ProfOrEtuInsert($type, ['email' => $email, 'nom' => $nom, 'prenom' => $prenom]);
                    $auth = new DbAuth(app::getInstance()->getDb());
                    if($auth->login($_POST['email'],$_POST['password1'])){
                        header('Location:?p=modules.index');
                        exit();
                    } else {
                        echo 'Pas connecter';
                    }
        
                }
            }else {
                $erreur = "<div class=\"alert alert-danger\">ce mail est déjà utilisé par un autre utilisateur</div>";
                $this->render('auths.register', compact('erreur'));
                die();    
            }
        } else {
            $this->render('auths.register', compact('erreur')); 
            die();
        }
    }
}