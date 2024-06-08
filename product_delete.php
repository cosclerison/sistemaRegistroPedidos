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
            $user_id = $_SESSION['id'];
            
            $update = "UPDATE tproduct SET deleted_at = NOW(), user_id = ? WHERE id = ?";
            $stmt = $conn->prepare($update);
            
            $stmt->execute([$user_id, $id]);
            
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

    header("location: product.php");
