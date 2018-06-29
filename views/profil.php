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
                                    <button type="button" class="btn custombtn activebtn" id="btnprofil">Mon Profil</button>
                                    <button type="button" class="btn custombtn middlebtn" id="btnprojet">Mes Projets</button>
                                    <button type="button lastone" class="btn custombtn" id="btnmsg">Mes Messages</button>
				</div>
                            
			</div>
		</div>

<!--<div class="row">-->

<div class="col-6 mt-4" id="toggleprofil">
                   <div class="card-outline-secondary mt-2 " id="">                        
                       <div class="card-img-top">
                           <!--<img class="img-fluid profilavatar offset-1" src="http://<?= $_SERVER['SERVER_NAME']?>/image/User_Avatar_2.png">-->
                           <img class="img-fluid profilavatar offset-1 mt-5" src="http://www.mag-ma.org/files/design/avatar_default.png">
                                    <button type="button" class="btn mt-3 avatarbtn">Modifier l'avatar</button>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" method="POST" action="http://<?= $_SERVER['SERVER_NAME']?>/edit">
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
                                        <input type="text" name="numero" class="form-control" placeholder="Numéro" value='<?= $user->getAdresse()->getNumero() ?>'>
                                    </div>
                                    <div class="input-group mt-5 mb-2 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-home"></i></div>
                                   </div>
                                        <input type="text" name="rue" class="form-control" placeholder="Rue"  value='<?= $user->getAdresse()->getRue()?>'>
                                    </div>
                                    <div class="input-group mb-3 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-home"></i></div>
                                   </div>
                                        <input type="text" name="ville" class="form-control" placeholder="Ville"  value='<?= $user->getAdresse()->getVille() ?>'>
                                    </div>
                                    <div class="input-group mb-3 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-home"></i></div>
                                   </div>
                                        <input type="text" name="code_postal" class="form-control" placeholder="Code postal"  value='<?= $user->getAdresse()->getCode_postal() ?>'>
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
<!--</div>-->
<div class="col-6 mt-4 " id="toggleprojet">
    <div class='row' >
        <?php foreach($projets as $projet) : ?>
        
                            <div class="card card-outline-secondary text-center  mt-2  cardprojet">
  <div class="card-header">
      <h4><?= $projet->getTitre()?></h4>
  </div>
  <div class="card-body">
      <img class="card-img projetimg " src=" <?= $projet->getImage()?>">
    <p class="card-text">Progression</p>
        <div class="progress custombgprogress mb-3">
  <div class="progress-bar customprogress" style="width:<?= $projet->getPourcentage()?>"></div>
</div> 

<div id="bar-basic" value="100">
   
</div>
    <a href="#" class="btn btn-primary">Accéder au projet</a>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>
        <?php  endforeach; ?>
</div>
                    </div>
    </div>
    </div>
                            <!--                 Partie Projets                             -->
                            
    </div>

<?php
include "template/footer.php";
