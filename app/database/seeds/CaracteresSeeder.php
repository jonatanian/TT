<?php 
	/**
	* 
	*/
	class CaracteresSeeder extends Seeder
	{
    	public function run(){
    		
	        Caracter::create(array('NombreCaracter' => 'Reservado'));
	        Caracter::create(array('NombreCaracter' => 'Confidencial'));
			Caracter::create(array('NombreCaracter' => 'Público'));

	        $this->command->info('CaracterTableSeeder: Caracteres de correspondencia cargados correctamente');
    	}
	}
 ?>