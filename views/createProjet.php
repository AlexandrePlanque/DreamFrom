
        <?php
        /**
         * cette page présente le formulaire de creation des projets
         * 
         */
        include "template/header.php";
        include "template/navbar.php";

        ?>
<div class="container debugHeight">
    <div class="row">
        <div class="col-md-6 offset-md-3 formulaire">
            <div class="card card-outline-secondary">
                <div class="card-header">
                    <h4 class="mb-0 text-center">Créer un Projet</h3>
                </div>
                <div class="card-body">
                    <form class="form" role="form" autocomplete="off" method="POST" action="http://<?= $_SERVER['SERVER_NAME'] ?>/creationProjet">
                        <div class="form-row">
                            <div class="form-group col-md-6 active-cyan-4">
                                <label for="inputName">Nom du projet</label>
                                <input type="text" name="titre" class="form-control" placeholder=""required="" required oninvalid="this.setCustomValidity('Nom incorrect')"oninput="setCustomValidity('')">
                            </div>
                                
                            <select class="custom-select col-md-6 custom-theme" name="theme" id="theme">
                                <option value="">Themes</option>
                                <?php foreach ($themes as $theme) : ?> 
                                    <option value="<?= $theme->getId(); ?>"><?= ucfirst(implode(' ',explode('_',($theme->getIntitule())))); ?></option>    
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Description</label>
                             <textarea class="form-control customTextArea" name="description" accesskey=""id="exampleFormControlTextarea1" placeholder="" rows="3"required="" required oninvalid="this.setCustomValidity('Description incorrecte')"oninput="setCustomValidity('')"></textarea>
                        </div>
                        <div class="form-group active-cyan-4">
                            <label for="exampleFormControlInput2">Image du projet</label>
                    <input type="text" name="image" placeholder="URL de l'image" class="form-control" id="imageprojet" placeholder="Url image du projet"required="" required oninvalid="this.setCustomValidity('Image incorrect')"oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btninscription">Créer votre Projet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        
        <?php include "template/footer.php"; ?>