<?php 

    /**
     * [Dados Formulário]
     * 1 - Pegar os valores dos inputs
     */

    require_once("Product/Product.php");

    if(isset($_GET) > 0) {

        $input = $_GET;

        $product = new Product();
        $resultado = $product->delete($input);
        
        header("location: product.php");
    }   

