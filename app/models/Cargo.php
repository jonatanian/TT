<?php 
	/**
	* 
	*/
	class Cargo extends Eloquent
	{

		protected $table='CARGO';

		public $timestamps = false;
		protected $fillable = array('IdCargo', 'NombreCargo', 'DescripcionCargo');

		
		public function usuarios()
		{
			return $this->hasMany('User','Cargo_Id');
		}
	}
 ?>