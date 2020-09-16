<?php

class Pages extends Controller {

    public function __construct(){

        if(estaLogueado()){
            redirect('users');
        }
        $this->userModel = $this->model('User'); // se requiere el modelo para el login

    }

    public function index(){ // para gestionar la vista para el login y el proceso de login

        // Verificar POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Procesa el formulario

            //sanitizamos los datos que vienen por POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email'=> trim($_POST['email']) ,
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '' 
            ];
            //Validamos el email
            if(empty($data['email'])){
                $data['email_err'] = 'Por favor ingrese su email';
            }
            //Validamos la contraseña
            if(empty($data['password'])){
                $data['password_err'] = 'Por favor ingrese la contraseña';
            }
            // verificar usuario / correo
            if($this->userModel->findUserByEmail($data['email'])){
                // usuario encontrado
            }else{
                // usuario no encontrado
                $data['email_err'] = 'El usuario no se ha encontrado';
            }
            // asegurarse de que los errores esten vacíos
            if( empty($data['email_err']) && empty($data['password_err']) ){
                //validado
                //verificar y configurar que el usuario se conecte
                $user = $this->userModel->login($data['email'],$data['password']);// traigo los datos del usuario
                //si user trae valor
                if( $user ){
                    // creamos variables de sesión
                    $this->createUserSession( $user );
                }else{
                    $data['password_err'] = 'Contraseña incorrecta';
                    //recargamos la vista
                    $this->view('pages/index', $data); 
                }
            }else{
                // carga la vista login con el arreglo de errores y se imprimirán en el formulario
                $this->view('pages/index', $data); 
            }
            
        }else{
            //Iniciar data
            $data = [
                'email'=> '' ,
                'password' => '',
                'email_err' => '' ,
                'password_err' => ''
            ];
            // Cargar vista
            $this->view('pages/index', $data); 
        }
    }

    public function createUserSession($user){
        $_SESSION['idUser'] = $user->id;
        $_SESSION['usuario'] = $user->name;
        $_SESSION['emailUser'] = $user->email;
        $_SESSION['tokencsrf'] = csrf_token(); //token generado gracias al helper
        redirect('users');        
    }

}