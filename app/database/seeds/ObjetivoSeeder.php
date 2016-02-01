<?php 
	/**
	* 
	*/
	class ObjetivoSeeder extends Seeder
	{
    	public function run(){
    		
	        Objetivo::create(array('Objetivo' =>'Dirección del CMPL'));
	        Objetivo::create(array('Objetivo' => 'Realizar proyectos de producción mas límpia y eficiencia energética'));
	        Objetivo::create(array('Objetivo' => 'Ayudar a empresas a reducir residuos','Subdireccion' => 2));
	        Objetivo::create(array('Objetivo' => 'Ayudar a empresas a reducir residuos','Subdireccion' => 2));
	        Objetivo::create(array('Objetivo' => 'Formar recursos humanos en producción más límpia')); 	        
	        Objetivo::create(array('Objetivo' => 'Ofertar los servicios del CMPL' ));
	        Objetivo::create(array('Objetivo' => 'Administrar los recurso asignados al CMPL'));
	        Objetivo::create(array('Objetivo' => 'Administrar los sistemas'));
	        Objetivo::create(array('Objetivo' => 'Reuniones'));
	        Objetivo::create(array('Objetivo' => 'Biblioteca del CMPL'));
	        Objetivo::create(array('Objetivo' => 'Policía'));

	        $this->command->info('ObjetivoTableSeeder: Objetivos cargados correctamente');
    	}
	}
 ?>