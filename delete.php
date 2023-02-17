<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="./assets/css/styles.css">
        <link rel="icon" type="image/png" href="./assets/img/icons8-90s-music-50.png" />
        <title>velvet record</title>
    </head>
    
    <body>
        <h1 class="logo">velvet Record</h1>
        <div class="container site">
            <div class="row">
                <h1>Supprimer le vinyle</h1>
                <br>
                <form class="form" action="delete.php" role="form" method="post">
                    <br>
                    <input type="hidden" name="id" value="<?php echo $id;?>"/>
                    <p class="alert alert-danger">Etes vous sur de vouloir supprimer ?</p>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-danger">Oui</button>
                      <a class="btn btn-secondary" href="index.php">Non</a>
                    </div>
                </form>
            </div>
        </div>   
    </body>
</html>