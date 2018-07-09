
        <?php
        /**
         * cette page présente le formulaire de creation des projets
         * 
         */
        include "template/header.php";
        include "template/navbar.php";

        ?>
        <br>
        <section class="container-fluid details_projet background_projet">
            <div class="row">
                <div class="projet_form col-xs-12 col-sm-10 col-md-8 offset-2">
                    <h1 class="projet_title text-center">Créez votre projet !</h1>

                    <form  method="POST" action="/creationProjet">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nom du Projet</label>
                            <input type="text" name="titre" class="form-control" id="titre" placeholder="Nom du projet">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" name="description" accesskey=""id="exampleFormControlTextarea1" placeholder="Description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Thème</label>
                            <select multiple class="form-control" name="theme"  id="exampleFormControlSelect2">
                                <?php foreach($themes as $theme) : ?>
                                <option value="<?= $theme->getId(); ?>"><?= ucfirst(implode(' ',explode('_',($theme->getIntitule())))); ?></option>
                                
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Image du projet</label>
                            <input type="text" name="image" placeholder="URL de l'image" class="form-control" id="imageprojet" placeholder="Url image du projet">
                        </div>
                      
                        <div class="btn-group btn-custom offset-5" role="group" aria-label="Basic example">
                         <button type="submit" class="btn btn-info">Valider</button>
                         <button TYPE='button' value='Annuler' onclick='location.href="/"' class="btn btn-secondary">Annuler</button>
                      
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php
        include "template/footer.php";
        ?>
