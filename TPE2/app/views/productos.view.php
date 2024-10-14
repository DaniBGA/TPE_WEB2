<?php
    Class ViewProductos{
    function showProductos($productos){
        require_once './templates/header.phtml';
        require_once './templates/productos.phtml';
        require_once './templates/footer.phtml';
    }

    function showSelectedProduct($productos){
        require_once './templates/header.phtml';
        require_once './templates/productos.phtml';
        require_once './templates/footer.phtml';
    }
}