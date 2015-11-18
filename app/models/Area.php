<?php 
	/**
	* 
	*/
	class Area extends Eloquent
	{

		protected $table='AREA';
		protected $primaryKey = 'IdArea';
		public $timestamps = false;
		protected $fillable = array('IdArea', 'NombreArea', 'DescripcionArea');

		
		public function usuarios()
		{
			return $this->hasMany('User','Area_Id');
		}
	}
?>