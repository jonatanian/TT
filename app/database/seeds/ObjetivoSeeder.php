<?php 
	/**
	* 
	*/
	class ObjetivoSeeder extends Seeder
	{
    	public function run(){
    		
	        Objetivo::create(array('Objetivo' => 'Dirección del CMPL'));
	        Objetivo::create(array('Objetivo' => 'Realizar proyectos de producción más limpia y eficiencia energética'));
	        Objetivo::create(array('Objetivo' => 'Ayudar a empresas a reducir residuos'));
	        Objetivo::create(array('Objetivo' => 'Ayudar a empresas a reducir residuos'));
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