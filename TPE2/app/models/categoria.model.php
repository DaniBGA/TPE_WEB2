<?php
require_once './config.php';
    class CategoriaModel {
    
    private $db;

    function __construct() {
        $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    }
    public function getCategorias() {
        $query = $this->db->prepare('SELECT * FROM categoria');
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
    }

}