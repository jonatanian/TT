<?php 
	/**
	* 
	*/
	class PrioridadSeeder extends Seeder
	{
    	public function run(){
    		
	        Prioridad::create(array('NombrePrioridad' => 'Alta'));
	        Prioridad::create(array('NombrePrioridad' => 'Media'));
	        Prioridad::create(array('NombrePrioridad' => 'Baja'));

	        $this->command->info('PrioridadTableSeeder: Prioridades de documentos cargados correctamente');
    	}
	}
 ?>