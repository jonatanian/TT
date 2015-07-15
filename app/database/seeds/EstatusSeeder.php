<?php 
	/**
	* 
	*/
	class EstatusSeeder extends Seeder
	{
    	public function run(){
    		
	        Estatus::create(array('NombreEstatus' => 'Registrado'));
	        Estatus::create(array('NombreEstatus' => 'Turnado'));
	        Estatus::create(array('NombreEstatus' => 'Enterado'));
	        Estatus::create(array('NombreEstatus' => 'En atención'));
	        Estatus::create(array('NombreEstatus' => 'Pendiente'));
	        Estatus::create(array('NombreEstatus' => 'Atendido'));
	        Estatus::create(array('NombreEstatus' => 'Captura de respuesta'));
	        Estatus::create(array('NombreEstatus' => 'En revisión'));
	        Estatus::create(array('NombreEstatus' => 'Observaciones'));
	        Estatus::create(array('NombreEstatus' => 'Por firmar'));
	        Estatus::create(array('NombreEstatus' => 'Enviado'));
	        Estatus::create(array('NombreEstatus' => 'Acuse pendiente'));
	        Estatus::create(array('NombreEstatus' => 'Acuse recibido'));

	        $this->command->info('EstatusTableSeeder: Estatus de documentos cargados correctamente');
    	}
	}
 ?>