<?php
	/**
	* 
	*/
	class EstatusSeeder extends Seeder
	{
    	public function run(){
    		//Estados de oficios entrantes (públicos)
	        Estatus::create(array('IdEstatus' => '101','NombreEstatus' => 'Registrado'));
	        Estatus::create(array('IdEstatus' => '102','NombreEstatus' => 'Turnado'));
	        Estatus::create(array('IdEstatus' => '103','NombreEstatus' => 'Visto'));
	        Estatus::create(array('IdEstatus' => '104','NombreEstatus' => 'En atención'));
	        Estatus::create(array('IdEstatus' => '105','NombreEstatus' => 'Finalizado'));
	        Estatus::create(array('IdEstatus' => '106','NombreEstatus' => 'Cancelado'));
	        
	        //Estados de oficios entrantes (confidenciales)
	        Estatus::create(array('IdEstatus' => '201','NombreEstatus' => 'Registrado'));
	        Estatus::create(array('IdEstatus' => '202','NombreEstatus' => 'Turnado'));
	        Estatus::create(array('IdEstatus' => '203','NombreEstatus' => 'Visto'));
	        Estatus::create(array('IdEstatus' => '204','NombreEstatus' => 'En atención'));
	        Estatus::create(array('IdEstatus' => '205','NombreEstatus' => 'Finalizado'));
	        Estatus::create(array('IdEstatus' => '206','NombreEstatus' => 'Cancelado'));
	        
	        //Estados de oficios entrantes (privados)
	        Estatus::create(array('IdEstatus' => '301','NombreEstatus' => 'Registrado'));
	        Estatus::create(array('IdEstatus' => '302','NombreEstatus' => 'Visto'));
	        Estatus::create(array('IdEstatus' => '303','NombreEstatus' => 'En atención'));
	        Estatus::create(array('IdEstatus' => '304','NombreEstatus' => 'Finalizado'));
	        Estatus::create(array('IdEstatus' => '305','NombreEstatus' => 'Cancelado'));
	        
	        //Estados de oficios salientes
	        Estatus::create(array('IdEstatus' => '401','NombreEstatus' => 'En revisión'));
	        Estatus::create(array('IdEstatus' => '402','NombreEstatus' => 'Visto'));
	        Estatus::create(array('IdEstatus' => '403','NombreEstatus' => 'Observaciones'));
	        Estatus::create(array('IdEstatus' => '404','NombreEstatus' => 'Aprobado'));
	        Estatus::create(array('IdEstatus' => '405','NombreEstatus' => 'Enviado. Acuse de recibido pendiente'));
	        Estatus::create(array('IdEstatus' => '406','NombreEstatus' => 'Finalizado'));
	        Estatus::create(array('IdEstatus' => '407','NombreEstatus' => 'Cancelado'));
	        
	        //Estados de oficios salientes (de respuesta)
	        Estatus::create(array('IdEstatus' => '501','NombreEstatus' => 'En revisión'));
	        Estatus::create(array('IdEstatus' => '502','NombreEstatus' => 'Visto'));
	        Estatus::create(array('IdEstatus' => '503','NombreEstatus' => 'Observaciones'));
	        Estatus::create(array('IdEstatus' => '504','NombreEstatus' => 'Aprobado'));
	        Estatus::create(array('IdEstatus' => '505','NombreEstatus' => 'Enviado. Acuse de recibido pendiente'));
	        Estatus::create(array('IdEstatus' => '506','NombreEstatus' => 'Finalizado'));
	        Estatus::create(array('IdEstatus' => '507','NombreEstatus' => 'Cancelado'));
	        
	        //Estados de oficios salientes (privados)
	        Estatus::create(array('IdEstatus' => '601','NombreEstatus' => 'En revisión'));
	        Estatus::create(array('IdEstatus' => '602','NombreEstatus' => 'Visto'));
	        Estatus::create(array('IdEstatus' => '603','NombreEstatus' => 'Observaciones'));
	        Estatus::create(array('IdEstatus' => '604','NombreEstatus' => 'Aprobado'));
	        Estatus::create(array('IdEstatus' => '605','NombreEstatus' => 'Enviado. Acuse de recibido pendiente'));
	        Estatus::create(array('IdEstatus' => '606','NombreEstatus' => 'Finalizado'));
	        Estatus::create(array('IdEstatus' => '607','NombreEstatus' => 'Cancelado'));
	        
	        //Estados de oficios salientes (privados de respuesta)
	        Estatus::create(array('IdEstatus' => '701','NombreEstatus' => 'En revisión'));
	        Estatus::create(array('IdEstatus' => '702','NombreEstatus' => 'Visto'));
	        Estatus::create(array('IdEstatus' => '703','NombreEstatus' => 'Observaciones'));
	        Estatus::create(array('IdEstatus' => '704','NombreEstatus' => 'Aprobado'));
	        Estatus::create(array('IdEstatus' => '705','NombreEstatus' => 'Enviado. Acuse de recibido pendiente'));
	        Estatus::create(array('IdEstatus' => '706','NombreEstatus' => 'Finalizado'));
	        Estatus::create(array('IdEstatus' => '707','NombreEstatus' => 'Cancelado'));
	        
	        //Memorándums (generales)
	        Estatus::create(array('IdEstatus' => '801','NombreEstatus' => 'Registrado'));
	        Estatus::create(array('IdEstatus' => '802','NombreEstatus' => 'Turnado'));
            Estatus::create(array('IdEstatus' => '803','NombreEstatus' => 'Visto'));
            Estatus::create(array('IdEstatus' => '804','NombreEstatus' => 'En atención'));
            Estatus::create(array('IdEstatus' => '805','NombreEstatus' => 'Finalizado'));
            Estatus::create(array('IdEstatus' => '806','NombreEstatus' => 'Cancelado'));
            
            //Memorándums (personales)
	        Estatus::create(array('IdEstatus' => '901','NombreEstatus' => 'Registrado'));
	        Estatus::create(array('IdEstatus' => '902','NombreEstatus' => 'Turnado'));
            Estatus::create(array('IdEstatus' => '903','NombreEstatus' => 'Visto'));
            Estatus::create(array('IdEstatus' => '904','NombreEstatus' => 'En atención'));
            Estatus::create(array('IdEstatus' => '905','NombreEstatus' => 'Finalizado'));
            Estatus::create(array('IdEstatus' => '906','NombreEstatus' => 'Cancelado'));
            
            //Memorándums (de respuesta - generales y personales)
	        Estatus::create(array('IdEstatus' => '1001','NombreEstatus' => 'Registrado'));
	        Estatus::create(array('IdEstatus' => '1002','NombreEstatus' => 'Turnado'));
            Estatus::create(array('IdEstatus' => '1003','NombreEstatus' => 'Visto'));
            Estatus::create(array('IdEstatus' => '1004','NombreEstatus' => 'En atención'));
            Estatus::create(array('IdEstatus' => '1005','NombreEstatus' => 'Finalizado'));
            Estatus::create(array('IdEstatus' => '1006','NombreEstatus' => 'Cancelado'));

	        $this->command->info('EstatusTableSeeder: Estatus de documentos cargados correctamente');
    	}
	}
 ?>