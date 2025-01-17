<?php
require 'src/View/Layout1.php';
require 'src/View/layoutForm.php';
require 'src/View/Form.php';
require 'src/View/Input.php';

//fields
$username = new Input([
    'name'=>'username', 
    'id'=>'username',
    'type'=>'text',
    'value'=>'', 
    'label'=>'Username',
    'classe'=>'']);
$name = new Input(['name'=>'name', 'id'=>'name','type'=>'text','value'=>'', 'label'=>'Nom', 'classe'=>'']);
$lastName = new Input(['name'=>'prenom','id'=> 'prenom','type'=>'text','value'=> '','label'=> 'Prenom','classe'=> '']);
$email = new Input(['name'=>'email', 'id'=>'email','type'=>'email', 'value'=>'','label'=> 'Email','classe'=> '']);
$password = new Input(['name'=>'password', 'id'=>'password','type'=>'password','value'=>'','label'=>'Mot de passe','classe'=> '']);
//form instanciation
$form = new Form('', 'POST', [$username->render(), $name->render(), $lastName->render(),  $email->render(), $password->render()], "Valider", "lance_inscription", "Vous avez déjà un compte?", "Se connecter ici");

//INstation Object LayoutForm
$layoutForm = new LayoutForm(
                                'Nouvelle inscription', 
                                ['<link rel="stylesheet" href="assets/css/styleconnexion.css"/>'],
                                'src/View/headerLayoutForm.php',
                                'contenur de la page',
                                'Pied de la page',
                                ['<script src="assets/js/script.js"></script>']
                            );
$layoutForm->setContent($form->render());
//Make layoutForm visible on page
echo $layoutForm->render('Inscription');
?>