<?php
require_once './app/models/categoria.model.php';
require_once './app/views/home.view.php';
    Class HomeController{
        private $model;
        private $view;

    public function __construct(){
        $this->model = new CategoriaModel();
        $this->view = new ViewHome();
    }
    public function showHome(){
        $categorias = $this->model->getCategorias();
         $this->view->showHome($categorias);
    }
}