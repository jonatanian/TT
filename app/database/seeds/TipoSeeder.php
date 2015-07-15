<?php 
	/**
	* 
	*/
	class TipoSeeder extends Seeder
	{
    	public function run(){
    		
	        Tipo::create(array('NombreTipo' => 'Oficio entrante'));
	        Tipo::create(array('NombreTipo' => 'Oficio saliente'));
	        Tipo::create(array('NombreTipo' => 'Memorándum entrante'));     
	        Tipo::create(array('NombreTipo' => 'Memorándum saliente'));     

	        $this->command->info('TipoTableSeeder: Tipos de documentos cargados correctamente');
    	}
	}
 ?>