<?php 

include("database.php");

/**
 * [Dados Formulário]
 * 1 - Pegar os valores dos inputs
 */
    $where_id = "";

    if(isset($_GET['id'])) {

        $id = $_GET['id'];

        $where_id  = "AND id = $id";
    }

    try {

        // Preparar a consulta
        $stmt = $conn->prepare("SELECT * FROM tproduct WHERE deleted_at IS NULL $where_id");

        $stmt->execute();
    
        // Buscar todos os resultados
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (\Throwable $e) {
            
            $resultado["msg"]   = "Erro ao carregar dados Produtos! " .  $e->getMessage();
            $resultado["cod"]   = 0;
            $resultado["style"] = "alert alert-danger";
        }   
        
        $conn = null;