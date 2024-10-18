<?php
require_once './config.php';
    class ProductosModel {
    
    private $db;

    function __construct() {
        $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    }
    public function getProductos() {
        $query = $this->db->prepare('SELECT * FROM producto');
        $query->execute();
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }

    public function getSelectedProduct($marca){
        $query = $this->db->prepare('SELECT * FROM producto WHERE marca = ?');
        $query->execute([$marca]);
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }

    public function getProductoUnico($id){
        $query = $this->db->prepare('SELECT * FROM producto WHERE id = ?');
        $query->execute([$id]);
        $producto = $query->fetch(PDO::FETCH_OBJ);
        return $producto;
    }

    

}