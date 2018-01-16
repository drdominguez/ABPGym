<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");

class ContactoController extends BaseController{


    public function __construct() {
        parent::__construct();
    }

    public function contactoListar() 
    {
        
        $this->view->render("contacto", "contactoSHOWCURRENT");
    }
}