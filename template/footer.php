<div class="row">
       <div cclass="col-xs-12 col-md-4 offset-md-4">
            <div class="modal fade" id="myModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form role="form" autocomplete="off" method="POST" action="http://<?= $_SERVER['SERVER_NAME']?>/signin">
                                <div class="form-group active-cyan-4">
                                    <div class="input-group pb-modalreglog-input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                        </div>
                                        <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo">
                                    </div>
                                </div>
                                <div class="form-group active-cyan-4">
                                    <div class="input-group pb-modalreglog-input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                        </div>
                                        <input type="password" class="form-control" id="pws" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="pass "><a href="#">Mot de passe oublié ?</a></div>
                                    <div class="pass "><a href="/inscription" class="link">Nouveau Membre ?</a></div>
                                    <button type="submit" class="btn btn-outline-info btn-sm btn_connexion">Connexion</button>                
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
	<section id="footer" class=" container-fluid bot">
            <div class="row flex-container">
                <div class="footlogo col-md-3 col-sm-4 col-xs-6 mt-4 ">
                    <img class="img-fluid footlogo" src="http://<?= $_SERVER['SERVER_NAME']?>/image/logo.png">
                </div>  
                <div class="offset-1 col-md-7 col-sm-8 col-xs-12">
                    <ul class="test1 mt-4   ">
                        <li>Tous droits réservés</li>
                        <li>Conditions</li>
                        <li>Mentions Légales</li>
                        <li><a><img src="../image/twiter_nav.png"></a></li>
                        <li><a><img src="../image/facebook_nav.png"></a></li>
                    </ul>
                </div>
            </div>
	</section>
<script src="http://<?= $_SERVER['SERVER_NAME'] ?>/js/script.js"></script>
<script src="http://<?= $_SERVER['SERVER_NAME'] ?>/js/profilscript.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="http://<?= $_SERVER['SERVER_NAME'] ?>/js/messagerie.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
