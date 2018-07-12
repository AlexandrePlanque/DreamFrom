    <?php
/**
 * cette page présente la page des projets
 * 
 */
include "template/header.php";
include "template/navbar.php";
?>
            <div class="pb-5 pt-5"> 
             <div class="container debugHeight">
        <div class="row custom-choice col-md-12">
            <select class="custom-select col-3 mr-3" id="theme">
                <option value="">Tous les themes</option>
                <?php foreach ($themes as $theme) : ?> 
                    <option value="<?= $theme->getIntitule() ?>"<?= ($this->inputGet()['intitule'] === $theme->getIntitule()) ? "selected='true'" : ""; ?>><?= ucfirst(implode(' ', explode('_', $theme->getIntitule()))) ?></option>
                <?php endforeach; ?>
            </select>
            <select class="custom-select col-3 " id="date">
                <option value="">Pas de préférences</option>
                <option value="desc" <?= ($this->inputGet()['date_creation'] === "desc") ? 'selected="true"' : ""; ?> >Les plus récents</option>
                <option value="asc" <?= ($this->inputGet()['date_creation'] === "asc") ? 'selected="true"' : ""; ?>>Les plus anciens</option>
                <option value="desc" <?= ($this->inputGet()['participants'] === "asc")? 'selected="true"': ""; ?>>Nombre de participants</option>
            </select>
            <div class="mr-1 active-cyan-4 mb-4 col-3">
                <div class="input-group mb-3">
                    <input class="form-control" autocomplete=off type="search" placeholder="Search" aria-label="Search" id="username">
                    <div class="input-group-append">

                        <button class="btn btn-info" onclick="searchProjet()"><i class="fas fa-search" ></i></button>
                    </div>
                </div>
            </div>
            <div class="col-2">
                        <a href="/createProjet" class="btn btn-info creat_proj bobo" role="button">Créer un projet</a>
                </div>
        </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
<!--            <div class="row">
                <a href="/createProjet" class="btn btn-info creat_proj offset-10" role="button">Créer un projet</a>
            </div>-->
    
        <div class="row">
<?php foreach($projets as $projet) : ?>
    
        <div class="col-xs-12 col-sm-4 col-md-3" >
            <div class="card_global">
                <a class="card_detail" href="http://dreamfrom/projets/<?= $projet->getID() ?>">
                    <img class=" img-fluid projet_image" src="<?= $projet->getImage() ?>" alt="projet image">
                        <div >
                            <h4 class="card_title"><?= $projet->getTitre() ?></h4>
                                <div class="card_bottom">
                                    <p>Chef de projet : <?= $projet->getLeader() ?></p>
                                    <div class="progress mb-3">
  <div class="progress-bar customprogress" style="width:<?= $projet->getFeatProgress()?>"></div>
</div> 
<!--                                    <div class="progress">
                                        <div class="progress-bar prog_bar progress-bar-striped " role="progressbar"
                                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?=$projet->getFeatProgress() ?>"></div>
                                    </div>-->
                                    <p><?=$projet->getFeatProgress() ?> terminés</p>
                                    <p><?= $projet->getParticipants()?> collaborateurs</p>
                                    <p>crée le <?= $projet->getDate_creation() ?></p>
                                </div>
                            </div>    
                        </div>
                    </a>    
                </div>
<?php   endforeach;?>
            </div>
        </div>
            </div>



<?php include "template/footer.php";?>