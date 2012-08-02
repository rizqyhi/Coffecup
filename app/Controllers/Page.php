<?php
namespace Controllers;
use Resources, Models, Libraries;

class Page extends Resources\Controller {

	public function __construct(){
		parent::__construct();
		
		$this->pagination = new Resources\Pagination;
		$this->posts = new Models\Posts;
		$this->template = new Libraries\Template;
	}
	
	public function index(){
	
    }
	public function alias($page = 1){
		$data['title'] = 'Kopi Bean CMS';
		$page = (int) $page;
		$limit = 5;
	
        $data['posts'] = $this->posts->all($page, $limit);
		$data['pageNav'] = $this->pagination->setOption(array(
			'limit' => $limit,
			'base' => $this->uri->baseUri . 'page/%#%/',
			'total' => $this->posts->total(),
			'current' => $page
		))->getUrl();
	    
		$this->template->parse('home', $data);
	}
}
