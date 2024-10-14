<?php

class ErrorView {

    function showError ($error) {
        require './templates/header.phtml';
        require "templates/error.phtml";
        require './templates/footer.phtml';
    }
}