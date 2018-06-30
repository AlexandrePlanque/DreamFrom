<html>
    <head>
        <script src="http://<?= $_SERVER['SERVER_NAME'] ?>/css/bootstrap/js/bootstrap.min.js"></script>
        <link href="http://<?= $_SERVER['SERVER_NAME'] ?>/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['SERVER_NAME'] ?>/css/style.css">
        <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['SERVER_NAME'] ?>/css/createproj.css">
    </head>
    <body>

        <?php
        /**
         * cette page présente la page des projets
         * 
         */
        include "template/header.php";
        include "template/navbar.php";
        ?>
        <br>
        <section class="container-fluid details_projet">
            <div class="row">
                <div class="projet_form col-xs-12 col-sm-10 col-md-8 offset-2">
                    <h1 class="projet_title">Créez votre projet !</h1>

                    <form  method="POST" action="creationProjet">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nom du Projet</label>
                            <input type="text" class="form-control" id="nomprojet" placeholder="Nom du projet">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Thème</label>
                            <select multiple class="form-control" id="exampleFormControlSelect2">
                                <option>1</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Image du projet</label>
                            <input type="text" class="form-control" id="nomprojet" placeholder="Url image du projet">
                        </div>
                        <div class="btn-group btn-custom offset-5" role="group" aria-label="Basic example">
                         <button type="submit" class="btn btn-info">Valider</button>
                         <button type="submit" class="btn btn-secondary">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php
        include "template/footer.php";
        ?>
    </body>
</html>