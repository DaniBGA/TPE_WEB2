<?php
require_once './app/models/categoria.model.php';
require_once './app/views/home.view.php';
require_once './app/views/error.view.php';
    Class HomeController{
        private $model;
        private $view;

    public function __construct(){
        $this->model = new CategoriaModel();
        $this->view = new ViewHome();
    }
    public function showHome(){
        $categorias = $this->model->getMarcas();
         $this->view->showHome($categorias);
    }
}