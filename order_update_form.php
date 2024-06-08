<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<div class="container mt-4">

    <?php if(isset($_GET['id']) && $_GET['id'] > 0): ?>

        <?php include("order_list.php"); ?>

        <form id="meuFormulario" action="order_update.php" method="post">
            <h2>Editar itens do Pedido</h2>

            <div class="form-group">
                <input 
                    type="text" 
                    class="form-control" 
                    id="id"
                    value="<?= $orders[0]['id'] ?>"
                    name="id"
                    readonly>
            </div>
            <div class="form-group">
                <label for="name_product">Nome do Produto</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="name_product"
                    value="<?= $orders[0]['name_product'] ?>"
                    name="name_product" 
                    placeholder="Digite o produto">
            </div>
            <div class="form-group">
                <label for="qtd_product">Quantidade Produto</label>
                <input 
                    type="number" 
                    class="form-control" 
                    id="qtd_product" 
                    value="<?= $orders[0]['qtd_product'] ?>"
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
                rows="3"><?= $orders[0]['obs_product'] ?></textarea>
            <div class="form-group">
                <label for="price_product">Preço</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="price_product"
                    value="<?= $orders[0]['price_product'] ?>"
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
        <?php endif; ?>
    </div>
    
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