<?php include "template/header.php";
include "template/navbar.php";
?>
<section id="team" class="pb-5 membre">    <div class="container">
        <!--<h5 class="section-title h1">Liste des membres</h5>-->
        <select id="theme">
            <option value="">Tous les themes</option>
<?php foreach($themes as $theme) : ?>
            <option value="<?= $theme->getIntitule()?>"<?= ($this->inputGet()['intitule'] === $theme->getIntitule())? "selected='true'": ""; ?>><?= ucfirst(implode(' ',explode('_',$theme->getIntitule())))?></option>
<?php   endforeach;?>
        </select>
        <select id="date">
            <option value="">Pas de préférences</option>
            <option value="asc">Les plus récents</option>
            <option value="desc">Les plus anciens</option>
        </select>
        <input type="search" name="pseudo">
        
        <button onclick="search()">Go!</button>
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
                                    <a href="#secondpart">
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
        </div>
    </section>
<?php include "template/footer.php"; ?>
