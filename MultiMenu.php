<?php defined('DIRECT') OR exit('No direct script access allowed');
/*
 * Menu Plugin
 *
 * A.Aziz TEMEL - <aaziztemel@msn.com>
 *
*/

class MultiMenu {
	
	public $ayarlar 	= array();
	public $menuId;
	public $menuLink;
	public $menuAdi;
	public $menuUstid;
	public $ulAc		= '<ul class="ust">';
	public $AltulAc		= '<ul class="alt">';
	public $liAc		= '<li class="ust">';
	public $AltliAc		= '<li class="alt">';
	public $menu 		= array('ustMenu' => array(), 'altMenu' => array());
	
	public function init($ayarlar){
		
		$this->ayarlar = $ayarlar;

		try {
			// Veritabanı menü id sütun adı
			if(array_key_exists('menuId', $this->ayarlar)){
				
				$this->menuId = $ayarlar['menuId'];
				
			}else{
				
				throw new Exception('Veritabanında yer alan menü id\'nize ait sütun adını belirtiniz.');
				
			}
			
			// Veritabanı menü linki sütun adı
			if(array_key_exists('menuLink', $this->ayarlar)){
				
				$this->menuLink = $ayarlar['menuLink'];
				
			}else{
				
				throw new Exception('Veritabanında yer alan menü linkinize ait sütun adını belirtiniz.');
				
			}
			// Veritabanı menü adı sütun adı
			if(array_key_exists('menuAdi', $this->ayarlar)){
				
				$this->menuAdi 	= $ayarlar['menuAdi'];
				
			}else{
				
				throw new Exception('Veritabanında yer alan menü adınıza ait sütun adını belirtiniz.');
				
			}
			
			// Veritabanı menü üst id değeri sütun adı
			if(array_key_exists('menuUstid', $this->ayarlar)){
				
				$this->menuUstid 	= $ayarlar['menuUstid'];
				
			}else{
				
				throw new Exception('Veritabanında yer alan menü üst id\'nize ait sütun adını belirtiniz.');
				
			}

		} catch(Exception $e) {
			
			echo $e->getMessage();
			
		}
		
		// Menü ul html tag aç
		if(array_key_exists('ulAc', $this->ayarlar)){
			
			$this->ulAc 		= $this->ayarlar['ulAc'];
			
		}
		
		// Alt Menü ul html tag aç
		if(array_key_exists('AltulAc', $this->ayarlar)){
			
			$this->AltulAc 		= $this->ayarlar['AltulAc'];
			
		}

		// Menü li html tag aç
		if(array_key_exists('liAc', $this->ayarlar)){
			
			$this->liAc 		= $this->ayarlar['liAc'];
			
		}

		// Alt menü li html tag aç
		if(array_key_exists('AltliAc', $this->ayarlar)){
			
			$this->AltliAc 		= $this->ayarlar['AltliAc'];
			
		}

	}
	public function olustur($data, $ustId = 0){
	
		if(array_key_exists('menuId', $this->ayarlar) && array_key_exists('menuLink', $this->ayarlar) && array_key_exists('menuAdi', $this->ayarlar) && array_key_exists('menuUstid', $this->ayarlar)){
			
			foreach ($data AS $veri) {
				
				$this->menu['ustMenu'][$veri[$this->menuId]] = $veri;
				$this->menu['altMenu'][$veri[$this->menuUstid]][] = $veri[$this->menuId];
				
			}
			
			return $this->menuler($this->menu, $ustId);
			
		}
		
	}
	private function menuler($data, $ustId = 0) {
	// Veritabanı data döngü işlemi...
	$return = "";
	 
	if (isset($data['altMenu'][$ustId])) {
		
		if($ustId == 0){
			
			$return .= "\n{$this->ulAc}\n";
			
		}else{
			
			$return .= "\n{$this->AltulAc}\n";
			
		}
		
		foreach ($data['altMenu'][$ustId] as $menuId) {
			
			if (!isset($data['altMenu'][$menuId])) {
				
				$return .= "{$this->AltliAc}\n    <a href=\"{$data['ustMenu'][$menuId][$this->menuLink]}\">{$data['ustMenu'][$menuId][$this->menuAdi]}</a>\n</li>\n";
				
			}else{
				
				$return .= "{$this->liAc}\n    <a href=\"{$data['ustMenu'][$menuId][$this->menuLink]}\">{$data['ustMenu'][$menuId][$this->menuAdi]}</a>\n";
				$return .= $this->menuler($data,$menuId);
				$return .= "</li>\n";
				
			}
			
		}
		
		$return .= "</ul>\n";
		
	  }

	return $return;
	
	}

}
