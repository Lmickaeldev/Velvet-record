<?php
     //recuperer la BDD
    require 'database.php';
    //variable pour les champ d'erreurs et valeurs
    $titreError = $labelError = $artistError = $anneeError = $priceError =$genreError = $imageError = $titre = $label = $artist = $annee = $price =$genre =$image= "";
    //si manquant a la soumission (booléen) avec la methode "post"
    if(!empty($_POST)) {
        $titre               = checkInput($_POST['disc_title']);
        $label               = checkInput($_POST['disc_label']);
        $artist       = checkInput($_POST['artist_id']);
        $price              = checkInput($_POST['disc_price']);
        $annee          = checkInput($_POST['disc_year']); 
        $genre          = checkInput($_POST['disc_genre']); 
        $image              = checkInput($_FILES["disc_picture"]);
        $imagePath          = '../images/'. basename($disc_piture);//path chemin de l'image
        $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);//extension de l'image (png,gif,jpeg...)
        $isSuccess          = true;
        $isUploadSuccess    = false;//
        //si non est vide
        if(empty($titre)) {
            $titreError = 'doit comporter un nom';
            $isSuccess = false;
        }//si la descritpion est vide
        if(empty($artist)) {
            $artistError = "doit comporter le nom de l'artist ";
            $isSuccess = false;
        }
        if(empty($label)) {
            $labelError = 'doit comporter le label';
            $isSuccess = false;
        }
         //si prix vide
        if(empty($price)) {
            $priceError = 'doit comporter des chiffre';
            $isSuccess = false;
        } //categorie non selectioné
        if(empty($genre)) {
            $genreError = 'un genre doit etre selectionné';
            $isSuccess = false;
        }
        if(empty($annee)) {
            $anneeError = "doit comporter l'année";
            $isSuccess = false;
        }
        //si image vde
        if(empty($image)) {
            $imageError = 'une image doit etre uploader';
            $isSuccess = false;
        }
        else {
            //si l'extenion n'est pas bonne 
            $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            //pour que l'image ne porte pas 2x le meme nom 
            if(file_exists($imagePath)) {
                $imageError = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            //pour limité la taille de l'image (en oct)
            if($_FILES["image"]["size"] > 500000) {
                $imageError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            //prendre le fichier pour la mettre dans le chemin
            if($isUploadSuccess) {
                //si false condition erreur
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        }
        //ajout a la base de donnée (si tout c'est bien passer plus haut)
        if($isSuccess && $isUploadSuccess) {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO disc (disc_id ,disc_title ,disc_year ,disc_picture ,disc_label ,disc_genre ,disc_price ,artist_id) values(?, ?, ?, ?, ?)");
            $statement->execute(array($disc_title ,$disc_year ,$disc_picture ,$disc_label ,$disc_genre ,$disc_price ,$artist_id));
            Database::disconnect();
            header("Location: index.php");
        }
    }
    //securité pour mettre en securité les données 
    function checkInput($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../assets/css/styles.css">
        <link rel="icon" type="image/png" href="./assets/img/icons8-90s-music-50.png" />
        <title>velvet record</title>
    </head>
    
    <body>
        <h1 class="logo"></span> velvet record </h1>
        <div class="container site">
            <div class="row">
                <h1>Ajouter un vinyle</h1>
                <br>
                <form class="form" action="<?php echo 'update.php?id=' . $disc_id; ?>" role="form" method="post" enctype="multipart/form-data">
                    <br>
                    <div>
                        <label class="form-label" for="name">titre:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="tire" value="<?=$disc_title?>">
                        <span class="help-inline"><?php echo $nameError; ?></span>
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="name">artiste:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="artiste" value="">
                        <span class="help-inline"><?php echo $nameError; ?></span>
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="name">année:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="année" value="">
                        <span class="help-inline"><?php echo $nameError; ?></span>
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="name">genre:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="genre" value="<?php echo $name; ?>">
                        <span class="help-inline"><?php echo $nameError; ?></span>
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="description">Label:</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Label" value="<?php echo $description; ?>">
                        <span class="help-inline"><?php echo $descriptionError; ?></span>
                    </div>
                    <br>
                    <div>
                        <label class="form-label" for="price">Prix: (en €)</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?php echo $price; ?>">
                        <span class="help-inline"><?php echo $priceError; ?></span>
                    </div>
                    <br>
                    
                    <div>
                        <label class="form-label" for="image">Image:</label>
                        <p><?php echo $image; ?></p>
                        <label for="image">Sélectionner une nouvelle image:</label>
                        <input type="file" id="image" name="image">
                        <span class="help-inline"><?php echo $imageError; ?></span>
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="bi-plus"></span> ajouter</button>
                        <a class="btn btn-primary" href="index.php"><span class="bi-arrow-left"></span> Retour</a>
                    </div>

                </form>
            </div>
        </div>   
    </body>
</html>