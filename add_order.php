<?php 

require "database.php";
    /**
     * [Dados Formulário]
     * 1 - Pegar os valores dos inputs
     */

    if(count($_POST) > 0) {

        try {

            $input = $_POST;

            $name_product  = $input['name_product'];
            $qtd_product   = $input['qtd_product'];
            $obs_product   = $input['obs_product'];
            $price_product = $input['price_product'];

            $price_product = str_replace(',', '.', $price_product);

            $sql = "INSERT INTO torder_item (
                name_product,
                qtd_product,
                obs_product,
                price_product) VALUE (?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->execute([$name_product, $qtd_product, $obs_product, $price_product]);

            $resultado["msg"]   = "Item inserido com sucesso!";
            $resultado["cod"]   = 1;
            $resultado["style"] = "alert alert-success";

        } catch (\Throwable $e) {
            
            $resultado["msg"]   = "Não inserido! " .  $e->getMessage();
            $resultado["cod"]   = 0;
            $resultado["style"] = "alert alert-danger";
        }   
        
    $conn = null;
}   

include 'pedido.php';
