<?php 
	/**
	* 
	*/
	class SubArea extends Eloquent
	{

		protected $table='SUBAREA';
		protected $primaryKey = 'IdSubArea';
		public $timestamps = false;
		protected $fillable = array('IdSubArea', 'NombreSubArea', 'Objetivo_Id','Organigrama_Id','Area_Id');
	}

?>