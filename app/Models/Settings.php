<?php
/**
 * Models for querying and updating the settings from database.
 *
 * @author  Rizqy Hidayat <rizqy22@gmail.com>
 * @link    http://hirizh.name/
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @since   version 1.0.0
 * @package Models
 */
namespace Models;
use Resources;

class Settings {

	public function __construct(){
		$this->db = new Resources\Database;
	}
	
	// Return all settings key and value
	public function all(){
		$results = $this->db->select()->from('settings')->getAll();
		$setting = array();
			foreach ($results as $result):
				$setting[$result->key] = $result->value;
			endforeach;
			
		return Resources\Tools::arrayToObject($setting);
	}
	
	// Return the value of given key
	public function get($key){
		return $this->db->select()->from('settings')->where('key', '=', $key)->getOne(); 
	}
	
	// Update value based on given key
	public function update($key, $value){
		$this->db->update('settings', array(
		'value' => $value 
		), array('key' => $key));
	}
}
