<?php 

/**
 * [Dados Formulário]
 * 1 - Pegar os valores dos inputs
 */

 require_once("../sistemaRegistroPedidos/Product/Product.php");

    if(count($_POST) > 0) {

        $input = $_POST;

        $products = new Product();
        $resultado = $products->create($input);

        // var_dump($resultado); exit;
    }   

    header("location: product.php");
