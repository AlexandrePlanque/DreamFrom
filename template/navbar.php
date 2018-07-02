<div>
<nav class="navbar navbar-expand-lg navbar-dark bg-perso" id="secondpart">
    <a class="navbar-brand entete" href="#">DreamFrom</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse align-content-start" id="navbarsExample05">
        <ul class="navbar-nav ml-auto mr-5">
            <li class="nav-item">
                <a class="nav-link" href="#" id="home">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Projets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/membres">Membres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Connexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/inscription">Inscription</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>

    </div>
</nav>
</div>



<div class="container pb-modalreglog-container">
    <div class="row">
        <div class="col-xs-12 col-md-4 offset-md-4">
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form class="form" role="form" autocomplete="off" method="POST" action="http://<?= $_SERVER['SERVER_NAME']?>/signin">
                                <div class="form-group active-cyan-4">

                                    <div class="input-group pb-modalreglog-input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                                        </div>
                                        <input name="pseudo" type="text" class="form-control" id="pseudo" placeholder="Pseudo">
                                    </div>
                                </div>
                                <div class="form-group active-cyan-4">
                                    <div class="input-group pb-modalreglog-input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                        </div>
                                        <input name="password" type="password" class="form-control" id="pws" placeholder="Password">
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
</div>