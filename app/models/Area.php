<?php 
	/**
	* 
	*/
	class Area extends Eloquent
	{

		protected $table='AREA';
		protected $primaryKey = 'IdArea';
		public $timestamps = false;
				
		public function usuarios()
		{
			return $this->hasMany('User','Area_Id');
		}
	}
?>