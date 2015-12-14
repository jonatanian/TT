<?php 
	/**
	* 
	*/
	class DatosConfidenciales extends Eloquent
	{

		protected $table='DATOS_CONFIDENCIALES';
		protected $primaryKey = 'IdDatos';
		public $timestamps = false;
		//protected $fillable = array('IdRol', 'NombreRol', 'DescripcionRol');

		
		public function nuevoDatoConf($inputs,$IdCorrespondencia){
			
	    	DB::transaction(function () use ($inputs,$IdCorrespondencia){
				$a = new Anexo();
				$a ->Correspondencia_Id = $IdCorrespondencia;
				$a ->Anexo = 'Prueba';
				$a ->save();
				
	    	});
	    $Id = DB::table('datos_confidenciales')->max('IdDatos');
		return $Id;
		}
	}
 ?>