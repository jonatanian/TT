<?php 
	/**
	* 
	*/
	class GradoAcademico extends Eloquent
	{

		protected $table='GRADO_ACADEMICO';
		protected $primaryKey = 'IdGrado';
		public $timestamps = false;
		protected $fillable = array('IdGrado', 'NombreGrado', 'Abreviatura');

		
		public function usuarios()
		{
			return $this->hasMany('User','Rol_Id');
		}
	}
 ?>