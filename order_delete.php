<?php 

include("database.php");

/**
 * [Dados Formulário]
 * 1 - Pegar os valores dos inputs
 */

    if(count($_GET) > 0) {

        try {
            $input = $_GET;

            $id  = $input['id'];
            
            // Preparar a consulta
            $update = "UPDATE torder_item SET deleted_at = NOW() WHERE id = ?";
            $stmt = $conn->prepare($update);

            $stmt->execute([$id]);
            
            $resultado["msg"]   = "Item removido com sucesso!";
            $resultado["cod"]   = 1;
            $resultado["style"] = "alert alert-success";

        } catch (\Throwable $e) {
            
            $resultado["msg"]   = "Não removido! " .  $e->getMessage();
            $resultado["cod"]   = 0;
            $resultado["style"] = "alert alert-danger";
        }   
        
        $conn = null;
    }   

    header("location: order.php");
