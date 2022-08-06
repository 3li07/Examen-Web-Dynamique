<?php
namespace App\Controller;

use app;
use core\UploadPhoto\UploadPhoto;

class EtudiantsController extends appController {
    public $message;
    public $messagepdp;

    public function index()
    {
        $etudiantTable = app::getInstance()->getTable('Etudiant');
        $etudiants = $etudiantTable->getList();
        $this->render('etudiants.index',compact('etudiants'));
    }

    public function add()
    {
        $this->render('etudiants.add');
    }
    public function save()
    {
        $error =false;
        $etudiantTable = app::getInstance()->getTable('Etudiant');
        if(!empty($_POST)){
            if($_POST['passwd'] != $_POST['passwd2']){
                $error =true;
                $this->message = '<div class="alert alert-danger">mot de passene correspond pas</div>';
            } else {
                $message = null;
            }
            if($error){
                $message = $this->message;
                $this->render('etudiants.add',compact('message'));
            }
            $date = date('YmdHis');
            $uploadPhoto = [];
            $uploadPhoto =  UploadPhoto::upload('url',$date);
            if($uploadPhoto['message'] != null){
                $messagepdp = $uploadPhoto['message'];
                $this->render('etudiants.add',compact('messagepdp'));
            }
            $result = $etudiantTable->create([
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'adresse' => $_POST['address'],
                'numero_matricule' => $_POST['matricule'],
                'niveau' => $_POST['niveau'],
                'groupe' => $_POST['groupe'],
                'dateDeNaissance' => $_POST['dtn'],
                'contact' => $_POST['tel'],
                'facebook' => $_POST['rs'],
                'genre' => $_POST['genre'],
                'etab_ant' => $_POST['etab'],
                'profil' => $uploadPhoto['filename'],
                'diplome' => $_POST['bacc']
            ]);
            $resutl2 = $etudiantTable->insertAuth([
                'email' => $_POST['email'],
                'mdp' => sha1($_POST['passwd'])
            ]);
            if($result && $resutl2){
                header('Location:http://localhost/examenphp/public/index.php?p=etudiants.index');
            }
        }
    }
    public function edit()
    {
        $etudiantTable = app::getInstance()->getTable('Etudiant');
        $etudiant = $etudiantTable->getById($_GET['id']);
        $this->render('etudiants.edit',compact('etudiant'));        
    }
    public function saveDataFrom()
    {
        $etudiantTable = app::getInstance()->getTable('Etudiant');
        if(!empty($_POST)){
            $date = date('YmdHis');
            $uploadPhoto = [];
            $uploadPhoto =  UploadPhoto::upload('url',$date);
            if($uploadPhoto['message'] != null){
                $messagepdp = $uploadPhoto['message'];
                $this->render('etudiants.edit',compact('messagepdp'));
            }

            $result = $etudiantTable->update($_GET['id'],[
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'adresse' => $_POST['address'],
                'numero_matricule' => $_POST['numero_matricule'],
                'niveau' => $_POST['classe'],
                'groupe' => $_POST['groupe'],
                'dateDeNaissance' => $_POST['dtn'],
                'contact' => $_POST['tel'],
                'facebook' => $_POST['rs'],
                'genre' => $_POST['genre'],
                'etab_ant' => $_POST['etab_ant'],
                'profil' => $uploadPhoto['filename'],
                'diplome' => $_POST['bacc']
            ]);
            if($result){
                header('Location:http://localhost/examenphp/public/index.php?p=etudiants.index');
            }
        }
    }
    public function show()
    {
        $etudiantTable = app::getInstance()->getTable('Etudiant');
        $etudiant = $etudiantTable->getById($_GET['id']);
        $this->render('etudiants.show',compact('etudiant'));
    }
    public function delete()
    {
        $etudiantTable = app::getInstance()->getTable('Etudiant');
        $result = $etudiantTable->delete($_POST['id']);
        if($result){
            header('Location:http://localhost/examenphp/public/index.php?p=etudiants.index');
            die();
        }
    }
}
