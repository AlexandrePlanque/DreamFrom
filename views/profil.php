<?php
include "template/header.php";
include "template/navbar.php";
?>
<div class="container">
    <div class="row">
        <div class="col-12 input-group">
		<div class="col-3 ">
			<div class="profile-sidebar">

				<div class="profile-userbuttons">
                                    <button type="button" class="btn custombtn">Mon Profil</button>
                                    <button type="button" class="btn custombtn activebtn middlebtn">Mes Projets</button>
                                    <button type="button lastone" class="btn custombtn">Mes Messages</button>
				</div>
                            
			</div>
		</div>

<!--<div class="row">-->

<div class="col-6 mt-4">
                   <div class="card card-outline-secondary mt-2" id="toggle">                        
                       <div class="card-img-top">
                           <!--<img class="img-fluid profilavatar offset-1" src="http://<?= $_SERVER['SERVER_NAME']?>/image/User_Avatar_2.png">-->
                           <img class="img-fluid profilavatar offset-1 mt-5" src="http://www.mag-ma.org/files/design/avatar_default.png">
                                    <button type="button" class="btn mt-3 avatarbtn">Modifier l'avatar</button>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" method="POST" action="http://<?= $_SERVER['SERVER_NAME']?>/register">
                                <div class="form-row">
                                 
                                    <!--<div class="form-group col-md-4 active-cyan-4">-->
                                <div class="input-group mb-2 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-user-circle"></i></div>
                                   </div>
                                        <input type="text" name="nom" class="form-control" placeholder="Nom" value='<?= $user->getNom() ?>'>
                                    </div>
                                <div class="input-group mb-2 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-user-circle"></i></div>
                                   </div>
                                        <input type="text" name="prenom" class="form-control" placeholder="Prénom" value='<?= $user->getPrenom() ?>'>
                                    </div>
                                <div class="input-group mb-2 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                   </div>
                                        <input type="text" name="telephone" class="form-control" placeholder="Téléphone" value='<?= $user->getTel() ?>'>
                                    </div>
                                <div class="input-group mb-2 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-at"></i></div>
                                   </div>
                                        <input type="text" name="Email" class="form-control" placeholder="Email" value='<?= $user->getEmail() ?>'>
                                    </div>
                                <div class="input-group col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-heart"></i></div>
                                   </div>
                                     <select class="form-control themeselector " id="theme">
                                         <?php foreach($themes as $theme) :?>
                                        <option value="<?= $theme->getIntitule()?>"<?= ($user->getTheme() === $theme->getIntitule())? "selected='true'": ""; ?>><?= ucfirst(implode(' ',explode('_',$theme->getIntitule())))?></option>
                                        <?php  endforeach; ?>
                                    </select>
                                </div>
                                </div>
                                <div class="form-row">
                                    <div class="input-group mt-5 mb-2 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-home"></i></div>
                                   </div>
                                        <input type="text" name="numero" class="form-control" placeholder="Numéro" value='<?= "test" ?>'>
                                    </div>
                                    <div class="input-group mt-5 mb-2 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-home"></i></div>
                                   </div>
                                        <input type="text" name="rue" class="form-control" placeholder="Rue">
                                    </div>
                                    <div class="input-group mb-3 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-home"></i></div>
                                   </div>
                                        <input type="text" name="ville" class="form-control" placeholder="Ville">
                                    </div>
                                    <div class="input-group mb-3 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-home"></i></div>
                                   </div>
                                        <input type="text" name="code_postal" class="form-control" placeholder="Code postal">
                                    </div>
                                </div>

                                     <div class="form-row mt-3 container-fluid">
                                <div class="form-group col">
                                    <button type="submit" class="btn validbtn  float-right">Modifier le profil</button>
                                </div>
                                     </div>
                            </form>
                    </div>
                    </div>
                    </div>
    </div>
    </div>
    </div>

<!--    
    <div class="row">
<div class="col-md-12">
    <div class="accordion-wrapper">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Featured Story
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <h4>Slide Title</h4>
                </div>
            </div>
        </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">About The Reins Act
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <h4>Slide Title</h4>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Video
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
                <h4>Slide Title</h4>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingFour">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseFour">Photos
                </a>
            </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
            <div class="panel-body">
                <h4>Slide Title</h4>
            </div>
        </div>
    </div>
    </div>
</div>-->

<!--		<div class="col-md-9">
            <div class="profile-content">
                <div class="input-group mb-2 col-md-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-user"></i></div>
                                   </div>
                <input placeholder="Nom">
                <div class="input-group mb-2">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-user"></i></div>
                                   </div>
                    
                <input placeholder="Prénom">
                <div class="input-group mb-2">
                   <div class="input-group-prepend">
                       <div class="input-group-text"><i class="fas fa-phone"></i></div>
                   </div>
                <input placeholder="Téléphone">
                <div class="input-group mb-2">
                   <div class="input-group-prepend">
                       <div class="input-group-text"><i class="fas fa-envelope-square"></i></div>
                   </div>
                <input placeholder="Adresse mail">
                </div>
                <div class="col-md-5">
                <div class="input-group mb-2">
                   <div class="input-group-prepend">
                       <div class="input-group-text"><i class="fas fa-envelope-square"></i></div>
                   </div>
                <input placeholder="truc">
                <div class="input-group mb-2">
                   <div class="input-group-prepend">
                       <div class="input-group-text"><i class="fas fa-envelope-square"></i></div>
                   </div>
                <input>
                </div>
            </div>
		</div>
	</div>
</div>
                </div>
    </div>
</div>-->

<?php
include "template/footer.php";