<?php 

/**
 * [Dados Formulário]
 * 1 - Pegar os valores dos inputs
 */

    if(count($_POST) > 0) {

        include("database.php");

        try {

            $input = $_POST;
            
            $name               = $input['name'];
            $category           = $input['category'];
            $price           = str_replace('.', '', $input['price']);
            $price           = str_replace(',', '.', $price);
            $image              = $input['image'];
            $info_additional    = $input['info_additional'];
            // $user_id            = $input['user_id'];
            
            $price              = str_replace(',', '.', $price);

            $sql = "INSERT INTO tproduct (
                        name,
                        category,
                        price,
                        image,
                        info_additional) VALUE (?,?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->execute([$name, $category, $price, $image, $info_additional]);

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

    header("location: product.php");
