<?php
/**
 * Controller for logouting user and clear all sessions.
 *
 * @author  Rizqy Hidayat <rizqy22@gmail.com>
 * @link    http://hirizh.name/
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @since   version 1.0.0
 * @package Controller
 */
namespace Controllers\Admin;
use Resources, Models;

class Logout extends Resources\Controller {

	public function __construct(){
		parent::__construct();

		$this->session = new Resources\Session;
	}

	public function index(){
		// If user not authenticated
		if( ! $this->session->getValue('authed') ){
			$this->redirect('admin/login');
		} else {
			// If user has been loged in
			$this->session->destroy();
			$this->redirect('admin/login');
		}
	}
}
