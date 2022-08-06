<?php 
namespace core\Formulaire;
/**
 * C est une classe de formulaire bootstrap comme classe
 */
class BootsrapForm extends Form {
    protected function surround($code_html)
    {
        return "<div class=\"form-group\">$code_html</div>";
    }

    /**
     * @param string nom du champ
     * @param string type du champ
     * @param string placeholder
     */
    public function input(string $name,string $label_name, string $type = "text", string $placeholder = "") 
    {
        $label = '<label>'.$label_name.'</label>';
        if($type ==='textarea'){
            $input = '<textarea class ="form-control form-control-user" name = "'.$name.'" required>'.$this->getValue($name).'</textarea>';
        } else {
            $input = '<input type ="'.$type.'" class ="form-control form-control-user" name = "'.$name.'" required placeholder ="'.$placeholder.'" value="'.$this->getValue($name).'">';
        }
        return $this->surround(
            $label.
            $input
        );
    }
    /**
     * @param string le nom que prendra le bouton submit
     */
    public function submit(string $value = "Valider", string $classe = "btn btn-primary")
    {
        return $this->surround("<button type=\"submit\" class =\"$classe\">$value</button>");
    }

    public function select($name, $label_name, $options)
    {
        $label = '<label>'.$label_name.'</label>';
        $input = '<select class="form-control" name="'.$name.'">';
        foreach($options as $k => $v){
            $attributes = '';
            if($k == $this->getValue($name)){
                $attributes = ' selected';
            }
            $input .= "<option value='$k'$attributes>$v</option>";
        }
        $input .= '</select>';
        return $this->surround(
            $label.
            $input
        );    
    }
}

?>