<?php
namespace Controllers\Admin;
use Resources, Models;

class Login extends Resources\Controller {

	public function __construct(){
		parent::__construct();

		$this->session = new Resources\Session;
		$this->request = new Resources\Request;
		$this->users = new Models\Users;
	}

	public function index(){
		
		// If user not authenticated
		if( ! $this->session->getValue('authed') ){
			if( $this->request->post('submit') ){
				$username = $this->request->post('username');
				$password = $this->request->post('password');
				$check = $this->users->login($username);

				if(!$check){
					echo 'user atau password salah';
				} else {
					$hash = hash('sha256', $check->salt . hash('sha256', $password));

					if($hash == $check->password){
						$this->session->setValue(array(
						'authed' => true,
						'username' => $username
						)
						);
						$this->redirect('admin');
					} else {
						echo 'user atau password salah';
					}
				}
			}
			$data['title'] = 'Login';
			
			$this->output('admin/login', $data);
		} else {
			// If user has been loged in
			$this->redirect('admin');
		}
	}
}
