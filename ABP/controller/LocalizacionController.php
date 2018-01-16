<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");

class LocalizacionController extends BaseController{


    public function __construct() {
        parent::__construct();
    }

    public function localizacionListar() 
    {
        
        $this->view->render("localizacion", "localizacionSHOWCURRENT");
    }
}