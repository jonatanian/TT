<?php 
	/**
	* 
	*/
	class Rol extends Eloquent
	{

		protected $table='ROL';

		public $timestamps = false;
		protected $fillable = array('IdRol', 'NombreRol', 'DescripcionRol');

		
		public function usuarios()
		{
			return $this->hasMany('User','Rol_Id');
		}
	}
 ?>