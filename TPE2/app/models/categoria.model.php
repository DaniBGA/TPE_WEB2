<?php
require_once './config.php';
    class CategoriaModel {
    
    private $db;

    function __construct() {
        $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    }

    public function getMarcas(){
        $query = $this->db->prepare('SELECT * FROM categoria');
        $query->execute();
        $marcas = $query->fetchALL(PDO::FETCH_OBJ);
        return $marcas;
    }

    function getMarcaUnica ($id_marca) {
        $query = $this->db->prepare('SELECT * FROM categoria WHERE id = ?');
        $query->execute([$id_marca]);
        $categoria = $query->fetch(PDO::FETCH_OBJ);
        return $categoria;
    }

    function getMarcaMenosUna ($id) {
        $query = $this->db->prepare('SELECT marca FROM categoria WHERE id != ?');
        $query->execute([$id]);
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
    }

    function addMarca ($marca) {
        $query = $this->db->prepare('INSERT INTO categoria (marca) VALUES (?)');
        $query->execute([$marca]);
    }

    function updateMarca ($marca, $id) {
        $query = $this->db->prepare('UPDATE categoria SET marca = ? WHERE id = ?');
        $query->execute([$marca, $id]);
    }

    function deleteMarca ($id) {
        $query = $this->db->prepare('DELETE FROM categoria WHERE id = ?');
        $query->execute([$id]);
    }
}
