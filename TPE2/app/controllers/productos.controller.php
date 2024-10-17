<?php
require_once './app/models/productos.model.php';
require_once './app/views/productos.view.php';

Class ProductosController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new ProductosModel();
        $this->view = new ViewProductos();
    }

    function procesarBtn(){
            $action = $_POST['accion'];
            if ($action == 'listAutos') {
                $data = $this->model->getProductos();
                $this->view->showProductos($data);

            } else if ($action == 'listSelectedMarcas') {
                $data = $_POST['Marcas'];
                if(isset($data)&& !empty($data)){
                    $producto = $this->model->getSelectedproduct($data);
                    $this->view->showSelectedProduct($producto);
                }else{
                require_once './templates/error.phtml';
                }
            }
        }
    function showProductoUnico($id){
        $producto = $this->model->getProductoUnico($id);
        $this->view->showProductoUnico($producto);
    }
}
?>