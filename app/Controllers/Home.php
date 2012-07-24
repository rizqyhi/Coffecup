<?php
/**
 * Controller for front page.
 *
 * @author  Rizqy Hidayat <rizqy22@gmail.com>
 * @link    http://hirizh.name/
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @since   version 1.0.0
 * @package Controller
 */
namespace Controllers;
use Resources, Models, Libraries;

class Home extends Resources\Controller {

	public function __construct(){
		parent::__construct();
	
		$this->posts = new Models\Posts;
		$this->template = new Libraries\Template;
	}

	public function index(){        
		$data['title'] = 'Kopi Bean CMS';
		$data['posts'] = $this->posts->all();

		$this->template->parse('home', $data);
	}

	public function post_permalink($slug){
		$check = $this->posts->permalink($slug);

		if($check){
			$data['post'] = $check;
			$data['title'] = $check->title;

			$this->output('single', $data);
		} else {
			$data['message'] = 'No post matching with your criteria. Back <a href="'.$this->uri->baseUri.'">to home</a>';

			$this->output('errors/404', $data);
		}  		
	}
}
