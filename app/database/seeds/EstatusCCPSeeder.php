<?php
	/**
	* 
	*/
	class EstatusCCPSeeder extends Seeder
	{
    	public function run(){
    		
	        EstatusCCP::create(array('NombreEstatusCPP' => 'Enviado'));
	        EstatusCCP::create(array('NombreEstatusCPP' => 'Recibido'));
	        EstatusCCP::create(array('NombreEstatusCPP' => 'Enterado'));
	      
	        $this->command->info('EstatusCPPTableSeeder: Estatus de CCP cargados correctamente');
    	}
	}
 ?>