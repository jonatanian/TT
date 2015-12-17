<?php

use Illuminate\Auth\UserInterface;

use Illuminate\Auth\Reminders\RemindableInterface;

class Usuario extends Eloquent implements UserInterface, RemindableInterface {


	protected $table = 'usuario';
		protected $primaryKey = 'IdUsuario';
		public $timestamps = false;
		
		
	/**

	 * The database table used by the model.

	 *

	 * @var string

	 */


	/**

	 * The attributes excluded from the model's JSON form.

	 *

	 * @var array

	 */

	protected $hidden = array('password');



	/**

	 * Get the unique identifier for the user.

	 *

	 * @return mixed

	 */

	public function getAuthIdentifier()

	{

		return $this->getKey();

	}



	/**

	 * Get the password for the user.

	 *

	 * @return string

	 */

	public function getAuthPassword()

	{
		return $this->Password;

	}
	
	public function getRememberToken()

	{

	    return $this->remember_token;

	}



	public function setRememberToken($value)

	{

	    $this->remember_token = $value;

	}



	public function getRememberTokenName()

	{

	    return 'remember_token';

	}

	public function getReminderEmail()
	{
		return $this->Email;
	}
	
	public function rol()
	{
		return $this->Rol_Id;
	}
	
	public function id()
	{
		return $this->IdUsuario;
	}
	
	public function area()
	{
		return $this->Area_Id;
	}


		public function crearUsuario($inputs){

	    	DB::transaction(function () use ($inputs){
		    	
			    $user = new User();
			    $user->Nombre = $inputs['Nombre'];
			    $user->ApPaterno = $inputs['ApPaterno'];
			    $user->ApMaterno = $inputs['ApMaterno'];
			    $user->Email = $inputs['Email'];
			    $user->Password = Hash::make($inputs['Password']);
			    $user->Extension = $inputs['Extension'];
			    //$user->FechaInicio = $inputs['FechaInicio'];
			    //$user->FechaFin = $inputs['FechaFin'];
			    //$user->URLCV = $inputs['UrlCV'];
			 	//$user->Activo = $inputs['Activo'];
			 	$user->Cargo_Id = $inputs['Cargo_Id'];
			 	$user->Rol_Id = $inputs['Rol_Id'];
			    $user->save();
	    	});

	    	return true;
	    }
	    
	public function getNombreCompleto()
	{
		return $this->Nombre.' '.$this->ApPaterno.' '.$this->ApMaterno;
	}
	
	public function getNombreCargo()
	{
		$Cargo = Cargo::find($this->Cargo_Id);
		if($this->Rol_Id == 2)
			return "Oficialía de Partes";
		return $Cargo->nombreCargo();
	}
	
	public function getNombreCompletoPMN()
	{
		return $this->ApPaterno.' '.$this->ApMaterno.' '.$this->Nombre;
	}
}
