<?php
    require 'src/View/Layout1.php';
    require 'src/View/layoutForm.php';
    require 'src/View/Form.php';
    require 'src/View/Input.php';

$email = new Input(['name'=>'email', 'id'=>'email','type'=>'email', 'value'=>'','label'=> 'Email','classe'=> '']);
$password = new Input(['name'=>'password', 'id'=>'password','type'=>'password','value'=>'','label'=>'Mot de passe','classe'=> '']);

$form = new Form('', 'POST', [$email->render(), $password->render()], "Se connecter", "lance_connection", "Pas encore de compte?", "Inscription par ici");

$layoutForm = new LayoutForm(
    'Connexion vers mon espace', 
    ['<link rel="stylesheet" href="assets/css/styleconnexion.css"/>'],
    'src/View/headerLayoutForm.php',
    'contenur de la page',
    'Pied de la page',
    ['<script src="assets/js/script.js"></script>']
);
$layoutForm->setContent($form->render());

echo $layoutForm->render('Se Connecter');



?>