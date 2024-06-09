<?php 

/**
 * [Dados Formulário]
 * 1 - Pegar os valores dos inputs
 */
require_once("Product/Product.php");

    if(count($_POST) > 0) {

        $input = $_POST;

        $product = new Product();
        $product->update($input);
     
        header("location: product.php");
    }   

