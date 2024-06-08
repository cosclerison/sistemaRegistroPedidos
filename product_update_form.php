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

        <?php include("product_list.php"); ?>

        <form id="meuFormulario" action="product_update.php" method="post">
            <h2>Editar de Produtos</h2>

            <div class="form-group">
                <input 
                    type="text" 
                    class="form-control" 
                    id="id"
                    value="<?= $products[0]['id'] ?>"
                    name="id" 
                    readonly>
            </div>
            <div class="form-group">
                <label for="name">Nome do Produto</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="name"
                    value="<?= $products[0]['name'] ?>"
                    name="name" 
                    placeholder="Digite o produto">
            </div>
            <div class="form-group">
                <label for="category">Categoria</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="category" 
                    value="<?= $products[0]['category'] ?>"
                    name="category"
                    min="0"
                    max="10"
                    placeholder="Digite a categoria">
            </div>
            <div class="form-group">
                <label for="price">Preço</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="price"
                    value="<?= $products[0]['price'] ?>"
                    name="price"
                    placeholder="Digite o preço">
            </div>
            <div class="form-group">
                <label for="image">Imagem</label>
                <input 
                type="file" 
                class="form-control" 
                id="image"
                value="<?= $products[0]['image'] ?>"
                name="image">
            </div>


            <div class="form-group">
                <label for="info_additional">Informação Adicional</label>
                <textarea 
                name="info_additional" 
                id="info_additional" 
                name="info_additional" 
                class="form-control" 
                cols="5" 
                rows="3"><?= $products[0]['info_additional'] ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>

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
        $('#price').mask('000.000.000,00', {reverse: true});
    });
</script>
</html>