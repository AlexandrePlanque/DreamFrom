<?php include "template/header.php";
include "template/navbar.php";
?>
<div class="pb-5 pt-5">    
    <div class="container debugHeight">
        <div class="row custom-choice">
            <select class="custom-select col-3 mr-5" id="theme">
                <option value="">Tous les themes</option>
                <?php foreach ($themes as $theme) : ?> 
                    <option value="<?= $theme->getIntitule() ?>"<?= ($this->inputGet()['intitule'] === $theme->getIntitule()) ? "selected='true'" : ""; ?>><?= ucfirst(implode(' ', explode('_', $theme->getIntitule()))) ?></option>
                <?php endforeach; ?>
            </select>
            <select class="custom-select col-3 mr-5" id="date">
                <option value="">Pas de préférences</option>
                <option value="desc" <?= ($this->inputGet()['date_creation'] === "desc") ? 'selected="true"' : ""; ?> >Les plus récents</option>
                <option value="asc" <?= ($this->inputGet()['date_creation'] === "asc") ? 'selected="true"' : ""; ?>>Les plus anciens</option>
            </select>
            <div class="mr-1 active-cyan-4 mb-4 col-3">
                <div class="input-group mb-3">
                    <input class="form-control" autocomplete=off type="search" placeholder="Search" aria-label="Search" id="username">
                    <div class="input-group-append">

                        <button class="btn btn-info" onclick="search()"><i class="fas fa-search" ></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <section class="col-12">
                <ul id="da-thumbs" class="da-thumbs">
                    <?php foreach ($users as $user) : ?>
                        <li class="col-2 custom-avatar">
                            <a class="" href="" style="pointer-events: none;">
                                <img class="img-fluid custom-fluid "src="<?= ($user->getAvatar() !== "")? $user->getAvatar() : '../image/defaultUser.jpg'?>" >
                                <div><span><?= $user->getPseudo() ?>
                                        <p class="custom-info"><i class="fas fa-address-book custom-icon" ></i><?= date("d-m-Y", strtotime($user->getDate_creation())); ?></p>
                                        <p><i class="fas fa-heart custom-icon" ></i><?= ucfirst(implode(' ', explode('_', $user->getTheme_id()))) ?></p>  
                                    </span></div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </div>
    </div>
</div>
<?php include "template/footer.php"; ?>
