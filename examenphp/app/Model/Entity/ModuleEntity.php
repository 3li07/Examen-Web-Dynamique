<?php 
namespace App\Model\Entity;
use core\Entity\Entity;

class ModuleEntity extends Entity{
    public function getUrl()
    {
        return 'index.php?p=modules.show&id='.$this->id;
    }
    public function getExtr()
    {
        $html = '<p>'.substr($this->contenu,0,100).'...</p>';
        return $html;
    }
}