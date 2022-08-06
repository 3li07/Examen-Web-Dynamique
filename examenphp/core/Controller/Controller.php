<?php
namespace core\Controller;

class Controller {
    protected $viewPath;
    protected $layout;

    public function render($view, $variables = [])
    {
        ob_start();
        extract($variables);
        require ($this->viewPath . str_replace('.',DIRECTORY_SEPARATOR,$view).'.php');
        $content = ob_get_clean();
        if(isset($_SESSION['auth'])){
            require($this->viewPath . $this->layout . '.php');
        } else {
            require($this->viewPath . 'layoutlog.php');
        }
    }
}