<?php
/**
 * Controller for admin dashboard.
 *
 * @author  Rizqy Hidayat <rizqy22@gmail.com>
 * @link    http://hirizh.name/
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @since   version 1.0.0
 * @package Controller
 */
namespace Controllers\Admin;
use Resources, Models;

class Home extends Resources\Controller {

	public function __construct(){
		parent::__construct();

		$this->session = new Resources\Session;
	}

	public function index(){
		if(!$this->session->getValue('authed')) {
			$this->redirect('admin/login');
		} else {
			$data['username'] = $this->session->getValue('username');
			$data['title'] = 'Dashboard';

			$this->output('admin/dashboard', $data);
		}   
	}
}
