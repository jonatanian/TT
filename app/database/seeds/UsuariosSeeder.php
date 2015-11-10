<?php 
	/**
	* 
	*/
	class UsuariosSeeder extends Seeder
	{
		public function run()
		{
			$datos= array(
					'Nombre' =>'Rogelio',
					'ApPaterno'	=> 'Sotelo',
					'ApMaterno'	=> 'Boyás',
					'Email'	=> 'rsotelob@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52601,
					'Cargo_Id' => 1,
					'Rol_Id' => 3,
					'Area_Id' => 1
				);
			$c = new User();
			$c->crearUsuario($datos);
			
			$datos= array(
					'Nombre' =>'Ana Isabel',
					'ApPaterno'	=> 'Sanchis',
					'ApMaterno'	=> 'Castillo',
					'Email'	=> 'asanchis@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52619,
					'Cargo_Id' => 2,
					'Rol_Id' => 6,
					'Area_Id' => 1
				);
			$c = new User();
			$c->crearUsuario($datos);
			
			$datos= array(
					'Nombre' =>'Rebeca Cecilia',
					'ApPaterno'	=> 'Quezada',
					'ApMaterno'	=> 'Barajas',
					'Email'	=> 'rquezada@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52620,
					'Cargo_Id' => 3,
					'Rol_Id' => 6,
					'Area_Id' => 1
				);
			$c = new User();
			$c->crearUsuario($datos);
			
			$datos= array(
					'Nombre' =>'Ana Bertha',
					'ApPaterno'	=> 'García',
					'ApMaterno'	=> 'Navarro',
					'Email'	=> 'abgarcian@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52602,
					'Cargo_Id' => 3,
					'Rol_Id' => 2,
					'Area_Id' => 1
				);
			$c = new User();
			$c->crearUsuario($datos);
			
			$datos= array(
					'Nombre' =>'Sandra Soledad',
					'ApPaterno'	=> 'Morales',
					'ApMaterno'	=> 'García',
					'Email'	=> 'smoralesg@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52603,
					'Cargo_Id' => 4,
					'Rol_Id' => 4,
					'Area_Id' => 2
				);
			$c = new User();
			$c->crearUsuario($datos);
			
			$datos= array(
					'Nombre' =>'María de los Angeles Adriana',
					'ApPaterno'	=> 'Tinoco',
					'ApMaterno'	=> 'González',
					'Email'	=> 'atinocog@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52616,
					'Cargo_Id' => 3,
					'Rol_Id' => 6,
					'Area_Id' => 2
				);
			$c = new User();
			$c->crearUsuario($datos);
			
			$datos= array(
					'Nombre' =>'Brenda',
					'ApPaterno'	=> 'Bravo',
					'ApMaterno'	=> 'Díaz',
					'Email'	=> 'bbravod@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52607,
					'Cargo_Id' => 5,
					'Rol_Id' => 5,
					'Area_Id' => 5
				);
			$c = new User();
			$c->crearUsuario($datos);
			
			$datos= array(
					'Nombre' =>'Gisela Esther',
					'ApPaterno'	=> 'Tristán',
					'ApMaterno'	=> 'Durán',
					'Email'	=> 'gtristan@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52612,
					'Cargo_Id' => 2,
					'Rol_Id' => 6,
					'Area_Id' => 5
				);
			$c = new User();
			$c->crearUsuario($datos);
			
			$datos= array(
					'Nombre' =>'Miguel',
					'ApPaterno'	=> 'González',
					'ApMaterno'	=> 'Riojas',
					'Email'	=> 'migonzalez@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52614,
					'Cargo_Id' => 2,
					'Rol_Id' => 6,
					'Area_Id' => 5
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Julio Vicente',
					'ApPaterno'	=> 'Galván',
					'ApMaterno'	=> 'Olguín',
					'Email'	=> 'jgalvano@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52612,
					'Cargo_Id' => 2,
					'Rol_Id' => 6,
					'Area_Id' => 5
				);
			$c = new User();
			$c->crearUsuario($datos);
			
			$datos= array(
					'Nombre' =>'María Teresa',
					'ApPaterno'	=> 'Zubillaga',
					'ApMaterno'	=> 'Álvarez',
					'Email'	=> 'mzubillaga@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52612,
					'Cargo_Id' => 2,
					'Rol_Id' => 6,
					'Area_Id' => 5
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Alejandro Amed',
					'ApPaterno'	=> 'Fonseca',
					'ApMaterno'	=> 'Gutiérrez',
					'Email'	=> 'afonsecag@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52614,
					'Cargo_Id' => 2,
					'Rol_Id' => 6,
					'Area_Id' => 5
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Pedro',
					'ApPaterno'	=> 'Sebastián',
					'ApMaterno'	=> 'Vargas',
					'Email'	=> 'psebastian@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52608,
					'Cargo_Id' => 5,
					'Rol_Id' => 5,
					'Area_Id' => 6
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Matín',
					'ApPaterno'	=> 'Vargas',
					'ApMaterno'	=> 'Ángeles',
					'Email'	=> 'mvargasa@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52608,
					'Cargo_Id' => 2,
					'Rol_Id' => 6,
					'Area_Id' => 6
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Israel',
					'ApPaterno'	=> 'Cerecedo',
					'ApMaterno'	=> 'Ramírez',
					'Email'	=> 'icerecedo@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52622,
					'Cargo_Id' => 2,
					'Rol_Id' => 6,
					'Area_Id' => 6
				);
			$c = new User();
			$c->crearUsuario($datos);
			
			$datos= array(
					'Nombre' =>'José Raúl',
					'ApPaterno'	=> 'Durán',
					'ApMaterno'	=> 'Vidal',
					'Email'	=> 'jrduran@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52622,
					'Cargo_Id' => 2,
					'Rol_Id' => 6,
					'Area_Id' => 6
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Ivan',
					'ApPaterno'	=> 'Textle',
					'ApMaterno'	=> 'Xoampil',
					'Email'	=> 'itextle@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52622,
					'Cargo_Id' => 2,
					'Rol_Id' => 6,
					'Area_Id' => 6
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Luis Francisco',
					'ApPaterno'	=> 'Chávez',
					'ApMaterno'	=> 'Rangel',
					'Email'	=> 'lchavezr@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52622 ,
					'Cargo_Id' => 2,
					'Rol_Id' => 6,
					'Area_Id' => 6
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Diego',
					'ApPaterno'	=> 'Repizo',
					'ApMaterno'	=> 'García',
					'Email'	=> 'drepizo@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52622,
					'Cargo_Id' => 2,
					'Rol_Id' => 6,
					'Area_Id' => 6
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'José Baltazar',
					'ApPaterno'	=> 'López',
					'ApMaterno'	=> 'Iñiguez',
					'Email'	=> 'jblopez@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52622,
					'Cargo_Id' => 2,
					'Rol_Id' => 6,
					'Area_Id' => 6
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'José Ángel',
					'ApPaterno'	=> 'Pérez',
					'ApMaterno'	=> 'Juárez',
					'Email'	=> 'japerezj@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52616,
					'Cargo_Id' => 2,
					'Rol_Id' => 6,
					'Area_Id' => 6
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'María de Lourdes',
					'ApPaterno'	=> 'Soto',
					'ApMaterno'	=> 'Guzmán',
					'Email'	=> 'msotog@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52623,
					'Cargo_Id' => 6,
					'Rol_Id' => 6,
					'Area_Id' => 6
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Mario',
					'ApPaterno'	=> 'Sandoval',
					'ApMaterno'	=> 'Jiménez',
					'Email'	=> 'msandoval@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52623,
					'Cargo_Id' => 2,
					'Rol_Id' => 6,
					'Area_Id' => 6
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Rubén',
					'ApPaterno'	=> 'Vázquez',
					'ApMaterno'	=> 'Medina',
					'Email'	=> 'ruvazquez@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52605,
					'Cargo_Id' => 4,
					'Rol_Id' => 4,
					'Area_Id' => 3
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Manuel',
					'ApPaterno'	=> 'Hernández',
					'ApMaterno'	=> 'Cortázar',
					'Email'	=> 'manhernandez@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52617,
					'Cargo_Id' => 7,
					'Rol_Id' => 6,
					'Area_Id' => 3
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'María del Carmen',
					'ApPaterno'	=> 'Monterrubio',
					'ApMaterno'	=> 'Badillo',
					'Email'	=> 'mmonterrubio@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52615,
					'Cargo_Id' => 7,
					'Rol_Id' => 6,
					'Area_Id' => 3
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Rocío',
					'ApPaterno'	=> 'Sánchez',
					'ApMaterno'	=> 'Pérez',
					'Email'	=> 'rosanchezp@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52613,
					'Cargo_Id' => 7,
					'Rol_Id' => 6,
					'Area_Id' => 3
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Patricia Eugenia',
					'ApPaterno'	=> 'Cruz',
					'ApMaterno'	=> 'Ortega',
					'Email'	=> 'pcruz@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52616,
					'Cargo_Id' => 7,
					'Rol_Id' => 6,
					'Area_Id' => 3
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Ignacio',
					'ApPaterno'	=> 'García',
					'ApMaterno'	=> 'Sánchez',
					'Email'	=> 'igarcias@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52616,
					'Cargo_Id' => 7,
					'Rol_Id' => 6,
					'Area_Id' => 3
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Gabriel',
					'ApPaterno'	=> 'Pineda',
					'ApMaterno'	=> 'Flores',
					'Email'	=> 'gpineda@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52612,
					'Cargo_Id' => 7,
					'Rol_Id' => 6,
					'Area_Id' => 3
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Yazmín',
					'ApPaterno'	=> 'Mena',
					'ApMaterno'	=> 'Crevantes',
					'Email'	=> 'vmenac@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52620,
					'Cargo_Id' => 7,
					'Rol_Id' => 6,
					'Area_Id' => 3
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Raúl',
					'ApPaterno'	=> 'Hernández',
					'ApMaterno'	=> 'Altamirano',
					'Email'	=> 'rahernandeza@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52612,
					'Cargo_Id' => 7,
					'Rol_Id' => 6,
					'Area_Id' => 3
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Ignacio',
					'ApPaterno'	=> 'Elizalde',
					'ApMaterno'	=> 'Martínez',
					'Email'	=> 'ielizalde@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52612,
					'Cargo_Id' => 7,
					'Rol_Id' => 6,
					'Area_Id' => 3
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Juan',
					'ApPaterno'	=> 'Manuel',
					'ApMaterno'	=> 'Vértiz',
					'Email'	=> 'jvertiz@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52605,
					'Cargo_Id' => 8,
					'Rol_Id' => 6,
					'Area_Id' => 3
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Abelardo',
					'ApPaterno'	=> 'Flores',
					'ApMaterno'	=> 'Vela',
					'Email'	=> 'afloresv@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52620,
					'Cargo_Id' => 4,
					'Rol_Id' => 4,
					'Area_Id' => 4
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'César',
					'ApPaterno'	=> 'Romero',
					'ApMaterno'	=> 'Hernández',
					'Email'	=> 'cromeroh@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52615,
					'Cargo_Id' => 9,
					'Rol_Id' => 6,
					'Area_Id' => 4
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Elisa',
					'ApPaterno'	=> 'Arreola',
					'ApMaterno'	=> 'Valero',
					'Email'	=> 'earreolav@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52622,
					'Cargo_Id' => 9,
					'Rol_Id' => 6,
					'Area_Id' => 4
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Jesús Jorge',
					'ApPaterno'	=> 'Salazar',
					'ApMaterno'	=> 'Víquez',
					'Email'	=> 'jsalazarv@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52609,
					'Cargo_Id' => 10,
					'Rol_Id' => 6,
					'Area_Id' => 4
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Austreberto J.',
					'ApPaterno'	=> 'Contreras',
					'ApMaterno'	=> 'Morlan',
					'Email'	=> 'acontrerasmo@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52616,
					'Cargo_Id' => 2,
					'Rol_Id' => 6,
					'Area_Id' => 4
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Francisco Javier',
					'ApPaterno'	=> 'Serna',
					'ApMaterno'	=> 'Castro',
					'Email'	=> 'fsernac@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52604,
					'Cargo_Id' => 2,
					'Rol_Id' => 6,
					'Area_Id' => 4
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Gustavo',
					'ApPaterno'	=> 'Gutiérrez',
					'ApMaterno'	=> 'Sánchez',
					'Email'	=> 'gutiers@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52615,
					'Cargo_Id' => 2,
					'Rol_Id' => 6,
					'Area_Id' => 4
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Raciel',
					'ApPaterno'	=> 'Rioja',
					'ApMaterno'	=> 'Martínez',
					'Email'	=> 'rriojasm@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52606,
					'Cargo_Id' => 5,
					'Rol_Id' => 5,
					'Area_Id' => 7
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'María Elena',
					'ApPaterno'	=> 'González',
					'ApMaterno'	=> 'Díaz',
					'Email'	=> 'megonzalezd@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52606,
					'Cargo_Id' => 11,
					'Rol_Id' => 6,
					'Area_Id' => 7
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Karina Jazmín',
					'ApPaterno'	=> 'González',
					'ApMaterno'	=> 'Rodríguez',
					'Email'	=> 'kgonzalezr@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52622,
					'Cargo_Id' => 13,
					'Rol_Id' => 6,
					'Area_Id' => 7
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Gustavo',
					'ApPaterno'	=> 'Sánchez',
					'ApMaterno'	=> 'Espinosa',
					'Email'	=> 'gsancheze@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52610,
					'Cargo_Id' => 14,
					'Rol_Id' => 6,
					'Area_Id' => 7
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Pedro',
					'ApPaterno'	=> 'Godínez',
					'ApMaterno'	=> 'Martínez',
					'Email'	=> 'rgodinez@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52609,
					'Cargo_Id' => 15,
					'Rol_Id' => 6,
					'Area_Id' => 7
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Vanesa',
					'ApPaterno'	=> 'Sánchez',
					'ApMaterno'	=> 'Escobar',
					'Email'	=> 'vasancheze@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52614,
					'Cargo_Id' => 11,
					'Rol_Id' => 6,
					'Area_Id' => 7
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Alma Leticia',
					'ApPaterno'	=> 'González',
					'ApMaterno'	=> 'Domínguez',
					'Email'	=> 'algonzalezd@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52606,
					'Cargo_Id' => 16,
					'Rol_Id' => 6,
					'Area_Id' => 7
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Nidia',
					'ApPaterno'	=> 'Orea',
					'ApMaterno'	=> 'Escalona',
					'Email'	=> 'noreae@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52611,
					'Cargo_Id' => 5,
					'Rol_Id' => 1,
					'Area_Id' => 8
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Lourdes Josefina',
					'ApPaterno'	=> 'García',
					'ApMaterno'	=> 'Alva',
					'Email'	=> 'logarciaa@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52617,
					'Cargo_Id' => 12,
					'Rol_Id' => 6,
					'Area_Id' => 8
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Kenia',
					'ApPaterno'	=> 'Gonzáles',
					'ApMaterno'	=> 'Brugada',
					'Email'	=> 'kgonzalezb@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52602,
					'Cargo_Id' => 3,
					'Rol_Id' => 6,
					'Area_Id' => 1
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Jorge Alonso',
					'ApPaterno'	=> 'Marbán',
					'ApMaterno'	=> 'Hernández',
					'Email'	=> 'amarban@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52607,
					'Cargo_Id' => 5,
					'Rol_Id' => 5,
					'Area_Id' => 2
				);
			$c = new User();
			$c->crearUsuario($datos);

			$datos= array(
					'Nombre' =>'Alejandro',
					'ApPaterno'	=> 'Pérez',
					'ApMaterno'	=> 'Olivarez',
					'Email'	=> 'aperezo@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52606,
					'Cargo_Id' => 5,
					'Rol_Id' => 5,
					'Area_Id' => 7
				);
			$c = new User();
			$c->crearUsuario($datos);
			
			$datos= array(
					'Nombre' =>'Bibiana',
					'ApPaterno'	=> 'Hernández',
					'ApMaterno'	=> 'Queda',
					'Email'	=> 'bhernandezq@ipn.mx',
					'Password' =>'cmpl2015',
					'Extension' => 52606,
					'Cargo_Id' => 3,
					'Rol_Id' => 6,
					'Area_Id' => 7
				);
			$c = new User();
			$c->crearUsuario($datos);

			$this->command->info('UsersSeeder: Registro de usuarios cargado correctamente');
		}
	}
 ?>