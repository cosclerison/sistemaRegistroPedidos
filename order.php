<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-4">
        <form id="meuFormulario" action="order_add.php" method="post">
            <h2>Escolher itens do Pedido</h2>
      

            <div class="form-group">
                <label for="name_product">Nome do Produto</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="name_product"
                    name="name_product" 
                    placeholder="Digite o produto">
            </div>
            <div class="form-group">
                <label for="qtd_product">Quantidade Produto</label>
                <input 
                    type="number" 
                    class="form-control" 
                    id="qtd_product" 
                    name="qtd_product"
                    min="0"
                    max="10"
                    placeholder="Digite a quantidade">
            </div>
            <div class="form-group">
                <label for="obs_product">Observação</label>
                <textarea 
                name="obs_product" 
                id="obs_product" 
                name="obs_product" 
                class="form-control" 
                cols="5" 
                rows="3">
            </textarea>
            <div class="form-group">
                <label for="price_product">Preço</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="price_product"
                    name="price_product"
                    placeholder="Digite o preço">
            </div>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Item</button>

            <!-- Exibir mensagem de resultado -->
            <?php if (isset($resultado)): ?>
                <div class="alert <?= $resultado["style"] ?> mt-2">
                    <?php echo htmlspecialchars($resultado['msg']); ?>
                </div>
            <?php endif; ?>

        </form>
    </div>
    <?php include("order_list.php"); ?>

    <?php if(count($orders) > 0): ?>
        <div class="container">
            <dic class="col-12">
                <h3>Lista de Pedidos Cadastrados...</h3>
            </dic>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Observações</th>
                    <th scope="col">Preço</th>
                    <th scope="row"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orders as $order): ?>
                    <tr>
                        <th scope="row"><?= $order['id'] ?></th>
                        <td><?= $order['name_product'] ?></td>
                        <td><?= $order['qtd_product'] ?></td>
                        <td><?= $order['obs_product'] ?></td>
                        <td>R$ <?= number_format($order['price_product'], 2, ",", ".") ?></td>
                        <td>
                            <a 
                                type="button" 
                                class="btn btn-warning btn-sm" 
                                onclick="return confirm('Editar ( <?= $order['name_product'] ?> ) ?');" 
                                href='/order_update_form.php?id=<?= $order['id'] ?>'>
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a 
                                class="btn btn-danger btn-sm" 
                                onclick="return confirm('Remover ( <?= $order['name'] ?> ) ?');" 
                                href='/order_delete.php?id=<?= $order['id'] ?>'>
                                <i class="bi bi-trash3"></i>
                            </a>
                        </td>
                        <?php endforeach; ?>
                    </tr>
   
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="row container-fluid mt-4">
            <dic class="col-12">
                <h3>Nenhum produto cadastrado...</h3>
            </dic>
        </div>
    <?php endif; ?>
</body>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#price_product').mask('000.000.000,00', {reverse: true});
        });
    </script>
</html>