<?php 
	/**
	* 
	*/
	class SubAreasSeeder extends Seeder
	{
    	public function run(){
    		
	        SubArea::create(array('NombreSubArea' => 'Departamento de Ingeniería de Procesos','Objetivo_Id' => 3,'Area_Id'=>2));
	        SubArea::create(array('NombreSubArea' => 'Departamento de Ingeniería de Energía','Objetivo_Id' => 4,'Area_Id'=>2));
	        
	        $this->command->info('SubAreaTableSeeder: Subareas cargadas correctamente');
    	}
	}
 ?>