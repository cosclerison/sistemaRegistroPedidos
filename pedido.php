<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <form id="meuFormulario" action="add_order.php" method="post">
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
</body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>