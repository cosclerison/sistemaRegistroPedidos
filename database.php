<?php

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
    }
        catch (PDOException $e) {
        // Tratar erros de conexão
        echo "Conexão Falhou: " . $e->getMessage();
    }
