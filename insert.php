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
                <h1><strong>Ajouter un vinyle</strong></h1>
                <br>
                <form class="form" action="<?php echo 'update.php?id=' . $id; ?>" role="form" method="post" enctype="multipart/form-data">
                    <br>
                    <div>
                        <label class="form-label" for="name">titre:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="tire" value="">
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