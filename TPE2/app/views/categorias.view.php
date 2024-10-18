<?php
    Class ViewCategorias{
    function showCategorias($categorias){
        require_once './templates/header.phtml';
        require_once './templates/form.phtml';
        require_once './templates/footer.phtml';
    }

    function showMarcas($marcas){
        require_once './templates/header.phtml';
        require_once './templates/categorias.phtml';
        require_once './templates/footer.phtml';
    }

}