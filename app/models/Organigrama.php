<?php 
	/**
	* 
	*/
	class Organigrama extends Eloquent
	{

		protected $table='ORGANIGRAMA';
		protected $primaryKey = 'IdOrganigrama';
		public $timestamps = false;
		protected $fillable = array('IdOrganigrama', 'OrganigramaURL', 'FechaEdicion','EditadoPor');
	}

?>