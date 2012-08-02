<?php
namespace Models;
use Resources, Libraries;

class Posts {
    public function __construct(){
        $this->db = new Resources\Database;
        $this->StringToSlug = new Libraries\StringToSlug;
    }
    
    // List all posts
    public function all($page=1, $limit=5){
    	$offset = ($limit * $page) - $limit;
    	
    	return $this->db->select()->from('posts')->orderBy('created', 'DESC')->limit($limit, $offset)->getAll(); 
    }
    
    // Total posts
    public function total(){
    	return $this->db->select('COUNT(ID)')->from('posts')->getVar(); 
    }
    
    // get single post based on ID
    public function single($id){
    	return $this->db->select()->from('posts')->where('ID', '=', $id)->getOne(); 
    }
    // get single post based on slug
    public function permalink($slug){
    	return $this->db->select()->from('posts')->where('slug', '=', $slug)->getOne(); 
    }
    
    // insert a new post
    public function insert($title, $html, $css, $description, $created, $status){
    	if($status == 'true'){ $status = 'draft'; } else { $status = 'published'; }
        $slug = $this->StringToSlug->gen($title);
        $this->db->insert( 'posts', array(
        	'title' => $title,
        	'slug' => $slug,
        	'html' => $html,
        	'css' => $css,
        	'description' => $description,
        	'created' => $created,
        	'status' => $status
        ));
        return $this->db->insertId();
    }
    
    // update a post based given ID
    public function update($id, $title, $html, $css, $description, $created, $status){
    	if($status == 'true'){ $status = 'draft';} else { $status = 'published';}
        $this->db->update( 'posts', array(
        	'title' => $title,
        	'html' => $html,
        	'css' => $css,
	       	'description' => $description,
        	'created' => $created,
        	'status' => $status
        ), array('ID' => $id));
    }
    
    // delete a post which given ID 
    public function delete($id){
    	$this->db->delete('posts', array('ID' => $id));
    } 
}
