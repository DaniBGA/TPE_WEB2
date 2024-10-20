<?php

require_once "./app/views/abm.view.php";
require_once "./app/models/productos.model.php";
require_once "./app/models/categoria.model.php";
require_once "./app/views/error.view.php";

class ABMController {

    private $abmView;
    private $productosModel;
    private $categoriaModel;
    private $errorView;

    function __construct () {
        $this->abmView = new ABMView();
        $this->productosModel = new ProductosModel;
        $this->categoriaModel = new CategoriaModel;
        $this->errorView = new ErrorView();
    }

    function showAgregar () {
        if (AuthHelper::verify()) {
            $this->abmView->showAgregar();
        } else {
            header('Location: ' . HOME);
        }
    }

    function showAddProducto () {
        if (AuthHelper::verify()) {
            $categorias = $this->categoriaModel->getCategorias();
            $this->abmView->showAddProducto($categorias);
        } else {
            header('Location: ' . HOME);
        };
    }

    function addProducto () {
        if (AuthHelper::verify()) {
            if (empty($_POST['nombre']) || empty($_POST['imagen']) || empty($_POST['modelo']) || empty($_POST['precio']) || empty($_POST['id_marca']) || (empty($_POST['kilometros']) && $_POST['kilometros'] < 0) || empty($_POST['motor']) || empty($_POST['detalles'])) {
                $this->errorView->showError("Falta completar datos");
                return;
            }
            $nombre = $_POST['nombre'];
            $imagen = $_POST['imagen'];
            $modelo = $_POST['modelo'];
            $precio = $_POST['precio'];
            $id_marca = $_POST['id_marca'];
            $kilometros = $_POST['kilometros'];
            $motor = $_POST['motor'];
            $detalles = $_POST['detalles'];

            $marca = $this->categoriaModel->getMarcaUnica($id_marca);
            if (!$marca) {
                $this->errorView->showError("La marca no existe");
                return;
            }

            $productos = $this->productosModel->getProductos();
            foreach ($productos as $producto) {
                if ($nombre == $producto->nombre) {
                    $this->errorView->showError("El producto ya existe");
                    return;
                }
            }

            $this->productosModel->addProducto($nombre, $imagen, $id_marca, $modelo, $motor, $kilometros, $detalles, $precio);
            header('Location: ' . CATEGORIA);
        } else {
            header('Location: ' . HOME);
        }
    }

    function showUpdateProducto ($id) {
        if (AuthHelper::verify()) {
            $producto = $this->productosModel->getProductoUnico($id);
            if ($producto) {
                $marcas = $this->categoriaModel->getMarcas();
                $this->abmView->showUpdateProducto($marcas, $producto);
            } else {
                $this->errorView->showError("El producto no existe");
            }
        } else {
            header('Location: ' . HOME);
        };
    }

    function updateProducto ($id) {
        if (AuthHelper::verify()) {
            if (empty($_POST['nombre']) || empty($_POST['imagen']) || empty($_POST['modelo']) || empty($_POST['precio']) || empty($_POST['id_marca']) || (!isset($_POST['kilometros']) && ($_POST['kilometros'] < 0)) || empty($_POST['motor']) || empty($_POST['detalles'])) {
                $this->errorView->showError("Falta completar datos");
                return;
            }

            $nombre = $_POST['nombre'];
            $imagen = $_POST['imagen'];
            $modelo = $_POST['modelo'];
            $precio = $_POST['precio'];
            $id_marca = $_POST['id_marca'];
            $kilometros = $_POST['kilometros'];
            $motor = $_POST['motor'];
            $detalles = $_POST['detalles'];

            $producto = $this->productosModel->getProductoUnico($id);
            if (!$producto) {
                $this->errorView->showError("El producto no existe");
                return;
            }

            $productos = $this->productosModel->getProductosMenosUno($id);
            foreach ($productos as $producto) {
                if ($nombre == $producto->nombre) {
                    $this->errorView->showError("Ya existe un producto con este nombre");
                    return;
                }
            }
            $this->productosModel->updateProducto($nombre, $imagen, $id_marca, $modelo, $motor, $kilometros, $detalles, $precio, $id);
            header('Location: ' . CATEGORIA);
        } else {
            header('Location: ' . HOME);
        }
    }

    function deleteProducto ($id) {
        if (AuthHelper::verify()) {
            $this->productosModel->deleteProducto($id);
            header('Location: ' . CATEGORIA);
        } else {
            header('Location: ' . HOME);
        }
    }

    function showAddMarca () {
        if (AuthHelper::verify()) {
            $this->abmView->showAddMarca();
        } else {
            header('Location: ' . HOME);
        }
    }

    function addCategoria () {
        if (AuthHelper::verify()) {
            if (empty($_POST['nombre'])) {
                $this->errorView->showError("Falta completar datos");
                return;
            }
            $nombre = $_POST['nombre'];
    
            $categorias = $this->categoriaModel->getMarcas();
            foreach ($categorias as $categoria) {
                if ($nombre == $categoria->marca) {
                    $this->errorView->showError("La marca ya existe");
                    return;
                }
            }

            $this->categoriaModel->addMarca($nombre);
            header('Location: ' . CATEGORIA);
        } else {
            header('Location: ' . HOME);
        }
    }

    function showUpdateMarca ($id) {
        if (AuthHelper::verify()) {
            $marca = $this->categoriaModel->getMarcaUnica($id);
            if (!$marca) {
                $this->errorView->showError("La marca no existe");
                return;
            }
            $this->abmView->showUpdateMarca($marca);
        } else {
            header('Location: ' . HOME);
        }
    }

    function updateMarca($id) {
        if (AuthHelper::verify()) {
            if (empty($_POST['nombre'])) {
                $this->errorView->showError("Falta completar datos");
                return;
            }

            $nombre = $_POST['nombre'];

            $categoria = $this->categoriaModel->getMarcaUnica($id);
            if (!$categoria) {
                $this->errorView->showError("La categoria no existe");
                return;
            }

            $marcas = $this->categoriaModel->getMarcaMenosUna($id);
            foreach ($marcas as $marca) {
                if ($nombre == $marca->marca) {
                    $this->errorView->showError("Ya existe una marca con este nombre");
                    return;
                }
            }
            $this->categoriaModel->updateMarca($nombre, $id);
            header('Location: ' . CATEGORIA);
        } else {
            header('Location: ' . HOME);
        }
    }

    function deleteMarca($id) {
        if (AuthHelper::verify()) {
            $productos = $this->productosModel->getProductosPorIdMarca($id);
            if (empty($productos)) {
                $this->categoriaModel->deleteMarca($id);
                header('Location: ' . CATEGORIA);
            } else {
                $this->errorView->showError("No se puede borrar esta categoria");
            }
        } else {
            header('Location: ' . HOME);
        }
    }
}