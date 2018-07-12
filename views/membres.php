<?php include "template/header.php";
include "template/navbar.php";
?>
<!--<div class="team pb-5 membre">-->    
    <div class="container">
        <!--<h5 class="section-title h1">Liste des membres</h5>-->
        <div class="row col-12">
            <div class="input-group mb-3">
  <select class="custom-select col-3" id="inputGroupSelect01">
    <option selected>Choose...</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
</div>
<!--            <div class="input-group ">
  <select class="custom-select col-3" id="inputGroupSelect04">
    <option selected>Choose...</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
  <div class="input-group-append">
    <button class="btn btn-info" type="button">Button</button>
  </div>
</div>
            -->
            
            <div class="input-group mb-3 col-3">
  <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-info" type="button"><i class="fas fa-search" ></i></button>
  </div>
</div>
            
            
        <select class="form-control col-3 mr-5" id="theme">
            <option value="">Tous les themes</option>
<?php foreach($themes as $theme) : ?>
            <option value="<?= $theme->getIntitule()?>"<?= ($this->inputGet()['intitule'] === $theme->getIntitule())? "selected='true'": ""; ?>><?= ucfirst(implode(' ',explode('_',$theme->getIntitule())))?></option>
<?php   endforeach;?>
        </select>
        <select class="form-control col-3 mr-5" id="date">
            <option value="">Pas de préférences</option>
            <option value="desc" <?= ($this->inputGet()['date_creation'] === "desc")? 'selected="true"': ""; ?> >Les plus récents</option>
            <option value="asc" <?= ($this->inputGet()['date_creation'] === "asc")? 'selected="true"': ""; ?>>Les plus anciens</option>
        </select>
        <div class="active-cyan-4 mb-4 col-3">
            <div class="input-group mb-3">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="username">

        </div>
        <!--<input type="search" name="pseudo" id="username">-->
        
        </div>
        <button class="searchbutton" onclick="search()"><i class="fas fa-search" ></i></button>
        </div>
            
        
        <div class="row">
<?php foreach($users as $user) : ?>
    
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside test">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="<?= $user->getAvatar() ?>" alt="card image"></p>
                                    <h4 class="card-title"><?= $user->getPseudo() ?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="backside test top">
                            <div class="card">
                                <div class="card-body text-center mt-4">
<!--                                    <h4 class="card-title title-back">Détails</h4>-->
                                    <p class="card-text"><img src="http://<?= $_SERVER['SERVER_NAME']?>/image/note-blog.png" class="notebook"> <?= date("d-m-Y", strtotime($user->getDate_creation())); ?></p>
                                    <p class="card-text"><img src="http://<?= $_SERVER['SERVER_NAME']?>/image/like.png" class="coeursurtoname"> <?= ucfirst(implode(' ' ,explode('_' ,$user->getTheme_id()))) ?></p>
                                    <a href="#secondpart" class="acontact">
                                        <div class="contact">
                                        </div>
                                    </a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
endforeach;?>
        <!--</div>-->
    </div>
<?php include "template/footer.php"; ?>
