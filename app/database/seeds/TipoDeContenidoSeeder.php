<?php 
	/**
	* 
	*/
	class TipoDeContenidoSeeder extends Seeder
	{
    	public function run(){
    		
	        TipoDeContenido::create(array('NombreContenido' => 'Texto'));
	        TipoDeContenido::create(array('NombreSubArea' => 'Botón de descarga'));
	        
	        $this->command->info('TipoDeContenidoTableSeeder: Tipos de contenido cargados correctamente');
    	}
	}
 ?>