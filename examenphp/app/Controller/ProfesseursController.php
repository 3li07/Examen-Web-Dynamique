<?php
namespace App\Controller;

use app;
use core\UploadPhoto\UploadPhoto;

class ProfesseursController extends appController {
    public function index()
    {
        $professeurTable = app::getInstance()->getTable('Professeur');
        $professeurs = $professeurTable->getList();
        $this->render('professeurs.index',compact('professeurs'));
    }

    public function add()
    {
        $this->render('professeurs.add');
    }
    public function edit()
    {
        $professeurTable = app::getInstance()->getTable('Professeur');
        $professeur = $professeurTable->getById($_GET['id']);
        $this->render('professeurs.edit',compact('professeur'));
    }
    public function show()
    {
        $mdl = [];
        $professeurTable = app::getInstance()->getTable('Professeur');
        $professeur = $professeurTable->getById($_GET['id']);
        $module = $professeurTable->getModule($_GET['id']);
        foreach ($module as $mod){
            $mdl[] = $mod;
        }
        if(!empty($mdl)){
            $nombre = count($mdl);
        } else {
            $nombre = 0;
        }
        $this->render('professeurs.show',compact('professeur', 'nombre'));
    }
    public function saveDataFrom()
    {
        $professeurTable = app::getInstance()->getTable('Professeur');
        if(!empty($_POST)){
            $date = date('YmdHis');
            $uploadPhoto = [];
            $uploadPhoto =  UploadPhoto::upload('url',$date);
            if($uploadPhoto['message'] != null){
                $messagepdp = $uploadPhoto['message'];
                $this->render('professeurs.edit',compact('messagepdp'));
            }
            $result = $professeurTable->update($_GET['id'],[
                'nom_prof' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'adresse' => $_POST['address'],
                'dateDeNaissance' => $_POST['dtn'],
                'contact' =>(int)$_POST['tel'],
                'facebook' => $_POST['rs'],
                'genre' => $_POST['genre'],
                'profil' => $uploadPhoto['filename'],
            ]);
            if($result){
                header('Location:http://localhost/examenphp/public/index.php?p=professeurs.index');
            }
        }
    }
    public function save()
    {
        $professeurTable = app::getInstance()->getTable('Professeur');
        if(!empty($_POST)){
            if($_POST['passwd'] != $_POST['passwd2']){
                $error =true;
                $this->message = '<div class="alert alert-danger">mot de passene correspond pas</div>';
            } else {
                $message = null;
            }
            if($error){
                $message = $this->message;
                $this->render('professeurs.add',compact('message'));
            }
            $date = date('YmdHis');
            $uploadPhoto = [];
            $uploadPhoto =  UploadPhoto::upload('url',$date);
            if($uploadPhoto['message'] != null){
                $messagepdp = $uploadPhoto['message'];
                $this->render('professeurs.edit',compact('messagepdp'));
            }
            $result = $professeurTable->create([
                'nom_prof' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'adresse' => $_POST['address'],
                'dateDeNaissance' => $_POST['dtn'],
                'contact' =>(int)$_POST['tel'],
                'facebook' => $_POST['rs'],
                'genre' => $_POST['genre'],
                'profil' => $uploadPhoto['filename'],
            ]);
            $resutl2 = $professeurTable->insertAuth([
                'email' => $_POST['email'],
                'mdp' => sha1($_POST['passwd'])
            ]);
            if($result && $resutl2){
                header('Location:http://localhost/examenphp/public/index.php?p=professeurs.index');
            }
        }

    }
    public function delete()
    {
        $professeurTable = app::getInstance()->getTable('Professeur');
        if(!empty($_POST)){
            $result = $professeurTable->delete($_POST['id']);
            if($result){
                header('Location:http://localhost/examenphp/public/index.php?p=professeurs.index');
            }
        }
    }


}