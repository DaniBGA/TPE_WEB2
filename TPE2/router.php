<?php
require_once './app/controllers/home.controller.php';
require_once './app/controllers/auth.controller.php';
require_once './app/controllers/categorias.controller.php';
require_once './app/controllers/amb.controller.php';
require_once './app/controllers/productos.controller.php';
require_once './app/controllers/error.controller.php';

define('HOME', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/home');
define('CATEGORIA', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/categoria');
define('LOGIN', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/login');

$action = 'home'; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'home':
        $controller = new HomeController();
        $controller->showHome();
        break;
    case 'categoria':
        $controller = new CategoriaController();
        $controller->showCategorias();
        break;
    case 'procesarBTN':
        $controller = new ProductosController();
        $controller->procesarBtn();
        break;
    case 'productoUnico':
        $controller = new ProductosController();
        $controller->showProductoUnico($params[1]);
        break;
    case 'productos':
        $controller = new ProductosController();
        $controller->showProductosMarca($params[1]);
        break;
    case 'marcas':
        $controller = new CategoriaController();
        $controller->showMarcas();
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'showAddProducto':
        $controller = new ABMController();
        $controller->showAddProducto();
        break;
    case 'addProducto':
        $controller = new ABMController();
        $controller->addProducto();
        break;
    case 'showUpdateProducto':
        $controller = new ABMController();
        $controller->showUpdateProducto($params[1]);
        break;
    case 'updateProducto':
        $controller = new ABMController();
        $controller->updateProducto($params[1]);
        break;
    case 'deleteProducto':
        $controller = new ABMController();
        $controller->deleteProducto($params[1]);
        break;
    case 'addMarca':
        $controller = new ABMController();
        $controller->showAddMarca();
        break;
    case 'addCategoria':
        $controller = new ABMController();
        $controller->addCategoria();
        break;
    case 'showUpdateMarca':
        $controller = new ABMController();
        $controller->showUpdateMarca($params[1]);
        break;
    case 'updateMarca':
        $controller = new ABMController();
        $controller->updateMarca($params[1]);
        break;
    case 'deleteMarca':
        $controller = new ABMController();
        $controller->deleteMarca($params[1]);
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    default:
        $controller = new ErrorController();
        $controller->showError("Page Not Found");
        break;
}