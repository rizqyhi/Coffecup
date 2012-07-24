<?php
/**
 * Models for users function.
 *
 * @author  Rizqy Hidayat <rizqy22@gmail.com>
 * @link    http://hirizh.name/
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @since   version 1.0.0
 * @package Models
 */
namespace Models;
use Resources;

class Users {
    
    public function __construct(){
        $this->db = new Resources\Database;
    }
	
	// Check if username exist and get the row    
    public function login($username){
    	return $this->db->getOne('users', array(
    		'username' => $username    		
    	)); 
    }
	
	// TODO: function for updating user's information
	// Update user's profile insformation
    /*public function update($id, $title, $html, $css, $description, $created, $status){
        $this->db->update( 'posts', array(
        	'title' => $title,
        	'html' => $html,
        	'css' => $css,
	       	'description' => $description,
        	'created' => $created,
        	'status' => $status
        ), array('ID' => $id));
    }*/
}
