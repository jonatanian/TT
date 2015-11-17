<?php 
	/**
	*
	*/
	class GradoSeeder extends Seeder 
	{
		public function run(){

			GradoAcademico::create(array('NombreGrado' => 'Doctor', 'Abreviatura' => 'Dr.'));
			GradoAcademico::create(array('NombreGrado' => 'Doctora', 'Abreviatura' => 'Dra.'));
			GradoAcademico::create(array('NombreGrado' => 'Profesora', 'Abreviatura' => 'Profra.'));
			GradoAcademico::create(array('NombreGrado' => 'Profesor', 'Abreviatura' => 'Profre.'));
			GradoAcademico::create(array('NombreGrado' => 'Maestro en Ciencias', 'Abreviatura' => 'M. en C.'));
			GradoAcademico::create(array('NombreGrado' => 'Maestro en DGDP', 'Abreviatura' => 'M. en DGDP.'));
			GradoAcademico::create(array('NombreGrado' => 'Ingeniero', 'Abreviatura' => 'Ing.'));
			GradoAcademico::create(array('NombreGrado' => 'Licenciado', 'Abreviatura' => 'Lic.'));
			GradoAcademico::create(array('NombreGrado' => 'L. I. N.', 'Abreviatura' => 'L. I. N.'));
			GradoAcademico::create(array('NombreGrado' => 'L. A. E.', 'Abreviatura' => 'L. A. E.'));
			GradoAcademico::create(array('NombreGrado' => 'Técnico', 'Abreviatura' => 'Téc.'));
			GradoAcademico::create(array('NombreGrado' => 'Civil', 'Abreviatura' => 'C.'));
			GradoAcademico::create(array('NombreGrado' => 'Contador Público', 'Abreviatura' => 'C. P.'));
			
			$this->command->info('GradoAcademicoTableSeeder: Grados academicos cargados correctamente');
		}
	}

?>