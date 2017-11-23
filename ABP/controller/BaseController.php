<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../core/I18n.php");
require_once(__DIR__ . "/../model/Usuario.php");

class BaseController {

	/**
	 * The view manager instance
	 * @var ViewManager
	 */
	protected $view;

	/**
	 * The current user instance
	 * @var User
	 */
	protected $currentUser;

	public function __construct() {

		$this->view = ViewManager::getInstance();
		$this->view->setFlash("");

		// get the current user and put it to the view
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}

		if(isset($_SESSION["currentuser"])) {
			$this->currentUser = new Usuario();
			//add current user to the view, since some views require it
			
		}else{//si no hay current user hay que iniciar sesion
			$this->view->redirect("Login", "logout");
		}
	}
}
