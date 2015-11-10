<?php 
	/**
	*
	*/
	class GradoSeeder extends Seeder 
	{
		public function run(){

			Grado::create(array('NombreGrado' => 'Doctor', 'Abrebiatura' => 'Dr'.));
			Grado::create(array('NombreGrado' => 'Doctora', 'Abrebiatura' => 'Dra.'));
			Grado::create(array('NombreGrado' => 'Profesora', 'Abrebiatura' => 'Profra.'));
			Grado::create(array('NombreGrado' => 'Profesor', 'Abrebiatura' => 'Profre.'));
			Grado::create(array('NombreGrado' => 'Maestro en Ciencias', 'Abrebiatura' => 'M. en C.'));
			Grado::create(array('NombreGrado' => 'Maestro en DGDP', 'Abrebiatura' => 'M. en DGDP.'));
			Grado::create(array('NombreGrado' => 'Ingeniero', 'Abrebiatura' => 'Ing.'));
			Grado::create(array('NombreGrado' => 'Licenciado', 'Abrebiatura' => 'Lic.'));
			Grado::create(array('NombreGrado' => 'L. I. N.', 'Abrebiatura' => 'L. I. N.'));
			Grado::create(array('NombreGrado' => 'L. A. E.', 'Abrebiatura' => 'L. A. E.'));
			Grado::create(array('NombreGrado' => 'Técnico', 'Abrebiatura' => 'Téc.'));
			Grado::create(array('NombreGrado' => 'Civil', 'Abrebiatura' => 'C.'));
			Grado::create(array('NombreGrado' => 'Contador Público', 'Abrebiatura' => 'C. P.'));
			
			$this->command->info('RolTableSeeder: Areas cargadas correctamente');
		}
	}

?>