<?php 
	/**
	* 
	*/
	class Cargo extends Eloquent
	{

		protected $table='CARGO';
		protected $primaryKey = 'IdCargo';
		public $timestamps = false;
		protected $fillable = array('IdCargo', 'NombreCargo', 'DescripcionCargo');

		
		public function usuarios()
		{
			return $this->hasMany('User','Cargo_Id');
		}
		public function nombreCargo(){
			return $this->NombreCargo;
		}
	}
 ?>