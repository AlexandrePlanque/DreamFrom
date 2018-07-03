<?php
include "template/header.php";
include "template/navbar.php";
?>
<div class="container ">
    <div class="row profilcont">
        <div class="col-12 input-group profilpage">
		<div class="col-3 ">
			<div class="profile-sidebar">

				<div class="profile-userbuttons">
                                    <button type="button" class="btn custombtn activebtn" id="btnprofil">Mon Profil</button>
                                    <button type="button" class="btn custombtn middlebtn" id="btnprojet">Mes Projets</button>
                                    <button type="button lastone" class="btn custombtn" id="btnmsg">Mes Messages</button>
				</div>
                            
			</div>
		</div>

<div class="col-6 mt-4 profil mb-4" id="toggleprofil">
                   <div class="card-outline-secondary mt-2 debugprofil" id="">                        
                       <div class="card-img-top">
                           <!--<img class="img-fluid profilavatar offset-1" src="http://<?= $_SERVER['SERVER_NAME']?>/image/User_Avatar_2.png">-->
                           <img class="img-fluid profilavatar offset-1 mt-5" src="http://www.mag-ma.org/files/design/avatar_default.png">
                                    <button type="button" class="btn mt-3 avatarbtn">Modifier l'avatar</button>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="formprofils">
                                <div class="form-row">
                                 
                                    <!--<div class="form-group col-md-4 active-cyan-4">-->
                                <div class="input-group mb-2 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-user-circle"></i></div>
                                   </div>
                                        <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom" value='<?= $user->getNom() ?>'>
                                    </div>
                                <div class="input-group mb-2 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-user-circle"></i></div>
                                   </div>
                                        <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prénom" value='<?= $user->getPrenom() ?>'>
                                    </div>
                                <div class="input-group mb-2 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                   </div>
                                        <input type="text" id="tel" name="tel" class="form-control" placeholder="Téléphone" value='<?= $user->getTel() ?>'>
                                    </div>
                                <div class="input-group mb-2 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-at"></i></div>
                                   </div>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="Email" value='<?= $user->getEmail() ?>'>
                                    </div>
                                <div class="input-group col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-heart"></i></div>
                                   </div>
                                     <select class="form-control themeselector" name="theme_id" id="theme">
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
                                        <input type="text" id="numero" name="numero" class="form-control" placeholder="Numéro" value='<?= $user->getAdresse()->getNumero() ?>'>
                                    </div>
                                    <div class="input-group mt-5 mb-2 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-home"></i></div>
                                   </div>
                                        <input type="text" name="rue" id="rue" class="form-control" placeholder="Rue"  value='<?= $user->getAdresse()->getRue()?>'>
                                    </div>
                                    <div class="input-group mb-3 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-home"></i></div>
                                   </div>
                                        <input type="text" id="ville" name="ville" class="form-control" placeholder="Ville"  value='<?= $user->getAdresse()->getVille() ?>'>
                                    </div>
                                    <div class="input-group mb-3 col-md-6 active-cyan-4">
                                   <div class="input-group-prepend">
                                       <div class="input-group-text"><i class="fas fa-home"></i></div>
                                   </div>
                                        <input type="text" id="code_postal" name="code_postal" class="form-control" placeholder="Code postal"  value='<?= $user->getAdresse()->getCode_postal() ?>'>
                                    </div>
                                </div>

                                     <div class="form-row mt-3 container-fluid">
                                <div class="form-group col">
                                    <button type="button" class="btn validbtn  float-right" id="btnedit" onclick="preparePut(<?= $user->getId() ?>, <?= $user->getAdresse_id() ?>)">Modifier le profil</button>
                                </div>
                                     </div>
                            </form>
                            
                    </div>
                    </div>
</div>
<!--</div>-->
<div class="col-6 mt-4 projetshow projetprofil hide" id="toggleprojet">
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
  <div class="progress-bar customprogress" style="width:<?= $projet->getFeatProgress()?>"></div>
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
                            <!--                 Partie Message                      -->
                            
                            
                            
                            
                            
    <!--</div>-->
<!--<div class="container">-->
                            <!--<h3 class=" text-center">Messaging</h3>-->
<div class="messaging col-6 mt-4 " id="togglemsg">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat">
            <?php foreach($users as $plouc) : ?>
            <div class="chat_list active_chat">
              <div class="chat_people">
                  <div class="chat_img"> <img src="<?= $plouc->getAvatar() ?>" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5 onclick="getMessage(<?= $plouc->getId() ?>)"> <?= $plouc->getPseudo() ?><span class="chat_date"></span></h5>
                </div>
              </div>
            </div>
              <?php endforeach;?>
          </div>
        </div>
          <div class="inbox_chat">
            <div class="chat_list active_chat">
            <div class="msg_history" id="msgbox">
            <div class="incoming_msg">
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
            </div>
          </div>
        </div>
      </div>
              <div class="type_msg offset-5">
            <div class="input_msg_write">
              <input type="text" class="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
    </div>
    </div>
    </div>
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
<?php
include "template/footer.php";
?>

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