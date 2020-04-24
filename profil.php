	<?php
session_start();
 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=pfe', 'root', 'root');
 
if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>
<!DOCTYPE html>
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Profil de <?php echo $userinfo['name']; ?></h2>
         <br /><br />
         Pseudo = <?php echo $userinfo['name']; ?>
         <br />
         Mail = <?php echo $userinfo['email']; ?>
         <br />
         <?php
         if(isset($_SESSION['id'])) {
         ?>
         <br />
         <a href="editionprofil.php">Editer mon profil</a>
         <a href="deconnexion.php">Se déconnecter</a>
         <?php
         }
         ?>
      </div>
   </body>
</html>
<?php   
}
?>