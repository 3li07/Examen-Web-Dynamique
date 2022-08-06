<?php

namespace core\Formulaire;
/**
 * c'est une classe d un simple formulaire
 */
class Form {
    /**
     * @var array a traiter
     */
    protected $data;
    /**
     * @var string le balise qui entoure le formulaire
     */
    public $surround = 'p';

    /**
     * @param tableau qui contient les donner 
     */
    public function __construct($data = [])
    {
        $this->data = $data;
    }
    protected function getValue($index)
    {
        if(isset($this->data)){
            if(is_object($this->data)){
                return $this->data->$index;
            }else {
                return isset($this->data[$index])? $this->data[$index] : null;
            }
            }
    }

    protected function surround($code_html)
    {
        return "<{$this->surround}>$code_html</{$this->surround}?>";
    }

    /**
     * @param string nom du champ
     * @param string type du champ
     * @param string placeholder
     */
    public function input(string $name,string $label_name, string $type ="text", string $placeholder = "") 
    {
        return $this->surround('<input type ="'.$type.'" name = "'.$name.'" placeholder ="'.$placeholder.'" value="'.$this->getValue($name).'"');
    }

    /**
     * @param string le nom que prendra le bouton submit
     */
    public function submit(string $value = "Valider")
    {
        return $this->surround("<button type=\"submit\">$value</button>");
    }
}

?>