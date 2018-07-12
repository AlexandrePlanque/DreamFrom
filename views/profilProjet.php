    <div class='row' id="cardprojet">
        <?php foreach($projets as $projet) : ?>
        
<div class="card card-outline-secondary text-center cardprojet">
  <div class="card-header">
      <h4 class="mt-1"><?= $projet->getTitre()?></h4>
  </div>
  <div class="card-body">
      <img class="card-img projetimg " src=" <?= $projet->getImage()?>">
    <p class="card-text">Progression</p>
<div class="progress custombgprogress mb-3">
  <div class="progress-bar customprogress" style="width:<?= $projet->getFeatProgress()?>"></div>
</div> 

<div id="bar-basic" value="100">
   
</div>
    <a href="/projets/<?= $projet->getId() ?>" class="btn btn-primary">Accéder au projet</a>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>
        <?php  endforeach; ?>
</div>



