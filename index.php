<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Pedidos 1.0</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-4">
            <h2 class="text-center">Efetuar Login</h2>
            <form id="form_login" action="login.php" method="post">
                <!-- Exibir mensagem de resultado -->
                <?php if (isset($resultado) && $resultado['cod'] == 0): ?>
                    <div class="alert alert-danger">
                        <?php echo htmlspecialchars($resultado['msg']); ?>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        class="form-control" 
                        placeholder="Digite seu E-Mail">
                </div>
                <div class="form-group">
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="form-control" 
                        placeholder="Digite sua Senha">
                </div>
                <div class="form-group text-center">
                    <input 
                        type="submit" 
                        id="submit" 
                        class="btn btn-primary"
                        value="Entrar">
                </div>
            </form>
        </div>
    </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php if (isset($resultado) && $resultado['cod'] == 0): ?>
                document.getElementById("form_login").reset();
            <?php endif; ?>
        });
    </script>
</html>