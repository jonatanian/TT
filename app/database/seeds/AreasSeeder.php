<?php 
	/**
	* 
	*/
	class AreasSeeder extends Seeder
	{
    	public function run(){
    		
	        Area::create(array('NombreArea' => 'Dirección','DescripcionArea' =>'Dirección del CMPL'));
	        Area::create(array('NombreArea' => 'Subdirección Técnica','DescripcionArea' => 'Realizar proyectos de producción mas límpia y eficiencia energética'));
	        Area::create(array('NombreArea' => 'Subdirección de Posgrado','DescripcionArea' => 'Formar recursos humanos en producción más límpia')); 	        
	        Area::create(array('NombreArea' => 'Subdirección de Vinculación Industrial y Apoyo','DescripcionArea' => 'Ofertar los servicios del CMPL' ));
	        Area::create(array('NombreArea' => 'Departamento de Ingeniería de Procesos','DescripcionArea' => 'Ayudar a empresas a reducir residuos','Subdireccion' => 2));
	        Area::create(array('NombreArea' => 'Departamento de Ingeniería de Energía','DescripcionArea' => 'Ayudar a empresas a reducir residuos','Subdireccion' => 2));
	        Area::create(array('NombreArea' => 'Departamento de Servicios Administrativos y Técnicos','DescripcionArea' => 'Administrar los recurso asignados al CMPL'));
	        Area::create(array('NombreArea' => 'Departamento de Sistemas y Banco de Datos','DescripcionArea' => 'Administrar los sistemas'));
	        Area::create(array('NombreArea' => 'Sala de Juntas','DescripcionArea' => 'Reuniones'));
	        Area::create(array('NombreArea' => 'Biblioteca','DescripcionArea' => 'Biblioteca del CMPL'));
	        Area::create(array('NombreArea' => 'Vigilancia','DescripcionArea' => 'Policia'));

	        $this->command->info('AreaTableSeeder: Areas cargadas correctamente');
    	}
	}
 ?>