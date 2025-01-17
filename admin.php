<?php
    require 'src/Model/UtilisateurManager.php';
    require 'config/includeClass.php';
    session_start();
    $connect = new DB_conect(
        [
            'dbUser' => 'root',
            'dbPassword' => ''
        ]
    );
    $db_conect = new PDO('mysql:host=localhost;dbname=cntmad', 'root', '');
    $db_conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $manager = new UtilisateurManager($db_conect);
    $allUsers = $manager->getAllUsers();
    var_dump($allUsers);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP Gestion espace membre en php natif</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <?php
            include 'src/View/header.php';
        ?>
        <section class="principale">
        <div class="container_body">
                <div class="head_body">
                    <p>
                        <h1>Réupération de tous les clients actuels</h1>
                    </p>
                </div>
                <div class="realcontent">
                    <div id="menu_body">
                        <h3>Menu</h3>
                        <ol>
                            <li><a href="admin.php">Admin</a></li>
                            <li><a href="membre.php">Membre</a></li>
                            <li><a href="">Table de matières</a></li>
                        </ol>
                    </div>
                    <article class="article">
                        <h3>Tableau contenant le client </h3>
                        <p>
                            <table border="1">
                                <tr>
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th>Modification</th>
                                    <th>Suppression</th>
                                </tr>
                                <?php 
                                $manager->getAllUsers();
                                foreach($allUsers as $user){
                                    $id_ligne = $user->getId(); ?>
                                <tr>
                                    <td><?php echo $user->getId(); ?></td>
                                    <td><?php echo $user->getLastName(); ?></td>
                                    <td><?php echo $user->getFirstName(); ?></td>
                                    <td><?php echo $user->getEmail(); ?></td>
                                    
                                    <td><a href="modif_client.php?id_a_modifier=$id_ligne\">Modifier</a></td>
                                    <td><a href="supprimer_client.php?id_a_supprimer=$id_ligne\">Supprimer</a></td>
                                </tr>
                                <?php    
                                }
                                ?>
                            </table>
                        </p>
                    </article>
                </div>
            </div>
        </section>
        <footer id="pied">

        </footer>
    </div>
    
</body>
</html>