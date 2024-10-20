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
        $query = $this->db->prepare('SELECT * FROM producto WHERE ID = ?');
        $query->execute([$id]);
        $producto = $query->fetch(PDO::FETCH_OBJ);
        return $producto;
    }

    function addProducto ($nombre, $imagen, $id_marca, $modelo, $motor, $kilometros, $detalles, $precio) {
        $query = $this->db->prepare('INSERT INTO producto ( nombre, imagen, marca, modelo, motor, kilometros, detalles, precio) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $query->execute([$nombre, $imagen, $id_marca, $modelo, $motor, $kilometros, $detalles, $precio]);
    }

    public function getProductosPorIdMarca($id){
        $query = $this->db->prepare('SELECT * FROM producto WHERE marca = ?');
        $query->execute([$id]);
        $producto = $query->fetchALL(PDO::FETCH_OBJ);
        return $producto;
    }
    function deleteProducto ($id) {
        $query = $this->db->prepare('DELETE FROM producto WHERE ID = ?');
        $query->execute([$id]);
    }
    function updateProducto ($nombre, $imagen, $id_marca, $modelo, $motor, $kilometros, $detalles, $precio,$ID) {
        $query = $this->db->prepare('UPDATE producto SET nombre = ?, imagen = ?, id_marca = ?, modelo = ?, mmotor = ?, kilometros = ?, detalles = ?, precio = ? WHERE ID = ?');
        $query->execute([$nombre, $imagen, $id_marca, $modelo, $motor, $kilometros, $detalles, $precio,$id_marca, $ID]);
    }
}