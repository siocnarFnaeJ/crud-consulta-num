<html lang="pt-br">
    <head>
            <title>Consulta Disponibilidade Numérica</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php require_once 'process.php'; ?>        
        <?php        
        if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']); 
            ?>
        </div>
    <?php endif ?>
        <div class="container">            
            <?php
            $mysqli = new mysqli('localhost', $dbuser, $dbsenha, 'telefonia') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM BASE") or die(mysqli_error($mysqli));
            //pre_r($result);
           ?>
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Cidade.</th>
                        <th>Região.</th>
                        <th>Estado.</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
        <?php
            while ($row = $result->fetch_assoc()): 
        ?>
            <tr>
                <td><?php echo $row['cidade']?></td>
                <td><?php echo $row['regiao']?></td>
                <td><?php echo $row['estado']?></td>
                <td>
                    <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Editar</a>
                    <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Deletar</a>
                </td>
            </tr>
        <?php endwhile; ?>
            </table>
        </div>
        <?php
                function pre_r( $array ) {
                    echo '<pre>';
                    print_r($array);
                    echo '</pre>';
            }
        ?>
        <div class="row justify-content-center">
            <form action="process.php" method="POST"> 
                <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                    <label for>Cidade</label>
                    <input type="text" name="cidade" class="form-control" 
                           value="<?php echo $cidade; ?>" placeholder="Cidade:">
                </div>
                <div class="form-group">
                    <label>Regiao</label>
                    <input type="text" name="regiao" class="form-control"
                            value="<?php echo $regiao; ?>" placeholder="Regiao:">
                </div>
                <div class="form-group">
                    <label>Estado</label>
                    <input type="text" name="estado" class="form-control" value="<?php echo $estado; ?>"
                    placeholder="Estado:">
                </div>
                <div class="form-group">
                <?php
                      if ($update == true) :
                      ?>
                          <button type="submit" class="btn btn-info" name="update">Update</button>
                        <?php else : ?>
                            <button class="btn btn-primary" type="submit" name="save">Salvar</button>
                        <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
    <!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
   </body>
</html>

