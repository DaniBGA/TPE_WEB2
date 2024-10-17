<?php

class AuthView {

    function showLogin ($error = null) {
        require "templates/header.phtml";
        require "templates/login.phtml";
        require "templates/footer.phtml";
    }
}