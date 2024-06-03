<?php 
    /**
     * [Dados Formulário]
     * 1 - Pegar os valores dos inputs
     */

    if(count($_POST) > 0) {
        // print_r($_POST);
        $email = $_POST["email"];
        $senha = $_POST["password"];


        /**
         * [Banco de dados]
         * 2 - Conexão com bando de dados 
         */

        // Variáveis para inserir na conexão deixando mais legível a leitura
        $servername = "localhost";
        $dbname     = "sistemaRegistroPedidos_db";
        $username   = "root";
        $password   = "root";

        try {
            // Conexão com o banco de dados
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // Configurar o modo de erro do PDO para exceção
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
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
                $resultado["msg"] = "Usuário encontrado!";
                $resultado["cod"] = 1;
            } elseif ($qtd_user == 0) {
                $resultado["msg"] = "Usuário não encontrado!";
                $resultado["cod"] = 0;
            }
                    
        } catch (PDOException $e) {
            // Tratar erros de conexão
            echo "Connection failed: " . $e->getMessage();
        }
    }
    
    include('index.php');
 

    $conn = null;

?>