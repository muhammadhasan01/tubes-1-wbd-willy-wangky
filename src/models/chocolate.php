<?php
include 'config_db.php';

class Chocolate {
    private $db;
    public function __construct()
    {
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    }

    /*
    Mengembalikan semua coklat terurut berdasarkan sold amount
    hasil : matriks 
        0    1    2     3     4       5           6
        id name price amount sold description file_name
    obj->get_all()[0][6] : mengembalikan row pertama kolom file_name
    */
    public function get_all(){
        $query = "SELECT * FROM CHOCOLATE ORDER BY sold DESC";
        $result = $this->db->query($query)->fetch_all();
        return $result;
    }

    // memasukkan chocolate baru
    public function insert($name, $price, $amount, $description, $file_name){
        $query = "INSERT INTO chocolate(name, price, amount, description, file_name)
                    VALUES('$name', $price, $amount, '$description', '$file_name')";
        if ($this->db->query($query) === TRUE){
            return true;
        } else {
            return false;
        }
    }

    // menambahkan stock
    public function add_amount_by_id($id, $amount){
        $query = "UPDATE chocolate SET amount = amount + $amount WHERE id = $id";
        if ($this->db->query($query) === TRUE){
            return true;
        } else {
            return false;
        }
    }

    // fungsi untuk menjual (menambah jumlah terjual dan mengurangi jumlah stok)
    public function sell($id, $amount_sold){
        $query = "UPDATE chocolate SET amount = amount - $amount_sold, sold = sold + $amount_sold WHERE id = $id";
        if ($this->db->query($query) === TRUE){
            return true;
        } else {
            return false;
        }
    }
}

$cek = new Chocolate();
$cek->get_all();
($cek->sell(3,4))
?>