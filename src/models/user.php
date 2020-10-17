<?php
include 'config_db.php';

class User{
    private $db;
    public function __construct()
    {
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    }

    // insert new user
    public function insert_user($username, $password, $email){
        $query = "INSERT INTO user(username, password, email, role) 
                    VALUES('$username', MD5('$password'), '$email', 'USER')";
        if ($this->db->query($query) === TRUE){
            return true;
        } else {
            return false;
        }
    }

    // return user (id, username, email, role)
    public function get_user($username, $password){
        $query = "SELECT id, username, email, role FROM user
                    WHERE username='$username' and password=MD5('$password')";
        $result = $this->db->query($query);
        if ($result->num_rows != 0){
            return ($result->fetch_all());
        } else {
            return false;
        }
    }
}

//Test
$cek = new User();
$cek -> insert_user("zunan", "zunan", "zunanalfikri@gmail.com");
// if ($cek->get_user('zunan', 'zunan')){
//     echo "ada";
// } else {
//     echo "gaada";
// }

?>