<?php 
	/**
	* 
	*/
	class CargosSeeder extends Seeder
	{
    	public function run(){
    		
	        Cargo::create(array('NombreCargo' => 'Director','DescripcionCargo' =>'Administrar y transmitir información y tomar decisiones'));
	        Cargo::create(array('NombreCargo' => 'Ingeniero de Proyectos ','DescripcionCargo' =>'Ingeniero de poryectos del CMPL'));
			Cargo::create(array('NombreCargo' => 'Asistente','DescripcionCargo' =>'Recibir los oficios que entran al CMPL'));
			Cargo::create(array('NombreCargo' => 'Subdirector','DescripcionCargo' =>'Apoyar a la dirección en la toma de decisiones'));
			Cargo::create(array('NombreCargo' => 'Jefe de Departamento','DescripcionCargo' =>'Encargado de Departamento'));
			Cargo::create(array('NombreCargo' => 'Responsable Técnico de Laboratorio','DescripcionCargo' =>'Responsable de Laboratorio CMPL'));
			Cargo::create(array('NombreCargo' => 'Profesor Investigador','DescripcionCargo' =>'Investigador CMPL'));
			Cargo::create(array('NombreCargo' => 'Control Escolar','DescripcionCargo' =>'Gestionar la información de los alumnos del CMPL'));
			Cargo::create(array('NombreCargo' => 'Ingeniero de Vinculación de Proyectos','DescripcionCargo'=>'Ingeniero de proyectos vinculados'));
			Cargo::create(array('NombreCargo' => 'Control y Presupuestos','DescripcionCargo'=>'Control de presupuesto'));
			Cargo::create(array('NombreCargo' => 'Analista','DescripcionCargo'=>'Analista CMPL'));
			Cargo::create(array('NombreCargo' => 'Banco de Datos','DescripcionCargo'=>'Banco de Datos CMPL'));
			Cargo::create(array('NombreCargo' => 'Contabilidad y Presupuestos','DescripcionCargo'=>'Asigna y gestiona recursos que entran al CMPL'));
			Cargo::create(array('NombreCargo' => 'Contabilidad de Vinculados','DescripcionCargo'=>'Contabilidad de proyectos vinculados'));
			Cargo::create(array('NombreCargo' => 'Responsable de Activo Fijo','DescripcionCargo'=>'Responsable activo fijo CMPL'));
			Cargo::create(array('NombreCargo' => 'Capital Humano','DescripcionCargo'=>'Contratación y nomina'));
			Cargo::create(array('NombreCargo' => 'Ingeniero de Enlace con CONUEE','DescripcionCargo'=>'CONUEE'));
			Cargo::create(array('NombreCargo' => 'Auxilar Administrativo','DescripcionCargo'=>'Auxilar en el área de administación'));
			Cargo::create(array('NombreCargo' => 'Ingeniero de Sistemas','DescripcionCargo'=>'Diferentes actividades en el DSBD'));
			Cargo::create(array('NombreCargo' => 'Responsable del POA y Responsable de Dirección de Calidad','DescripcionCargo'=>'Persona encargada de las activadades del POA'));
			Cargo::create(array('NombreCargo' => 'Protección Civil','DescripcionCargo'=>''));
			Cargo::create(array('NombreCargo' => 'Ingreso Auto-Generado y Presupuesto Federal','DescripcionCargo'=>''));
			Cargo::create(array('NombreCargo' => 'Proyectos de Investigación','DescripcionCargo'=>''));
			Cargo::create(array('NombreCargo' => 'Activo fijo','DescripcionCargo'=>'Contratación y nomina'));
			Cargo::create(array('NombreCargo' => 'Representante de Dirección','DescripcionCargo'=>'POA'));
	        	        
	        $this->command->info('CargosTableSeeder: Cargos cargadas correctamente');
    	}
	}
 ?>