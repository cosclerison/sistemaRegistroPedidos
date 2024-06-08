<?php

class Product {
    private $name;
    private $category;
    private $price;
    private $image;
    private $info_additional;
    private $user_id;

    public function getValue($input)
    {
        $this->name            = $input['name'];
        $this->category        = $input['category'];
        $this->price           = str_replace('.', '', $input['price']);
        $this->price           = str_replace(',', '.', $this->price);
        $this->image           = $input['image'];
        $this->info_additional = $input['info_additional'];
        $this->user_id         = $_SESSION['id'];
    }
    
    public function create($input)
    {
        try {
            include("database.php");
            
            $this->getValue($input);

            $sql = "INSERT INTO tproduct (
                                name,
                                category,
                                price,
                                image,
                                info_additional,
                                user_id) VALUE (?,?,?,?,?,?)";

            $stmt = $conn->prepare($sql);

            
            $resultado = $stmt->execute([$this->name,
            $this->category,
            $this->price,
            $this->image,
            $this->info_additional,
            $this->user_id]);
            
            $resultado = [];
            
            $resultado["msg"]   = "Item inserido com sucesso!";
            $resultado["cod"]   = 1;
            $resultado["style"] = "alert alert-success";

            
        } catch (\Throwable $e) {
            
            $resultado["msg"]   = "Não inserido! " .  $e->getMessage();
            $resultado["cod"]   = 0;
            $resultado["style"] = "alert alert-danger";
        }   
        
        return $resultado;
        
        $conn = null;
    }
}