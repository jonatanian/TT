<?php 
	/**
	* 
	*/
	class AdminsSeeder extends Seeder
	{
		public function run()
		{
			$datos= array(
					'Nombre' =>'Oscar',
					'ApPaterno'	=> 'Alcántara',
					'ApMaterno'	=> 'Carrillo',
					'Email'	=> 'oalcantarac0900@alumno.ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52611,
					'FechaInicio' =>'2014/04/08',
					'Cargo_Id' => 12,
					'Rol_Id' => 1,
					'Area_Id' => 8
				);
			$c = new User();
			$c->crearUsuario($datos);
			
			$datos= array(
					'Nombre' =>'Jonatan Ian',
					'ApPaterno'	=> 'Castañeda',
					'ApMaterno'	=> 'Chavero',
					'Email'	=> 'jcastanedac1004@alumno.ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52611,
					'FechaInicio' =>'2014/04/08',
					'Cargo_Id' => 12,
					'Rol_Id' => 1,
					'Area_Id' => 8
				);
			$c = new User();
			$c->crearUsuario($datos);
			
			$datos= array(
					'Nombre' =>'Brenda Angélica',
					'ApPaterno'	=> 'Ruiz',
					'ApMaterno'	=> 'González',
					'Email'	=> 'baruizg1000@alumno.ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52611,
					'FechaInicio' =>'2014/06/10',
					'Cargo_Id' => 12,
					'Rol_Id' => 1,
					'Area_Id' => 8
				);
			$c = new User();
			$c->crearUsuario($datos);

			$this->command->info('UsuariosSeeder: Registro de administradores realizado correctamente');
		}
	}
 ?>