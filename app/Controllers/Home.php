<?php
namespace Controllers;
use Resources, Models, Libraries;

class Home extends Resources\Controller {

	public function __construct(){
		parent::__construct();
		
		$this->pagination = new Resources\Pagination;
		$this->posts = new Models\Posts;
		$this->template = new Libraries\Template;
	}

	public function index(){        
		$data['title'] = 'Kopi Bean CMS';
		$data['posts'] = $this->posts->all();
		$data['pageNav'] = $this->pagination->setOption(array(
			'limit' => 5,
			'base' => $this->uri->baseUri . 'page/%#%/',
			'total' => $this->posts->total(),
			'current' => 1
		))->getUrl();
	    
		$this->template->parse('home', $data);
	}
	
	public function post_permalink($slug){
		$check = $this->posts->permalink($slug);

		if($check){
			$data['post'] = $check;
			$data['title'] = $check->title;

			$this->template->parse('single', $data);
		} else {
			$data['message'] = 'No post matching with your criteria. Back <a href="'.$this->uri->baseUri.'">to home</a>';

			$this->template->parse('404', $data);
		}  		
	}
}
