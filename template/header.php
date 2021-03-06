<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>DreamFrom</title>
        <meta charset="utf-8">
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="http://<?= $_SERVER['SERVER_NAME']?>/css/bootstrap/js/bootstrap.min.js"></script>
        <link href="http://<?= $_SERVER['SERVER_NAME']?>/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['SERVER_NAME']?>/css/style_membres.css">
        <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['SERVER_NAME']?>/css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link href="http://<?= $_SERVER['SERVER_NAME']?>/css/styleprofil.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['SERVER_NAME']?>/css/inscription.css">
        <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['SERVER_NAME']?>/css/modal_connexion.css">
        <link href="http://<?= $_SERVER['SERVER_NAME']?>/css/connexion.css" rel="stylesheet" type="text/css"/>
        <link href="http://<?= $_SERVER['SERVER_NAME']?>/css/message.css" rel="stylesheet" type="text/css"/>
        <link href="http://<?= $_SERVER['SERVER_NAME']?>/css/projet.css" rel="stylesheet" type="text/css"/>
        <link href="http://<?= $_SERVER['SERVER_NAME']?>/css/hover-min.css" rel="stylesheet" type="text/css"/>
        <link href="http://<?= $_SERVER['SERVER_NAME']?>/css/animate.css" rel="stylesheet" type="text/css"/>
        <link href="http://<?= $_SERVER['SERVER_NAME']?>/css/news.css" rel="stylesheet" type="text/css"/>
        <script src="http://<?= $_SERVER['SERVER_NAME']?>/js/inscription.js" type="text/javascript"></script>
    </head>
    <body class="hide">
        <a name="haut" id="haut"></a>
        <div><a id="cRetour" class="cInvisible" href="#haut"></a></div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                window.onscroll = function (ev) {
                    document.getElementById("cRetour").className = (window.pageYOffset > 500) ? "cVisible" : "cInvisible";
                };
            });
        </script>

