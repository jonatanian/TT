<?php 
	/**
	*
	*/
	class RolSeeder extends Seeder 
	{
		public function run(){

			Rol::create(array('NombreRol' => 'Administrador'));
			Rol::create(array('NombreRol' => 'Oficialía de Partes'));
			Rol::create(array('NombreRol' => 'Director'));
			Rol::create(array('NombreRol' => 'Subdirector'));
			Rol::create(array('NombreRol' => 'Jefe de Departamento'));
			Rol::create(array('NombreRol' => 'Personal del CMPL'));
			
			$this->command->info('RolTableSeeder: Areas cargadas correctamente');
		}
	}

?>