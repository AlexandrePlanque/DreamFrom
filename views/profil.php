<?php
include "template/header.php";
include "template/navbar.php";
?>
<div class="container containerdebug">
    <div class="row profilcont">
        <div class="col-12 input-group profilpage" id="contenuProfil">
		<div class="col-3 ">
			<div class="profile-sidebar">

				<div class="profile-userbuttons">
                                    <button type="button" class="btn custombtn" id="btnprofil" onclick="displayProfil()">Mon Profil</button>
                                    <button type="button" class="btn custombtn middlebtn" id="btnprojet" onclick="displayProjet()">Mes Projets</button>
                                    <button type="button" class="btn custombtn" id="btnmsg" onclick="displayMessage()">Mes Messages</button>
				</div>
                            
			</div>
		</div>

<div class="col-6 profil hide" id="toggleprofil">
                   <div class="card-outline-secondary debugprofil" id="">                        
                       <div class="card-img-top">
                           <img class="img-fluid profilavatar offset-1 mt-5" id="avatarUtilisateur" src="<?= $user->getAvatar() ?>">
                                    <button type="button" class="btn mt-3 avatarbtn" data-toggle="modal" data-target="#modalContactForm">Modifier l'avatar</button>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="formprofils">
                                <div class="form-row">
                                 
                                    <!--<div class="form-group col-md-4 active-cyan-4">-->
                                <div class="input-group mb-2 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text">
                                           <i class="fas fa-user-circle"></i>
                                       </div>
                                   </div>
                                    <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom" required="" required oninvalid="this.setCustomValidity('Nom incorrect')"oninput="setCustomValidity('')"value='<?= $user->getNom() ?>'>
                                </div>
                                <div class="input-group mb-2 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-user-circle"></i></div>
                                   </div>
                                    <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prénom" required="" required oninvalid="this.setCustomValidity('Prénom incorrect')"oninput="setCustomValidity('')"value='<?= $user->getPrenom() ?>'>
                                    </div>
                                <div class="input-group mb-2 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                   </div>
                                        <input type="text" id="tel" name="tel" class="form-control" placeholder="Téléphone" required="" required oninvalid="this.setCustomValidity('Téléphone incorrect')"oninput="setCustomValidity('')"value='<?= $user->getTel() ?>'>
                                    </div>
                                <div class="input-group mb-2 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-at"></i></div>
                                   </div>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="Email" required="" required oninvalid="this.setCustomValidity('Email incorrect')"oninput="setCustomValidity('')"value='<?= $user->getEmail() ?>'>
                                    </div>
                                <div class="input-group col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-heart"></i></div>
                                   </div>
                                     <select class="custom-select" name="theme_id" id="theme">
                                         <?php foreach($themes as $theme) :?>
                                        <option name="<?= $theme->getId()?>" value="<?= $theme->getId()?>"<?= ($user->getTheme() === $theme->getIntitule())? "selected='true'": ""; ?>><?= ucfirst(implode(' ',explode('_',$theme->getIntitule())))?></option>
                                        <?php  endforeach; ?>
                                    </select>
                                </div>
                                </div>
                                <div class="form-row">
                                    <div class="input-group mt-5 mb-2 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-home"></i></div>
                                   </div>
                                        <input type="text" id="numero" name="numero" class="form-control" placeholder="Numéro" required="" required oninvalid="this.setCustomValidity('Numéro incorrect')"oninput="setCustomValidity('')"value='<?= $user->getAdresse()->getNumero() ?>'>
                                    </div>
                                    <div class="input-group mt-5 mb-2 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-home"></i></div>
                                   </div>
                                        <input type="text" name="rue" id="rue" class="form-control" placeholder="Rue"  required="" required oninvalid="this.setCustomValidity('Rue incorrecte')"oninput="setCustomValidity('')"value='<?= $user->getAdresse()->getRue()?>'>
                                    </div>
                                    <div class="input-group mb-3 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-home"></i></div>
                                   </div>
                                        <input type="text" id="ville" name="ville" class="form-control" placeholder="Ville"  required="" required oninvalid="this.setCustomValidity('Ville incorrecte')"oninput="setCustomValidity('')"value='<?= $user->getAdresse()->getVille() ?>'>
                                    </div>
                                    <div class="input-group mb-3 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-home"></i></div>
                                   </div>
                                        <input type="text" id="code_postal" name="code_postal" class="form-control" placeholder="Code postal"  required="" required oninvalid="this.setCustomValidity('Code postal incorrect')"oninput="setCustomValidity('')"value='<?= $user->getAdresse()->getCode_postal() ?>'>
                                    </div>
                                </div>

                                     <div class="form-row mt-3 container-fluid">
                                <div class="form-group col">
                                    <button type="button" class="btn validbtn  float-right" data-toggle="modal" data-target="#validProfil" id="lateteafabien">Modifier le profil</button>
                                </div>
                                     </div>
                                

                                
                            </form>
                            
                    </div>
                    </div>
</div>
<!--</div>-->
<div class="col-6 projetshow hide" id="toggleprojet">
    
<?php (isset($projets))? include 'views/profilProjet.php': include 'views/profilProjetEmpty.php' ?>
                    </div>
    <!--</div>-->
                            <!--                 Partie Message                      -->
                            
                            
                            
                            
                            
    <!--</div>-->
<!--<div class="container">-->
                            <!--<h3 class=" text-center">Messaging</h3>-->
<div class="messaging col-7 hide" id="togglemsg">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Membres</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar hide"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat">
            <?php foreach($users as $plouc) : ?>
              <?php if($user->getId() !== $plouc->getId() && $plouc->getContact() !== "0") : ?>
            <div class="chat_list active_chat">
              <div class="chat_people">
                  <div class="chat_img"> <img src="<?= ($plouc->getAvatar() !== "")? $plouc->getAvatar() : '../image/defaultUser.jpg' ?>" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5 onclick="getMessage(<?= $plouc->getId() ?>)"> <?= $plouc->getPseudo() ?><span class="chat_date"></span></h5>
                </div>
              </div>
            </div>
              <?php endif; ?>
              <?php endforeach;?>
          </div>
        </div>
          <div class="inbox_chat">
            <div class="chat_list active_chat">
            <div class="msg_history" id="msgbox">
<!--            <div class="incoming_msg">
              <div class="incoming_msg_img"> 
                  <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> 
              </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Test which is a new approach to have all
                    solutions</p>
                  <span class="time_date"> 11:01 AM    |    June 9</span></div>
              </div>
            </div>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Test which is a new approach to have all
                  solutions</p>
                <span class="time_date"> 11:01 AM    |    June 9</span> </div>
            </div>
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Test, which is a new approach to have</p>
                  <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
              </div>
            </div>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Test which is a new approach to have all
                  solutions</p>
                <span class="time_date"> 11:01 AM    |    June 9</span> </div>
            </div>
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Test, which is a new approach to have</p>
                  <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
              </div>
            </div>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Test which is a new approach to have all
                  solutions</p>
                <span class="time_date"> 11:01 AM    |    June 9</span> </div>
            </div>
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Test, which is a new approach to have</p>
                  <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
              </div>
            </div>-->
          </div>
        </div>
      </div>
              <div class="type_msg offset-5">
            <div class="input_msg_write">
              <input type="text" class="write_msg" placeholder="Type a message" autocomplete="off" id="inputMsg"/>
              <button class="msg_send_btn" type="button" id="sendbtn"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
    </div>
    </div>
    </div>
    </div>
    <!--</div>-->
    <!--<div id="id"></div>-->
    </div>
<!--        <div class="mesgs hide">
          <div class="msg_history">
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Test which is a new approach to have all
                    solutions</p>
                  <span class="time_date"> 11:01 AM    |    June 9</span></div>
              </div>
            </div>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Test which is a new approach to have all
                  solutions</p>
                <span class="time_date"> 11:01 AM    |    June 9</span> </div>
            </div>
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>Test, which is a new approach to have</p>
                  <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
              </div>
            </div>
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>Apollo University, Delhi, India Test</p>
                <span class="time_date"> 11:01 AM    |    Today</span> </div>
            </div>
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>We work directly with our designers and suppliers,
                    and sell direct to you, which means quality, exclusive
                    products, at a price anyone can afford.</p>
                  <span class="time_date"> 11:01 AM    |    Today</span></div>
              </div>
            </div>
          </div>
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" class="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>-->

<!--            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>-->
<!--            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>-->
<!--            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>-->
<!--            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>-->
<!--            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>-->
<!--            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>-->



 <div class="modal fade" id="validProfil" href="javascript:;">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Confirmation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Souhaitez vous confirmer ces changements ?
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary float-right" onclick="preparePut(<?= $user->getId()?>, <?= $user->getAdresse_id()?>)" data-dismiss="modal">Confirmer</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        </div>
        
      </div>
    </div>
  </div>

<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Modification de votre avatar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <img class="img-fluid" id="imgAvatarPro">
                </div>

                <div class="md-form">
                    <i class="fa fa-pencil prefix grey-text"></i>
                    <input type="text" id="form8" class="md-textarea form-control" autocomplete="off" placeholder="L'url de votre image"></textarea>

                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-unique" onclick='putAvatar(<?= $user->getId()?>)' data-toggle="modal" data-target="#modalContactForm">Modifier</button>
            </div>
        </div>
    </div>
</div>


<?php
include "template/footer.php";
?>
