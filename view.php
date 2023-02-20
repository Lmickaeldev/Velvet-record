<?php
    // connection base de donné
    require 'database.php';

    //connection a la database
    $db = Database::connect();

    // recuperation de l'id
    $id=$_GET['id'];
    
    //recuperation des donné de la base
    $statement = $db->prepare('SELECT * FROM `disc` JOIN `artist` ON disc.artist_id = artist.artist_id
                                WHERE disc_id= ?');
    
    $statement->execute([$id]);
    //stockage dans une ligne 
    $artist= $statement->fetch();
    Database::disconnect();
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="icon" type="image/png" href="./assets/img/icons8-90s-music-50.png" />
    <title>velvet record</title>
</head>
    
    <body>
        <h1 class="logo">velvet record</span></h1>
        <div class="container site">
            <div class="row">
            <div class="col-md-6"><h1><strong>voir un vinyle</strong></h1>
            <br>
            <form>
            <?='<p><span class="accent">'.$artist["artist_name"].'</span></p>'?>
                <div class="form-group">
                    <label>titre :</label><?php  echo  ' '.$artist['disc_title']; ?>
                </div>
                
                <div class="form-group">
                    <label>année :</label><?php echo ' '.$artist['disc_year']; ?>
                </div>
                <div class="form-group">
                    <label>label :</label><?php echo ' '.$artist['disc_label']; ?>
                </div>
                <div class="form-group">
                    <label>artiste :</label><?php echo ' '.$disc["artist_id"]; ?>
                </div>
                <div class="form-group">
                    <label>genre :</label><?php echo ' '.$artist['disc_genre']; ?>
                </div>
                <div class="form-group">
                    <label>Prix :</label><?php echo ' '.number_format($artist['disc_price'], 2, '.', '') .'€'; ?>
                </div>
                <div class="form-group">
                    <label>Image :</label><?php echo ' '.$artist["disc_picture"]; ?>
                </div>
            </form>
            </div>
                <div class="col-md-6 site">
                            <div class="img-thumbnail-2">
                                <img src="<?php echo '/assets/img/' . $artist["disc_picture"] ; ?>" class="img-fluid" alt="...">
                                </div>
                                <div class="caption-2">
                                    <h4><?php echo $artist['disc_title']; ?></h4>
                                    <p><?php echo $artist["artist_name"]; ?></p>
                                </div>
                            </div>
                </div> 
            
                <div class="form-action"><a class="btn btn-primary" href="index.php"><i class="bi bi-arrow-left"></i>RETOUR</a>
                <a class="btn btn-primary" role="button" href="update.php?id=<?=$artist['disc_id']?>">modifier</a>
            </div>
            </div>
        </div>
    </body>
</html>
