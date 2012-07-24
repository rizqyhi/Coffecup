<?php
/**
 * Controller for setting page.
 *
 * @author  Rizqy Hidayat <rizqy22@gmail.com>
 * @link    http://hirizh.name/
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @since   version 1.0.0
 * @package Controller
 */
namespace Controllers\Admin;
use Resources, Models;

class Settings extends Resources\Controller {

	public function __construct(){
		parent::__construct();
		
		$this->session = new Resources\Session;
		$this->request = new Resources\Request;
		$this->settings = new Models\Settings;
		$this->users = new Models\Users;
	}

	public function index(){
		if( ! $this->session->getValue('authed') )
			$this->redirect('admin/login');
		
		// TODO: method for updating the settings
		
		/*if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		$title = $this->request->post('post-title');
		$html = mysql_escape_string($this->request->post('post-html'));
		$css = mysql_escape_string($this->request->post('post-css'));
		$created = strtotime($this->request->post('post-created'));
		$this->posts->insert($title, $html, $css, $created);
		$this->redirect('dashboard/posts');
		}*/

		$data['title'] = 'Settings';
		$data['setting'] = $this->settings->all();
		$data['user'] = $this->users->login($this->session->getValue('username'));
		
		$this->output('admin/settings', $data);
	}
}
