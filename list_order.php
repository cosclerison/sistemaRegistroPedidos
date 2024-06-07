<?php 

include("database.php");

/**
 * [Dados Formulário]
 * 1 - Pegar os valores dos inputs
 */

    try {

        // Preparar a consulta
        $stmt = $conn->prepare("SELECT * FROM torder_item WHERE deleted_at IS NULL");
        $stmt->execute();
    
        // Buscar todos os resultados
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        } catch (\Throwable $e) {
            
            $resultado["msg"]   = "Erro ao carregar dados Pedidos! " .  $e->getMessage();
            $resultado["cod"]   = 0;
            $resultado["style"] = "alert alert-danger";
        }   
        
        $conn = null;

