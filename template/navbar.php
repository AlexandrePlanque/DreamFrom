
<nav class="navbar navbar-expand-lg navbar-dark bg-perso naventete" id="secondpart">
    <a class="navbar-brand entete" href="/">DreamFrom</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
                <div class="collapse navbar-collapse align-content-start" id="navbarsExample05">
                    <ul class="navbar-nav ml-auto mr-4 naventete" id="navbar">
                        <li class="nav-item" id="home">
                            <a class="nav-link" href="/">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item" id="projet">
                            <a class="nav-link" href="/projets">Projets</a>
                        </li>
                        <li class="nav-item" id="membre">
                            <a class="nav-link " href="/membres">Membres</a>
                        </li>
                        <li class="nav-item hide" id="bar">
                            <a class="nav-link"  href="#">Bar</a>
                        </li>
                        <?= (!isset($_COOKIE['cookie'])? 
                        '<li class="nav-item">
                            <a class="nav-link " href="" data-toggle="modal" data-target="#myModal">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/inscription">Inscription</a>
                        </li>' :
                        '<li class="nav-item dropdown" id="profil">
                           <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.json_decode($_COOKIE['cookie'],true)['pseudo'].'</a>
                           <div class="dropdown-menu" aria-labelledby="dropdown05">
                              <a class="dropdown-item" href="/profil/?display=profil">Mon Profil</a>
                              <a class="dropdown-item" href="/profil/?display=projet">Mes Projets</a>
                              <a class="dropdown-item" href="/profil/?display=message">Mes Messages</a>
                               <a class="dropdown-item" href="/" onclick="disconnect()">Déconnexion</a>

                           </div>
                       </li>'
                       ) ?>
                        <li class="nav-item mt-2">
                            <a class="social-icon text-center" target="_blank" href="#">
                                <i class="fa fa-twitter mt-2"></i>
                            </a>
                        </li>
                        <li class="nav-item mt-2">
                            <a class="social-icon text-center" target="_blank" href="#">
                                <i class="fa fa-facebook mt-2"></i>
                            </a>
                        </li>
                    </ul>

                </div>
    </nav>