<ul class="nav select_home3" id="secondpart">
                <li class="nav-item ">
                    <a class="hvr-underline-from-center nav-link" data-toggle="tab" href="#selection" role="tab">Selection</a>
                    <div class="underline"></div>
                </li>
                <li class="nav-item">
                    <a class="hvr-underline-from-center nav-link" data-toggle="tab" href="#projets" role="tab">Projets</a>
                </li>
                <li class="nav-item">
                    <a class="hvr-underline-from-center nav-link" data-toggle="tab" href="#membres" role="tab">Membres</a>
                </li>
            </ul>
            <div class="tab-content select_result">
                <div class="tab-pane active show" id="selection" role="tabpanel">
<table class="table table-striped-custom">
  <tbody>
<?php foreach($news as $new) : ?>
    <tr>
      <td><?= date("d/m/Y", strtotime($new->getDate_creation())); ?></td>
      <td class="newNom"><?=ucfirst($new->getNom())?></td>
      <td><?=ucfirst($new->getDescription())?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
                </div>
                <div class="tab-pane" id="projets" role="tabpanel">
                    <table class="table table-striped-custom">
  <tbody>
<?php foreach($projets as $projet) : ?>
    <tr>
      <td><?= date("d/m/Y", strtotime($projet->getDate_creation())); ?></td>
      <td class="newNom"><?=ucfirst($projet->getNom())?></td>
      <td><?=ucfirst($projet->getDescription())?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
                </div>
                <div class="tab-pane" id="membres" role="tabpanel">
                                        <table class="table table-striped-custom">
  <tbody>
<?php foreach($membres as $membre) : ?>
    <tr>
      <td><?= date("d/m/Y", strtotime($membre->getDate_creation())); ?></td>
      <td class="newNom"><?=ucfirst($membre->getNom())?></td>
      <td><?=ucfirst($membre->getDescription())?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
                </div>
            </div>
<div class="content-home">
 <!--       <img src="../image/background_description_home.png">-->
    <div class="container-fluid">
        <div class="row">
            <div class ="col-md-4 col-lg-6 col-sm-12 mt-5">
                <h1 class="titreprez">DreamFrom</h1>
                <h2 class="soustitre">découvrir... explorer... partager...</h2>
                </hr>
                <a>
                e Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.
                </a>
            </div>
        </div>
    </div>   
    <div class="container-fluid">
        <div class="row">
          <div class="fx3 custom_prez">
            <a href="/projets">
                <div class="item col4 mr-3">
                    <img class="transition img-responsive" src="../image/projets2.jpg">
                    <h4>Liste des Projets</h4>
                    <p>Consultez les projets et devenez collaborateur</p>
                </div>
            </a>
            <a href="/membres">
                <div class="item col4">
                    <img class="transition img-responsive" src="../image/membres.jpg">
                    <h4>Liste des Membres</h4>
                    <p>Consultez les membres et invitez les sur votre projet</p>
                </div>
            </a>
        
            
        </div> 
    </div>
    </div>
</div> 