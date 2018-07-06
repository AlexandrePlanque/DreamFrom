<?php
include "template/header.php";
include "template/navbar.php";
?>

<div class="background">
    <div class="box fond"><h3 class="firsttitle text-center animated fadeInDown" style="padding-top: 30px;padding-bottom: 30px;">Shadow Fall</h3></div>
    <div class="container-fluid text-center">    
        <div class="row">
            <div class="col-md-8 col-sm-12 col-12">
                <img class="animated fadeInLeft" src="http://<?= $_SERVER['SERVER_NAME'] ?>/image/drone.jpg"  style="width:80%">





            </div>

            <div class="col-md-4">

                <div class="animated fadeInRight">


                    <img  class="img-fluid avatar d-none d-md-block"src="http://<?= $_SERVER['SERVER_NAME'] ?>/image/avatar.svg">
                    <p class="info d-none d-md-block">Progression</p>
                    <div class="d-none d-md-block">
                        <div class="progress progress_opti1">
                            <div class="progress-bar"></div>
                        </div>
                    </div>
                    <p class="info d-none d-md-block">15 Participants</p>
                    <p class="info d-none d-md-block">jeux video</p>
                    <div class="info">
                        <button id="join_projet" onclick="get_projet_id()" type="button" class="btn btn-info d-none d-md-block">Rejoindre le Projet</button>
                    </div>
                </div>

            </div>
        </div>
        <div class="animated fadeInRight">
            <div class="row">

                <div class="col-12"><p class="d-md-none">Progression</p></div>
                <div class="progress progress_opti2 d-md-none">
                    <div class="progress-bar d-md-none"></div>
                </div>

                <div class="col-12 testo">
                    <p class="testo data2  d-md-none">15 Participants</p>
                    <p class="testo data3  d-md-none">jeux video</p>
                </div>

                <div class="col-12">
                    <button  id="join_projet" type="button" onclick="get_projet_id()" value="60" class="btn btn-info d-md-none">Rejoindre le Projet</button>
                </div>
            </div>


            <ul class="nav container-fluid2 select_home2" role="tablist">


                <li class="nav-item one col-md-3 col-sm-6 col-xs-12">
                    <a class="ts nav-link" data-toggle="tab" href="#description" role="tab">Description</a>
                    <div class="underline"></div>
                </li>
                <li class="nav-item col-md-3 col-sm-6 col-xs-12">
                    <a class="nav-link" data-toggle="tab" href="#feature" role="tab">Features</a>
                </li>
                <li class="nav-item three col-md-3 col-sm-6 col-xs-12">
                    <a class="nav-link" data-toggle="tab" href="#participant" role="tab">Participants</a>
                </li>
                <li class="nav-item four col-md-3 col-sm-6 col-xs-12">
                    <a class="nav-link " data-toggle="tab" href="#commentaire" role="tab">Commentaires</a>
                </li>
            </ul>



            <div class="tab-content">

                <div class="tab-pane" id="description" role="tabpanel">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                <div class="tab-pane" id="feature" role="tabpanel">
                    <div class="container contain-feature ">
                         <div id="accordion" class="accordion">
                            <div class="card mb-0">
                                <div class="card-header collapsed card-title2" data-toggle="collapse" href="#collapseOne">
                                  <a class="card-title">
                                      Fonctionnalité 1
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse" data-parent="#accordion" >
                                    <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                        aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. samus labore sustainable VHS.                                  
                                        <div class="btn-custom01">
                                    <button type="button" class="btn-custom00 btn btn-info d-none d-md-block">Se positionner</button>
                                    <button type="button" class="ml-3 mr-3 btn-custom00 btn btn-info d-none d-md-block">Abandonner</button>
                                    <button type="button" class="btn-custom00 btn btn-info d-none d-md-block">Cloturer</button>
                                    </div>
                                    </div>
              

             
                                </div>
                                <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    <a class="card-title">
                                        Fonctionnalité 2
                                    </a>
                                </div>
                                <div id="collapseTwo" class="card-body collapse" data-parent="#accordion" >
                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                        aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                                        craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </p>
                                </div>
                                <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    <a class="card-title">
                                        Fonctionnalité 3
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordion" >
                                    <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                        aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. samus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="tab-pane" id="participant" role="tabpanel">D</div>
                    <div class="tab-pane" id="commentaire" role="tabpanel">E</div>
            </div>
        </div>





    </div>
</div>
</div>
</div>




<!--    <ul class="nav nav-tabs" role="tablist">
    
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#description" role="tab">Description</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#feature" role="tab">Features</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#participant" role="tab">Participants</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#commentaire" role="tab">Commentaires</a>
        </li>
    </ul>
    

    <div class="tab-content">
    
        <div class="tab-pane" id="description" role="tabpanel">B</div>
        <div class="tab-pane" id="feature" role="tabpanel">C</div>
        <div class="tab-pane" id="participant" role="tabpanel">D</div>
        <div class="tab-pane" id="commentaire" role="tabpanel">E</div>
    </div>-->


























<!--<div class="container">
    <div id="accordion" class="accordion">
        <div class="card mb-0">
            <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne">
                <a class="card-title">
                    Fonctionnalité 1
                </a>
            </div>
            <div id="collapseOne" class="card-body collapse" data-parent="#accordion" >
                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                    craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </p>
            </div>
            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                <a class="card-title">
                  Fonctionnalité 2
                </a>
            </div>
            <div id="collapseTwo" class="card-body collapse" data-parent="#accordion" >
                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat
                    craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </p>
            </div>
            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                <a class="card-title">
                  Fonctionnalité 3
                </a>
            </div>
            <div id="collapseThree" class="collapse" data-parent="#accordion" >
                <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. samus labore sustainable VHS.
                </div>
            </div>
        </div>
    </div>
</div>-->


