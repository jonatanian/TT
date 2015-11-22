<?php 
	
	class LoginController extends BaseController
	{
		
		public function login_index()
		{
			return View::make('login.login');
		}
		
		public function login()
		{
		
	        $rules =array(
	            'email' => 'required',
	            'password' => 'required'
	        );
	
	        $validator = Validator::make(Input::all(), $rules);
	
	        if ($validator->fails()){
	            Session::flash('msgf','Usuario o contraseña incorrectos. Verifique su correo y/o contraseña.');
	            return Redirect::to('/login')->withInput()->withErrors($validator);
	        }
			
	        if (Auth::attempt(array('Email' => Input::get('email') , 'password' =>Input::get('password')))){
	      
	            $rol=Auth::User()->Rol_Id;
	            return Redirect::to('/SIG');
	            /*
	                switch ($rol) {
	                    case 1:
	                    		Session::put('admninistrador',Auth::user());
	                            return Redirect::to('/dsbd');
	                    break;

	                    case 2:
	                            Session::put('oficialia',Auth::user());
	                            return Redirect::to('/oficialia');
	                    break;
	                    case 3:
	                            Session::put('direccion',Auth::user());
	                            return Redirect::to('/direccion');
	                    break;
						case 4:
	                            Session::put('subdireccion',Auth::user());
	                            return Redirect::to('/subdireccion');
	                    break;
						case 5:
	                            Session::put('jefatura',Auth::user());
	                            return Redirect::to('/jefatura');
	                    break;
						case 6:
	                            Session::put('iescmpl',Auth::user());
	                            return Redirect::to('/iescmpl');
	                    break;
	                    default:
	                            return Redirect::to('/login');
	                        break;
	                }*/
	
	            }else{
					return Redirect::to('/login')->with(array('msgf'=>'Usuario o contraseña incorrectos. Verifique su correo y/o contraseña.'))->withInput();
	            }
		}
		
			public function SISA_Startup()
			{
				return View::make('index');
			}
			
			public function SISA_index()
			{
				$rol=Auth::User()->Rol_Id;
	            	switch ($rol) {
	                    case 1:
	                    		Session::put('admninistrador',Auth::user());
	                            return Redirect::to('/dsbd');
	                    break;

	                    case 2:
	                            Session::put('oficialia',Auth::user());
	                            return Redirect::to('/oficialia');
	                    break;
	                    case 3:
	                            Session::put('direccion',Auth::user());
	                            return Redirect::to('/direccion');
	                    break;
						case 4:
	                            Session::put('subdireccion',Auth::user());
	                            return Redirect::to('/subdireccion');
	                    break;
						case 5:
	                            Session::put('jefatura',Auth::user());
	                            return Redirect::to('/jefatura');
	                    break;
						case 6:
	                            Session::put('iescmpl',Auth::user());
	                            return Redirect::to('/iescmpl');
	                    break;
	                    default:
	                            return Redirect::to('/login');
	                        break;
	                }
			}
	
			public function logout()
			{
				Auth::logout();
				Session::flash('msg','Ha cerrado sesión correctamente.');
				return Redirect::to('/login');
			}
		}
	
?>