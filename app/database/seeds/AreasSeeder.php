<?php 
	/**
	* 
	*/
	class AreasSeeder extends Seeder
	{
    	public function run(){
    		
	        Area::create(array('NombreArea' => 'Dirección','Objetivo_Id' => 1,'Organigrama_Id'=> 1));
	        Area::create(array('NombreArea' => 'Subdirección Técnica','Objetivo_Id' => 2,'Organigrama_Id'=> 2));
	        Area::create(array('NombreArea' => 'Subdirección de Posgrado','Objetivo_Id' => 5,'Organigrama_Id'=> 3)); 	        
	        Area::create(array('NombreArea' => 'Subdirección de Vinculación y Apoyo','Objetivo_Id' => 6,'Organigrama_Id'=> 4));
	        Area::create(array('NombreArea' => 'Departamento de Servicios Administrativos y Técnicos','Objetivo_Id' => 7,'Organigrama_Id'=> 5));
	        Area::create(array('NombreArea' => 'Departamento de Sistemas y Banco de Datos','Objetivo_Id' => 8,'Organigrama_Id'=> 6));
	        Area::create(array('NombreArea' => 'Sala de Juntas','Objetivo_Id' => 9));
	        Area::create(array('NombreArea' => 'Biblioteca','Objetivo_Id' => 10));
	        Area::create(array('NombreArea' => 'Vigilancia','Objetivo_Id' => 11));

	        $this->command->info('AreaTableSeeder: Areas cargadas correctamente');
    	}
	}
 ?>