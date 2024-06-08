<?php 

include("database.php");

/**
 * [Dados Formulário]
 * 1 - Pegar os valores dos inputs
 */

    if(count($_POST) > 0) {
        
        try {
            $input = $_POST;

            $id            = $input['id'];
            $name_product  = $input['name_product'];
            $qtd_product   = $input['qtd_product'];
            $obs_product   = $input['obs_product'];
            $price_product = str_replace('.', '', $input['price_product']);
            $price_product = str_replace(',', '.', $price_product);

            $update = "UPDATE torder_item SET 
                                name_product  = ?, 
                                qtd_product   = ?, 
                                obs_product   = ?, 
                                price_product = ?
                                WHERE id      = ?";

            $stmt = $conn->prepare($update);
            $stmt->execute([$name_product, $qtd_product, $obs_product, $price_product, $id]);

            $resultado["msg"]   = "Item atualizado com sucesso!";
            $resultado["cod"]   = 1;
            $resultado["style"] = "alert alert-success";

        } catch (\Throwable $e) {
            
            $resultado["msg"]   = "Não Atualizado! " .  $e->getMessage();
            $resultado["cod"]   = 0;
            $resultado["style"] = "alert alert-danger";
        }   
        
        $conn = null;
    }   

    header("location: order.php");
