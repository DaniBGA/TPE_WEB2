<?php
require_once './app/models/categoria.model.php';
require_once './app/views/categorias.view.php';
require_once './app/views/error.view.php';
    Class CategoriaController{
        private $model;
        private $view;

    public function __construct(){
        $this->model = new CategoriaModel();
        $this->modelP = new ProductosModel();
        $this->view = new ViewCategorias();
    }
    public function showCategorias(){
        $categorias = $this->model->getMarcas();
         $this->view->showCategorias($categorias);
    }

    public function showMarcas(){
        $marcas = $this->model->getMarcas();
        $this->view->showMarcas($marcas);
    }

}