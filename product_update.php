<?php 

include("database.php");

/**
 * [Dados Formulário]
 * 1 - Pegar os valores dos inputs
 */

    if(count($_POST) > 0) {
        
        try {
            $input = $_POST;

            
            $id              = $input['id'];
            $name            = $input['name'];
            $category        = $input['category'];
            $price           = str_replace('.', '', $input['price']);
            $price           = str_replace(',', '.', $price);
            $image           = $input['image'];
            $info_additional = $input['info_additional'];
            
            // var_dump($input, $price); exit;
            
            // Preparar a consulta
            $update = "UPDATE tproduct SET 
                        name            = ?, 
                        category        = ?, 
                        price           = ?, 
                        image           = ?, 
                        info_additional = ?
                        WHERE id        = ?";

            $stmt = $conn->prepare($update);

            // Executar a consulta com os parâmetros na mesma sequencia declarada na variável $update
            $stmt->execute([$name, $category, $price, $image, $info_additional, $id]);

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

    header("location: product.php");
    // include 'product.php';
