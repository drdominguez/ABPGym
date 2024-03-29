<?php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__ . "/../controller/BaseController.php");

/**
* Class MainController
*
* controller to make a CRUDL of main entities
*
*/
class MainController extends BaseController {

	/**
	* Reference to the PostMapper to interact
	* with the database
	
	* @var PostMapper
	*/
	private $postMapper;

	public function __construct() {
		parent::__construct();
	}
	
	/**
	* Action to list main
	* Loads all the main from the database.
	* No HTTP parameters are needed.
	* The views are:
	* main/index (via include)
	*/
	public function index() {
		// render the view (/view/main/index.php)
		$this->view->render("main", "index");
	}
}
