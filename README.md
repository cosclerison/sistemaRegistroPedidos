# sistemaRegistroPedidos

## Conteúdo das aulas
## Sistema de registro de pedidos por telefone ##

Tecnologias
1 - PHP
2 - MySQL
3 - Bootstrap
3.1 - HTML
3.2 - CSS
3.1 - JavaScript
4 - Configurar ambiente de desenvolvimento
4.1 WAMP para Windows
4.2 LAMP para Linux

Tarefa "LOGIN"
1 - Tela de login
1.1 - Criar banco de dados (DB)
1.2 - Criar a tabela de Usuários
1.3 - Fazer o HTML da tela de login (FORMULÁRIO)
1.4 - Pegar os dados do formulário quando ele for submetido
1.5 - Verificar se os dados estão no (DB)
1.5.1 - Se sem, ir para tela de boas-vindas
1.5.2 - Senão, enviar mensagem de erro
1.6 - Melhorar o layout com Bootstrap

Tarefa "PEDIDO"
1 - Tela de pedidos
1.1 - Criar formulário action add_order.php POST
1.2 - Input name_product, 
1.3 - Input qtd_product com min de 0 e maximo de 10
1.4 - Input obs_product row 3 col 5
1.5 - Input price_product
1.6 - botão Adicionar Pedido

2 - Criar a tabela order (DB)
2.1 - Criar colunas = 
    name_product, 
    qtd_product, 
    obs_product, 
    user_id,
    price_product , 
    created_at, 
    updated_at, 
    deleted_at,

3 - Criar arquivo add_order.php
3.1 - Receber dados do $_POST do pedido.php
3.2 - Verificar se $_POST esta com dados
3-3 - Setar os valores nas variáveis  
3.4 - tratar Variável price_product
3.5 - Fazer preparação para o INSERT INTO
3.6 - Mensagem de retorno apos execução
3.7 - incluir arquivo pedido.php para retornar para o mesmo quando inserido dados