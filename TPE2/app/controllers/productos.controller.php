<?php
require_once './app/models/productos.model.php';
require_once './app/views/productos.view.php';
require_once './app/views/error.view.php';

Class ProductosController{
    private $model;
    private $errorView;
    private $view;

    public function __construct(){
        $this->model = new ProductosModel();
        $this->errorview = new ErrorView();
        $this->view = new ViewProductos();
    }

    function showProductoUnico($id){
        $producto = $this->model->getProductoUnico($id);
        if ($producto) {
            $this->view->showProducto($producto);
        } else {
            $this->errorview->showError("Producto no encontrado.");
        }
    }

    function showProductosMarca($marca){
        $productos = $this->model->getSelectedProduct($marca);
        if ($productos) {
            $this->view->showProductos($productos);
        } else {
            $this->errorview->showError("Producto no encontrado.");
        }
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
                    $producto = $this->model->getSelectedproduct($data);
                    $this->view->showSelectedProduct($producto);
                }
            }
        }
}
?>