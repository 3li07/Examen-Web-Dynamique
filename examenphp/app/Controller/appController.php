<?php
namespace App\Controller;


use core\Controller\Controller;

class appController extends Controller {
    protected $layout = 'layout';

    public function __construct()
    {
        $this->viewPath = ROOT.'/app/Views/';
    }
}