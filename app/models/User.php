<?php

use Illuminate\Auth\UserInterface;

use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {


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
		//return $this->belongsTo('Rol','Rol_Id');
	}
	
	public function area()
	{
		return $this->Area_Id;
		//return $this->belongsTo('Area','Area_Id');
	}
	
	public function id()
	{
		return $this->IdUsuario;
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
			$user->Activo = 1;
			$user->Cargo_Id = $inputs['Cargo_Id'];
			$user->Rol_Id = $inputs['Rol_Id'];
			$user->Area_Id = $inputs['Area_Id'];
			$user->save();
		});

		return true;
	}
	
	public function actualizarUsuario($inputs){

		DB::transaction(function () use ($inputs){
			
			$user = User::find($inputs['IdUsuario']);
			$user->Nombre = $inputs['Nombre'];
			$user->ApPaterno = $inputs['ApPaterno'];
			$user->ApMaterno = $inputs['ApMaterno'];
			$user->Email = $inputs['Email'];
			$user->Extension = $inputs['Extension'];
			//$user->FechaInicio = $inputs['FechaInicio'];
			//$user->FechaFin = $inputs['FechaFin'];
			//$user->URLCV = $inputs['UrlCV'];
			//$user->Activo = $inputs['Activo'];
			$user->Cargo_Id = $inputs['Cargo_Id'];
			$user->Rol_Id = $inputs['Rol_Id'];
			$user->Area_Id = $inputs['Area_Id'];
			$user->save();
		});

		return true;
	}
	
	public function actualizarContrasenaUsuario($inputs){

		DB::transaction(function () use ($inputs){
			
			$user = User::find($inputs['IdUsuario']);
			$user->Password = Hash::make($inputs['Password']);
			$user->save();
		});

		return true;
	}
	
	public function actualizarEstatus($inputs)
	{
		DB::transaction(function () use ($inputs){
			
			$user = User::find($inputs['IdUsuario']);
			$user->Activo = $inputs['Activo'];
			$user->FechaFin = $inputs['FechaFin'];
			$user->save();
		});
	}

	public function compararContrasena($inputs)
	{
		if($inputs['Password'] == $inputs['PasswordC'])
			return true;
		else
			return false;
	}
	    
	public function getNombreCompleto()
	{
		return $this->Nombre.' '.$this->ApPaterno.' '.$this->ApMaterno;
	}
	
	public function getNombreCompletoPMN()
	{
		return $this->ApPaterno.' '.$this->ApMaterno.' '.$this->Nombre;
	}
	public function getCargo()
	{
		$area = Cargo::where('IdCargo', '=', $this->Cargo_Id)->first();
		return $area->NombreCargo;
	}
	public function ordenarAlafabeticamente()
	{
		return User::orderBy('ApPaterno')->get();
	}
	
	public function ordenarDireccion()
	{
		return User::where('Area_Id', '=', 1)->get();
	}
	
	public function ordenarSubdireccionTecnica()
	{
		return User::where('Area_Id', '=', 2)->get();
	}
	
	public function ordenarSubdireccionPosgrado()
	{
		return User::where('Area_Id', '=', 3)->get();
	}
	
	public function ordenarSubdireccionVinculacion()
	{
		return User::where('Area_Id', '=', 4)->get();
	}
	
	public function ordenarDepartamentoProcesos()
	{
		return User::where('Area_Id', '=', 5)->get();
	}
	
	public function ordenarDepartamentoEnergia()
	{
		return User::where('Area_Id', '=', 6)->get();
	}
	
	public function ordenarDepartamentoServicios()
	{
		return User::where('Area_Id', '=', 7)->get();
	}
	
	public function ordenarDepartamentoSistemas()
	{
		return User::where('Area_Id', '=', 8)->get();
	}
	public function getNombreCargo()
	{
		$Cargo = Cargo::find($this->Cargo_Id);
		return $Cargo->nombreCargo;
	}
}
