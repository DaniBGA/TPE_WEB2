<?php
require_once './app/models/categoria.model.php';
require_once './app/views/categorias.view.php';
    Class CategoriaController{
        private $model;
        private $view;

    public function __construct(){
        $this->model = new CategoriaModel();
        $this->view = new ViewCategorias();
    }
    public function showCategorias(){
        $categorias = $this->model->getCategorias();
         $this->view->showCategorias($categorias);
    }
}