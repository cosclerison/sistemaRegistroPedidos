<?php 

include("database.php");

/**
 * [Dados Formulário]
 * 1 - Pegar os valores dos inputs
 */

     // Preparar a consulta
     $stmt = $conn->prepare("SELECT * FROM tproduct WHERE deleted_at IS NULL");
     // Vincular os parâmetros
     // $stmt->bindParam(":email", $email, PDO::PARAM_STR);
     // $stmt->bindParam(":password", $senha, PDO::PARAM_STR);
     // Executar a consulta
     $stmt->execute();
 
     // Buscar todos os resultados
     $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
     // var_dump($products);

    if(count($_POST) > 0) {
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
