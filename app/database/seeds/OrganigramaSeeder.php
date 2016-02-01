<?php 
	/**
	* 
	*/
	class OrganigramaSeeder extends Seeder
	{
    	public function run(){
    		
	        Organigrama::create(array('OrganigramaURL' => 'images\\organigrama\\Direccion.png'));
	        Organigrama::create(array('OrganigramaURL' => 'images\\organigrama\\Tecnica.png'));
	        Organigrama::create(array('OrganigramaURL' => 'images\\organigrama\\Posgrado.png'));
	        Organigrama::create(array('OrganigramaURL' => 'images\\organigrama\\Vinculacion.png'));
	        Organigrama::create(array('OrganigramaURL' => 'images\\organigrama\\Administrativa.png')); 	        
	        Organigrama::create(array('OrganigramaURL' => 'images\\organigrama\\Sistemas.png' ));
	        
	        $this->command->info('OrganigramaTableSeeder: Organigramas cargados correctamente');
    	}
	}
 ?>