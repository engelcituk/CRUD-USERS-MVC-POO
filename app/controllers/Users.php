<?php
class Users extends Controller {

    public function __construct(){

        if (!estaLogueado()) { //sino esta loguedado, enviar a pagina raiz para login
            redirect(''); //carga la vista pages/index.php
        }

        $this->userModel = $this->model('User'); //requiero el modelo para la conexion a la DB
    }

    public function index(){
        //obtengo los users
        $users = $this->userModel->getUsers();

        $data =[
            'users'=>$users['users'],
            'total' => $users['total']
        ];

       
        $this->view('users/index', $data);

    }

    public function profile(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //saneamos los datos que vienen por POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($_POST['password'] != ''){ //si newPassword viene con valores
                //cifrar la contraseña
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            }else {
                $_POST['password'] = $_POST['oldPassword']; // sigo usando el mismo pass
            }

            $data = [
                'id'=> trim($_POST['idUser']),
                'name'=> trim($_POST['name']),
                'email'=> trim($_POST['email']) ,
                'password' => $_POST['password'],
                'oldPassword' => '',
                'name_err' => '',
                'email_err' => '' ,
                'password_err' => '',
                'oldPassword_err' => '',
            ];

            //Validamos el name
            if (empty($data['name'])) {
                $data['name_err'] = 'Por favor ingrese el nombre';
            }
            //Validamos el correo
            if (empty($data['email'])) {
                $data['email_err'] = 'Por favor ingrese el correo';
            }
            //Validamos la contraseña
            if (!empty($data['password']) && strlen($data['password']) < 6) {
                $data['password_err'] = 'La contraseña debe tener por lo menos 6 caracteres';
            }

            // asegurarse de que no haya errores
            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err'])) {
                //validado
                if ($this->userModel->updateUser($data)) {
                    flashMensaje('updated_success', 'Perfil actualizado');
                    //actualizo variables de sesion
                    $_SESSION['usuario'] = $data['name'];
                    $_SESSION['emailUser'] = $data['email'];
                    redirect('users/profile');
                } else {
                    die('algo pasó mal');
                }
            } else {
                // carga la vista register con el arreglo de errores y se imprimirian en el formulario
                $this->view('users/profile', $data);
            }

        } else {
            //obtengo los users
            $profile = $this->userModel->getUserById($_SESSION['idUser']);

            $data = [
                'id'=> trim($profile->id),
                'name'=> trim($profile->name),
                'email'=> trim($profile->email) ,
                'password' => '',
                'oldPassword' => trim($profile->password),
                'name_err' => '',
                'email_err' => '' ,
                'password_err' => '',
                'oldPassword_err' => '',

            ];
        
            $this->view('users/profile', $data);
        }
    }

    public function create(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //saneamos los datos que vienen por POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name'=> trim($_POST['name']),
                'email'=> trim($_POST['email']) ,
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '' ,
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            
            //Validamos el nombre completo
            if(empty($data['name'])){
                $data['name_err'] = 'Por favor ingrese el nombre completo';
            }

            //Validamos el email
            if(empty($data['email'])){
                $data['email_err'] = 'Por favor ingrese un email';
            }else{
                // revisamos que el email no exista en la BD
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'El email ya existe en la base de datos';
                }
            }

            //Validamos la contraseña
            if(empty($data['password'])){
                $data['password_err'] = 'Por favor ingrese la contraseña';
            }elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'La contraseña debe tener por lo menos 6 caracteres';
            }

            //Validamos el confirm password
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Por favor ingrese la contraseña de confirmación';
            }else{
                if( $data['password'] != $data['confirm_password']){
                    $data['confirm_password_err'] = 'Las contraseñas no son iguales, no coindicen';
                }
            }
            // asegurarse de que los errores esten vacíos
            if( empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                //validado
                //cifrar la contraseña
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                //registrar al usuario
                if($this->userModel->store($data)){
                    flashMensaje('register_success','Se ha registrado el usuario');
                    redirect('users');
                }else{
                    die('Algo malo pasó');
                }

            }else{
                // carga la vista register con el arreglo de errores y se imprimirian en el formulario
                $this->view('users/create', $data);
            }
        } else {

            $data = [
                'name'=> '',
                'email'=> '' ,
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '' ,
                'password_err' => '',
                'confirm_password_err' => ''
            ];
    
            $this->view('users/create', $data);
        }       
    }

    public function getUserById(){
        //si idUser está definida y se está recibiendo por post
        if (isset($_POST['idUser']) && $_POST['idUser'] && isset($_POST['tokenCsrf']) && $_POST['tokenCsrf']) {

            $idUser= $_POST['idUser'];

            $user = $this->userModel->getUserById($idUser);

            $respuesta = array ('ok' => true, 'mensaje' => 'Se ha obtenido los datos del usuario','user'=>$user);

            echo json_encode($respuesta);
        }
    }

    public function updateUser(){

        if (isset($_POST['user']) && $_POST['user'] && isset($_POST['tokenCsrf']) && $_POST['tokenCsrf']) {

            $usuario = $_POST['user']; //el usuario recibido por array from ajax

            if($usuario['newPassword'] != ''){ //si newPassword viene con valores
                //cifrar la contraseña
                $usuario['newPassword'] = password_hash($usuario['newPassword'], PASSWORD_DEFAULT);
            }else {
                $usuario['newPassword'] = $usuario['oldPassword']; // sigo usando el mismo pass
            }

            $data = [
                'id'=> $usuario['id'],
                'name' => $usuario['name'],
                'email' => $usuario['email'],
                'password' => $usuario['newPassword']
            ];
            
            $ok = $this->userModel->updateUser($data);

            if($ok){
                $respuesta = array ('ok' => true, 'mensaje' => 'Se ha actualizado los datos del usuario','user' => $data);
            }else {
                $respuesta = array ('ok' => true, 'mensaje' => 'Fallo en la actualizacion del usuario','user' => $usuario);
            }
                      
            echo json_encode($respuesta);
        }
    }

    public function deleteUser(){

        if (isset($_POST['id']) && $_POST['id'] && isset($_POST['tokenCsrf']) && $_POST['tokenCsrf']) {

            $ok = $this->userModel->deleteUser($_POST['id']);

            if($ok){
                $respuesta = array ('ok' => true, 'mensaje' => 'Se ha borrado al usuario');
            }else {
                $respuesta = array ('ok' => true, 'mensaje' => 'Error en el borrado del usuario',);
            } 
            echo json_encode($respuesta);
        }
    }

    public function logout(){
        //elimino las variables de sesion 
        unset($_SESSION['idUser']);
        unset($_SESSION['usuario']);
        unset($_SESSION['emailUser']);
        unset($_SESSION['tokencsrf']);

        session_destroy();// destruyo la sesion 

        redirect(''); //redirijo a la raiz
    }    
}





