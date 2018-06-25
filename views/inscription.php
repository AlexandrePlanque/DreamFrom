<?php
include "template/header.php";
include "template/navbar.php";
?>

<br>
<div class="row">
                <div class="col-md-6 offset-md-3">
                   <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h4 class="mb-0 text-center">Créer un compte</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputName">Nom</label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputName">Prénom</label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputName">Pseudo</label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="inputName">Adresse</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3">Email</label>
                                    <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">@</div>
                                    </div>
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="" required="">
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3">Mot de Passe</label>
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="" required="">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Créer votre compte DreamFrom</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
    </div>

<?php
