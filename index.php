<?php
require "src/View/Layout1.php";
require "src/View/Layout.php";

$index = new Layout(
    "Accueil de mon application",
    ['<link rel="stylesheet" href="assets/css/style.css">'],
    "src/View/header.php",
    "<p>Contenu principal de la page</p>",
    "<p>Footer de la page</p>",
    ['<script src="assets/js/script.js"></script>']
);

echo $index->render();

?>