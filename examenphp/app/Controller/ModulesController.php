<?php
namespace App\Controller;

use app;
use core\Formulaire\BootsrapForm;


class ModulesController extends appController {
    
    public function index()
    {
        $modules = app::getInstance()->getTable('Module')->getList();
        $this->render('modules.index',compact('modules'));
    }

    public function category()
    {
        
    }

    public function show()
    {
        $moduleTable = app::getInstance()->getTable('Module');
        $module = $moduleTable->getInfoById($_GET['id']);
        $cours = $moduleTable->getCoursById($_GET['id']);
        if(empty($cours)) {
            $message = '<div class="col-md-5">
                            <div class="card" style="width: 25rem;">
                                <div class="card-body">
                                    <h5><em>Ce module n\'as pas encore de cours</em></h5>
                                </div>
                            </div>
                        </div>';
        } else {
            $message = null;
        }
        $this->render('modules.show',compact('module','cours','message'));       
    }

    public function add()
    {
        $professeurTable = app::getInstance()->getTable('Professeur');
        
        $professeurs = $professeurTable->extractList('id_prof', 'prenom');
        $form = new BootsrapForm();    
        $this->render('modules.ajouter', compact('form','professeurs'));       
    }
    public function edit()
    {
        $moduleTable = app::getInstance()->getTable('Module');
        $professeurTable = app::getInstance()->getTable('Professeur');
        $id = $_GET['id'];
        $module = $moduleTable->getById($_GET['id']);
        $professeurs = $professeurTable->extractList('id_prof', 'prenom');
        $form = new BootsrapForm($module);
        $this->render('modules.edit',compact('module','professeurs','form','id'));
    }
    public function saveDataFrom()
    {
        $moduleTable = app::getInstance()->getTable('Module');
        if(!empty($_POST)){
            $result = $moduleTable->update($_POST['id'],[
                'code_module'=> $_POST['code_module'],
                'nom_module'=>$_POST['nom_module'],
                'nombre_heure' => $_POST['nombre_heure'],
                'id_prof' => $_POST['id_prof']
                ]
            );
            if($result){
                header('Location:http://localhost/examenphp/public/index.php?p=modules.index');
            }
        }
    }

    public function save()
    {
        $moduleTable = app::getInstance()->getTable('Module');
        if(!empty($_POST)){
            $result = $moduleTable->create([
                'code_module'=> $_POST['code_module'],
                'nom_module'=>$_POST['nom_module'],
                'nombre_heure' => $_POST['nombre_heure'],
                'id_prof' => $_POST['id_prof']
                ]
            );
            if($result){
                header('Location:http://localhost/examenphp/public/index.php?p=modules.index');
            }
        }
        
    }
    public function delete()
    {
        $moduleTable = app::getInstance()->getTable('Module');
        if(!empty($_POST)){
            $result = $moduleTable->delete($_POST['id']);
            if($result){
                header('Location:http://localhost/examenphp/public/index.php?p=modules.index');
            }
        }
    }
    public function showCour()
    {
        $moduleTable = app::getInstance()->getTable('Module');
        $cour = $moduleTable->getCour($_GET['id']);
        $module = $moduleTable->getInfoById($cour->id_module);
        $this->render('modules.cours.show', compact('module','cour'));
    }
    public function editCour()
    {
        $moduleTable = app::getInstance()->getTable('Module');
        $cour = $moduleTable->getCour($_GET['id']);
        $form = new BootsrapForm($cour);
        $this->render('modules.cours.edit', compact('form'));
    }
    public function editCourValidation()
    {
        $moduleTable = app::getInstance()->getTable('Module');
        if(!empty($_POST)){
            $result = $moduleTable->updateCour($_POST['id'],[
                'titre'=> $_POST['titre'],
                'contenu'=>$_POST['contenu']
                ]
            );
            if($result){
                header('Location:http://localhost/examenphp/public/index.php?p=modules.cours.show&id='.$_POST['id'].'');
            }
        }
    }
    public function addCour()
    {
        $id_module = $_GET['id'];
        $form = new BootsrapForm($_POST);    
        $this->render('modules.cours.ajouter', compact('form','id_module'));       
    }
    public function saveCour()
    {
        $moduleTable = app::getInstance()->getTable('Module');
        if(!empty($_POST)){
            $result = $moduleTable->createCour([
                'titre'=> $_POST['titre'],
                'contenu'=>$_POST['contenu'],
                'id_module'=>$_POST['id_module']
                ]
            );
            if($result){
                header('Location:http://localhost/examenphp/public/index.php?p=modules.show&id='.$_POST['id_module'].'');
            }
        }
    }
    public function deleteCour()
    {
        $moduleTable = app::getInstance()->getTable('Module');
        if(!empty($_POST)){
            $result = $moduleTable->deleteCour($_POST['id']);
            if($result){
                header('Location:http://localhost/examenphp/public/index.php?p=modules.show&id='.$_POST['id_module'].'');
            }
        }
    }
}