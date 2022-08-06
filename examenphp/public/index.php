<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
use core\Auth\DbAuth;
use App\Controller\AuthsController;
use App\Controller\ModulesController;
use App\Controller\EtudiantsController;
use App\Controller\ProfesseursController;

define ('ROOT', dirname(__DIR__));
require ROOT .'/app/app.php';
app::load();

if(isset($_GET['p'])){
    $p = $_GET['p'];
} else {
    $p = 'modules.index';
}
$AuthsController = new AuthsController;
if($p==='auths.singup'){
    $AuthsController->SingUp();
} elseif($p === 'auths.login'){
    $AuthsController->login();
}

$auth = new DbAuth(app::getInstance()->getDb());
if($auth->logged())
{    
    $ModulesController = new ModulesController;
    $ProfesseursController = new ProfesseursController;
    $EtudiantsController = new EtudiantsController;

    if($p === 'modules.index'){
        $ModulesController->index();
    } elseif($p === 'modules.show'){
        $ModulesController->show();
    }elseif($p === 'modules.add'){
        $ModulesController->add();
    }elseif($p === 'modules.edit'){
        $ModulesController->edit();
    } elseif($p === 'modules.categorie'){
        $ModulesController->category();
    } elseif($p === 'modules.save'){
        $ModulesController->save();
    } elseif($p === 'modules.validate'){
        $ModulesController->saveDataFrom();
    } elseif($p === 'modules.delete'){
        $ModulesController->delete();
    } elseif($p === 'modules.cours.show'){
        $ModulesController->showCour();
    } elseif($p === 'modules.cours.edit'){
        $ModulesController->editCour();
    } elseif($p === 'modules.cours.validate'){
        $ModulesController->editCourValidation();
    } elseif($p === 'modules.cours.add'){
        $ModulesController->addCour();
    } elseif($p === 'modules.cours.delete'){
        $ModulesController->deleteCour();
    } elseif($p === 'modules.cours.save'){
        $ModulesController->saveCour();
    } elseif($p === 'professeurs.index'){
        $ProfesseursController->index();
    } elseif($p === 'professeurs.show'){
        $ProfesseursController->show();
    } elseif($p === 'professeurs.add'){
        $ProfesseursController->add();
    } elseif($p === 'professeurs.save'){
        $ProfesseursController->save();
    } elseif($p === 'professeurs.edit'){
        $ProfesseursController->edit();
    } elseif($p === 'professeurs.saveData'){
        $ProfesseursController->saveDataFrom();
    } elseif($p === 'professeurs.delete'){
        $ProfesseursController->delete();
    } elseif($p === 'etudiants.add'){
        $EtudiantsController->add();
    } elseif($p === 'etudiants.save'){
        $EtudiantsController->save();
    } elseif($p === 'etudiants.saveData'){
        $EtudiantsController->saveDataFrom();
    } elseif($p === 'etudiants.edit'){
        $EtudiantsController->edit();
    } elseif($p === 'etudiants.index'){
        $EtudiantsController->index();
    } elseif($p === 'etudiants.show'){
        $EtudiantsController->show();
    } elseif($p === 'etudiants.delete'){
        $EtudiantsController->delete();
    }  elseif($p === 'auths.login'){
        $AuthsController->login();
    } elseif($p==='auths.deconnect'){
        $AuthsController->singOut();
    }  else {
        app::getInstance()->notFound();
    }
    
} else {
    $AuthsController->login();
}

