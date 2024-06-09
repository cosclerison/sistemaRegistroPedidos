<?php


class Product {
    private $name;
    private $category;
    private $price;
    private $image;
    private $info_additional;
    private $user_id;
    private $id;

    // Aqui seria viável gets and sets
    public function getValueAll($input)
    {
        $this->name            = $input['name'];
        $this->category        = $input['category'];
        $this->price           = str_replace('.', '', $input['price']);
        $this->price           = str_replace(',', '.', $this->price);
        $this->image           = $input['image'];
        $this->info_additional = $input['info_additional'];
        $this->user_id         = $_SESSION['id'];
        $this->id              = isset($input['id']) ? $input['id'] : '';
    }
    
    public function create($input)
    {
        try {
            include("database.php");
            
            $this->getValueAll($input);

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

    public function read($id = null) 
    {
        include("database.php");

        $where_id = "";

        if(isset($id) && $id > 0) {
            $where_id  = "AND id =" . $id['id'];
        }
        
        try {
            $stmt = $conn->prepare("SELECT * FROM tproduct WHERE deleted_at IS NULL $where_id");
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;

        } catch (\Throwable $e) {
            
            $resultado["msg"]   = "Erro ao carregar dados Produtos! " .  $e->getMessage();
            $resultado["cod"]   = 0;
            $resultado["style"] = "alert alert-danger";
        }
        
        $conn = null;
    }

    public function update($input)
    {
        try {

            include("database.php");

            $this->getValueAll($input);


            $update = "UPDATE tproduct SET 
                        name            = ?, 
                        category        = ?, 
                        price           = ?, 
                        image           = ?, 
                        info_additional = ?,
                        user_id         = ?
                        WHERE id        = ?";

            $stmt = $conn->prepare($update);
            $resultado = $stmt->execute([
                                    $this->name, 
                                    $this->category, 
                                    $this->price, 
                                    $this->image, 
                                    $this->info_additional, 
                                    $this->user_id, 
                                    $this->id]);

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

    public function delete($id_delete)
    {
        include("database.php");

        try {
            $id = $id_delete['id'];
            
            $update = "UPDATE tproduct SET deleted_at = NOW(), user_id = ? WHERE id = ?";
            $stmt = $conn->prepare($update);
            
            $resultado = $stmt->execute([$this->user_id, $id]);
            
            $resultado["msg"]   = "Item removido com sucesso!";
            $resultado["cod"]   = 1;
            $resultado["style"] = "alert alert-success";

            return $resultado;

        } catch (\Throwable $e) {
            
            $resultado["msg"]   = "Não removido! " .  $e->getMessage();
            $resultado["cod"]   = 0;
            $resultado["style"] = "alert alert-danger";
        }   
        
        $conn = null;

    }
}