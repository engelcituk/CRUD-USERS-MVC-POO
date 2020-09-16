<?php
    
class User {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUsers(){
        $this->db->query('SELECT *,
                            users.id as postId,
                            users.created_at as postCreatedAt,
                            users.id as userId ,
                            users.created_at as userCreatedAt
                          FROM users
                          ORDER BY users.created_at DESC
                          ');

        $users = $this->db->resultSet();
        $total = $this->db->rowCount();

        $results = array('users' => $users, 'total' => $total);

        return $results;
    }

    // encontrar usuario por su email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email ');
        //enlazo parametro
        $this->db->bind(':email',$email);
        $row = $this->db->single();

        // revisamos Conteo de filas
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    //registrar usuario
    public function store($data){
        $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        // enlazamos parametros
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':password',$data['password']);
        //ejecución
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }
    //login de usuario
    public function login($email, $password){
        $this->db->query('SELECT * FROM users WHERE email = :email');// obtenemos al usuario
        // enlazamos parametros
        $this->db->bind(':email', $email);

        $usuario = $this->db->single();
        
        $hashedPassword = $usuario->password;// obtengo el password del user

        //comparo si la contraseña obtenida de la consulta y la que estoy trayendo por parametro sean iguales
        if(password_verify($password, $hashedPassword )){
            return $usuario; // regreso el registro
        }else{
            return false;
        }

    }
    //obtener usuario por Id
    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        //enlazo parametro
        $this->db->bind(':id', $id);
        $user = $this->db->single();
        // retornamos al usuario        
        return $user;
    }

    public function updateUser($data){

        $this->db->query('UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id');
        // enlazamos parametros
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //ejecución
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser($id){

        $this->db->query('DELETE FROM users WHERE id = :id');
        // enlazamos parametros
        $this->db->bind(':id', $id);        
        //ejecución
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}