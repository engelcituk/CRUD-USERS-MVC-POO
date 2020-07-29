<?php

class UsuariosHotspot extends Controller {
   
    public $API;
    public $connected;

    public function __construct()
    {       
        $this->API = $this->routerosAPI(); //instancia de routeros

        $this->connected = connected($this->API); // llamo al helper connected
        
        if (!estaLogueado()) {
            redirect('paginas/login');
        }
        
    }
    public function index(){
        //Sí estoy connectado, otengo los users hotspot, se guardan en un array
        if($this->connected){
            $this->API->write('/ip/hotspot/user/print'); 
            $users = $this->API->read(); 
        } else {
            $users = [];
        } 
        //Sí estoy connectado, otengo los grupos limite de ancho de banda y los guardo en un array
        if($this->connected){
            $this->API->write("/ip/hotspot/user/profile/print");
            $anchosBanda = $this->API->read();;
        }else {
            $anchosBanda = [];
        }
	    $data = array('users' =>$users, 'anchosBanda' => $anchosBanda); // construyo un array con los datos obtenidos

        $this->view('usuariosHotspot/index', $data);
    }

    public function activos(){
        //obtengo los posts

        $data =[
            'posts'=>'hola'
        ];
        
        $this->view('usuariosHotspot/activos', $data);
    }

    public function generador(){
        //obtengo los posts

        $data =[
            'posts'=>'hola'
        ];
        
        $this->view('usuariosHotspot/generador', $data);
    }
    public function agregar(){
        //obtengo los posts

        $data =[
            'posts'=>'hola'
        ];
        
        $this->view('usuariosHotspot/agregar', $data);
    }
    //obtengo los datos del usuario, desde una llamada ajax, ocupo el token csrf
    public function getInfoUserHotspot(){
        //si idUser está definida y se está recibiendo por post
        if (isset($_POST['idUser']) && $_POST['idUser'] && isset($_POST['tokenCsrf']) && $_POST['tokenCsrf']) {
            $idUser= $_POST['idUser'];
            if($this->connected){

                $this->API->write("/ip/hotspot/user/print",false); 

                $this->API->write("?.id=".$idUser,true);   

                $user = $this->API->read();

                $respuesta = array ('ok' => true, 'mensaje' => 'Se ha obtenido los datos del usuario','user'=>$user);
            }else{
                $respuesta = array ('ok' => true, 'mensaje' => 'No se ha obtenido datos del usuario','user'=>[]);
            }

            echo json_encode($respuesta);
        }
    }
}
