<?php 

    /**
     * [Dados Formulário]
     * 1 - Pegar os valores dos inputs
     */

    require_once("Product/Product.php");
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_SESSION['id']) && $_SESSION['id'] > 0) {
        if(isset($_GET) > 0) {
            
            $input = $_GET;

            $product = new Product();
            $resultado = $product->delete($input);

            echo json_encode($resultado);
            
            header("location: product.php");
        }
    } else {
        echo "Operação não permitida!!!";
    }

