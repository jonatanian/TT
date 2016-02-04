<?php
	/**
	*
	*/
	class Area extends Eloquent
	{

		protected $table='AREA';
		protected $primaryKey = 'IdArea';
		public $timestamps = false;
		protected $fillable = array('IdArea', 'NombreArea', 'Objetivo_Id','Organigrama_Id');

		public function usuarios()
		{
			return $this->hasMany('User','Area_Id');
		}

		public function getNombreArea()
		{
			return this.NombreArea;
		}
	}
?>
