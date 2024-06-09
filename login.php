<?php 
    /**
     * [Dados Formulário]
     * 1 - Pegar os valores dos inputs
     */


    
    if(count($_POST) > 0) {
        $email = $_POST["email"];
        $senha = $_POST["password"];
        
        try {
            
            include("Config/database.php");
            
            /*
            * [Banco de dados]
            * 3 - Verificar se E-Mail e senha estão registrados
            */

            // Preparar a consulta
            $stmt = $conn->prepare("SELECT * FROM tuser WHERE email = :email AND password = md5(:password)");
            // Vincular os parâmetros
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $senha, PDO::PARAM_STR);
            // Executar a consulta
            $stmt->execute();
            
            // Buscar todos os resultados
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // Contar o número de usuários encontrados
            $qtd_user = count($result);

            // Inicializar a variável resultado
            $resultado = array();

            if ($qtd_user == 1) {
                $_SESSION['id'] = $result[0]['id'];
                $_SESSION['nome'] = $result[0]['name'];
                $_SESSION['email'] = $result[0]['email'];

                $result['auth'] = $_SESSION;

                $resultado["msg"] = "Usuário encontrado!";
                $resultado["cod"] = 1;

                header("location: order.php");
            } elseif ($qtd_user == 0) {
                $resultado["msg"] = "Usuário não encontrado!";
                $resultado["cod"] = 0;
            }
                    
        } catch (PDOException $e) {
            // Tratar erros de conexão
            echo "Conexão Falhou: " . $e->getMessage();
        }
        
        $conn = null;
    }
    
    include('index.php');

?>