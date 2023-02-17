<!DOCTYPE html>
<html lang="fr">

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
    <h1 class="logo">velvet record</h1>
    <div class="container site">

        <div class="tab">
            <div class="row">
                <h1>Consulter un vinyle <span><a class="btn btn-primary link" href="insert.php"><span class="bi-plus"></span> ajouter un vinyle</a></span></h1>

                <?php
                require 'database.php';

                $db = Database::connect();

                $statement = $db->query("SELECT * FROM `disc` JOIN `artist` ON disc.artist_id = artist.artist_id;");
                
                while ($artist = $statement->fetch()) { 
                    echo '<div class="col-md-6 ">';
                    echo '<div class="img-thumbnail">';
                    echo '<img src="'.'/assets/img/'.$artist["disc_picture"].'" class="img-fluid" alt="'.$artist["disc_picture"].'">';
                    echo '<div class="caption">';
                    echo '<h4>'.$artist["disc_title"].'</h4>';
                    echo '<p><span class="accent">'.$disc["artist_id"].'</span></p>';
                    echo '<p><span class="accent">Label</span> :'.$artist["disc_label"].'</p>';
                    echo '<p><span class="accent">année</span> :'.$artist["disc_year"].'</p>';
                    echo '<p><span class="accent">genre</span> :'.$artist['disc_genre'].'</p>';
                    echo '<div class="boutton">';
                    echo '<a class="btn btn-primary" role="button" href="view.php?id='.$artist['disc_id'].'">Détails</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                };

                ?>
            </div>
        </div>
    </div>
</body>

</html>