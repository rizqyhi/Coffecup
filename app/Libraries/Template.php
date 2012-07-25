<?php
/**
 * Template
 * 
 * Parse output from controller to given view. 
 * Modified from original output class in Panada.
 *
 * @version Release: 1.0
 * @author Rizqy Hidayat <rizqy22@gmail.com>
 */
namespace Libraries;
use Resources, Models;

class Template {
	private
		$childNamespace,
		$viewCache,
		$viewFile;

	public function __construct(){
		$child = get_class($this);
		$this->childClass = array(
			'namespaceArray' => explode( '\\', $child),
			'namespaceString' => $child
		);
		
		$this->configMain = Resources\Config::main();
		$this->uri = new Resources\Uri;
		$this->settings = new Models\Settings;
		
		$this->themeName = $this->settings->all()->theme;
	}

	public function parse( $viewFile, $data = array(), $isReturnValue = false ){
		$themePath = 'themes/' . $this->themeName . '/' . $viewFile;

		try{
			if( ! file_exists($this->viewFile = $themePath.'.php') )
				throw new RunException('View file in '.$this->$viewFile.' does not exits');
		}
		catch(RunException $e){
			$arr = $e->getTrace();
			RunException::outputError($e->getMessage(), $arr[0]['file'], $arr[0]['line']);
		}

		if(!empty($data)){
			$this->viewCache = array(
				'data' => $data,
				'prefix' => $this->childClass['namespaceString'],
			);
		}

		// We don't need this variables anymore.
		unset($viewFile, $data, $themePath);

		if( ! empty($this->viewCache) && $this->viewCache['prefix'] == $this->childClass['namespaceString'] )
			extract( $this->viewCache['data'], EXTR_SKIP );

		if($isReturnValue){
			ob_start();
			include_once $this->viewFile;
			$return = ob_get_contents();
			ob_end_clean();
			return $return;
		}

		include_once $this->viewFile;
	}

	public function location($location = ''){
		return $this->uri->baseUri . $this->configMain['indexFile'] . $location;
	}
	
	public function themeUri($location = ''){
		return $this->uri->baseUri . $this->configMain['indexFile'] . 'themes/' . $this->themeName . '/' . $location;
	}
	
	public function getPart($location = ''){
		include_once $this->themeUri . $location;
	}
}
