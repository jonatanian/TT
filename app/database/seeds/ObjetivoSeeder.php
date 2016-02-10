<?php 
	/**
	* 
	*/
	class ObjetivoSeeder extends Seeder
	{
    	public function run(){
    		
	        Objetivo::create(array('Objetivo' => NULL));
	        Objetivo::create(array('Objetivo' => 'Realizar proyectos de Producción Más Limpia y Eficiencia Energética, que  ayuden a las empresas a prevenir y disminuir la generación de residuos, así como propiciar el uso eficiente de sus recursos.'));
	        Objetivo::create(array('Objetivo' => NULL));
	        Objetivo::create(array('Objetivo' => NULL));
	        Objetivo::create(array('Objetivo' => 'Formar recursos humanos en producción más limpia, eficiencia energética y otros temas relacionados con el desarrollo sustentable.'));
	        Objetivo::create(array('Objetivo' => 'Ofertar los servicios del CMP+L, realizar prospección para incrementar la cartera de clientes así como establecer y mantener el contacto con los clientes.'));
	        Objetivo::create(array('Objetivo' => 'Administrar los recursos asignados al CMP+L.')); 	        
	        Objetivo::create(array('Objetivo' => 'Realizar el PEDMP y POA así como sus seguimientos trimestrales; coordinar las actividades de los RD\'s de los diferentes sistemas del CMP+L.'));
	        Objetivo::create(array('Objetivo' => 'Reuniones'));
	        Objetivo::create(array('Objetivo' => 'Biblioteca del CMPL'));
	        Objetivo::create(array('Objetivo' => 'Policía'));

	        $this->command->info('ObjetivoTableSeeder: Objetivos cargados correctamente');
    	}
	}
 ?>