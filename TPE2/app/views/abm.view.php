<?php

class ABMView {

    function showAgregar () {
        require "templates/agregar.phtml";
    }

    function showAddProducto ($categorias) {
        require "templates/addProducto.phtml";
    }

    function showAddMarca () {
        require "templates/addCategoria.phtml";
    }

    function showUpdateProducto ($categorias, $producto) {
        require "templates/updateProducto.phtml";
    }

    function showUpdateMarca ($marca) {
        require "templates/updateMarca.phtml";
    }
}