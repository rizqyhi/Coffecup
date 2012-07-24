<?php
/**
 * Controller for posts manager. List, create, edit, and delete using their own method.
 *
 * @author  Rizqy Hidayat <rizqy22@gmail.com>
 * @link    http://hirizh.name/
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @since   version 1.0.0
 * @package Controller
 */
namespace Controllers\Admin;
use Resources, Models;

class Posts extends Resources\Controller {

	public function __construct(){
		parent::__construct();

		$this->session = new Resources\Session;
		$this->request = new Resources\Request;
		$this->posts = new Models\Posts;        
	}

	// Post list job
	public function index(){
		if( ! $this->session->getValue('authed') )
			$this->redirect('admin/login');

		$data['title'] = 'Posts';
		$data['posts'] = $this->posts->all();       

		$this->output('admin/posts', $data);
	}

	// Creating a new post?
	public function create(){
		if( ! $this->session->getValue('authed') )
			$this->redirect('admin/login');
		
		// TODO: any better than stripslashes() can did the job?
		if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			$title = $this->request->post('post-title');
			$html = stripslashes($this->request->post('post-html'));
			$css = $this->request->post('post-css', FILTER_SANITIZE_MAGIC_QUOTES);
			$description = $this->request->post('post-description', FILTER_SANITIZE_MAGIC_QUOTES);
			$created = strtotime($this->request->post('post-created'));
			$status = $this->request->post('post-status');

			$this->posts->insert($title, $html, $css, $description, $created, $status);
			$this->redirect('Admin/posts');
		}

		$data['title'] = 'Create New Post';

		$this->output('admin/post-create', $data);
	}

	// Updating your post
	public function edit($id){
		if( ! $this->session->getValue('authed') )
			$this->redirect('admin/login');

		if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			$title = $this->request->post('post-title');
			$html = stripslashes($this->request->post('post-html'));
			$css = $this->request->post('post-css', FILTER_SANITIZE_MAGIC_QUOTES);
			$description = $this->request->post('post-description', FILTER_SANITIZE_MAGIC_QUOTES);
			$created = strtotime($this->request->post('post-created'));
			$status = $this->request->post('post-status');

			$this->posts->update($id, $title, $html, $css, $description, $created, $status);		           
			$this->redirect('admin/posts/edit/'.$id);
		}

		$data['post'] = $this->posts->single($id);
		$data['title'] = 'Edit a Post';

		$this->output('admin/post-edit', $data);
	}

	// delete a post
	public function delete($id){
		if( ! $this->session->getValue('authed') )
			$this->redirect('admin/login');

		$this->posts->delete($id);
		$this->redirect('admin/posts');
	}   
}
