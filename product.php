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
        <form id="meuFormulario" action="add_product.php" method="post">
            <h2>Cadastro de Produtos</h2>

            <div class="form-group">
                <label for="name">Nome do Produto</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="name"
                    name="name" 
                    placeholder="Digite o produto">
            </div>
            <div class="form-group">
                <label for="category">Categoria</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="category" 
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
                    name="price"
                    step=".01"
                    placeholder="Digite o preço">
            </div>
            <div class="form-group">
                <label for="image">Imagem</label>
                <input 
                    type="file" 
                    class="form-control" 
                    id="image"
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
                    rows="3">
                </textarea>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>

            <!-- Exibir mensagem de resultado -->
            <?php if (isset($resultado)): ?>
                <div class="alert <?= $resultado["style"] ?> mt-2">
                    <?php echo htmlspecialchars($resultado['msg']); ?>
                </div>
            <?php endif; ?>

        </form>
    </div>
    
    <?php include("list_product.php"); ?>

    <?php if(count($products) > 0): ?>
        <div class="container">
            <dic class="col-12">
                <h3>Lista de Produtos Cadastrados...</h3>
            </dic>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Informação</th>
                    <th scope="col">Data Cadastro</th>
                    <th scope="row"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $product): ?>
                    <tr>
                        <th scope="row"><?= $product['id'] ?></th>
                        <td><?= $product['image'] ?></td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['category'] ?></td>
                        <td><?= $product['price'] ?></td>
                        <td><?= $product['info_additional'] ?></td>
                        <td><?= $product['created_at'] ?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button>
                            <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>