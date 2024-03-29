<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=alume', 'root', '') or die('Could not connect: ' . mysql_error());

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM client WHERE id_cli = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ALUME</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery.slidertron-1.1.js"></script>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Archivo+Narrow:400,700" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="espace.css" rel="stylesheet" type="text/css" media="all" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
</head>

   <body>

     <div id="header-wrapper">
       <div id="header" class="container">
         <div id="logo">
           <h1><a href="#">ALUME</a></h1>
           <p></p>
         </div>

         <div id="menu">
           <ul>
             <li class="first active"><a href="../index.php" accesskey="1" title="">ACCUEIL</a></li>
             <li><a href="../article.php" accesskey="2" title="">ARTICLE</a></li>
             <li><a href="connexion.php" accesskey="4" title="">ESPACE MEMBRE</a></li>
             <li><a href="../contact.php" accesskey="5" title="">CONTACT</a></li>
             <li><a href="../panier/index.php" accesskey="6" title="">PANIER</a></li>
           </ul>
         </div>
       </div>
     </div>


      <center><div align="center">
         <h2>Profil de <?php echo $userinfo['nom_cli']; ?></h2>
         <br /><br />
         
		 <img src= "membres/avatars/0.png" width="150" />
		 <br /><br/>
		 
         Adresse = <?php echo $userinfo['adress_cli']; ?>
         <br />
         Code Postale = <?php echo $userinfo['cp_cli']; ?>
         <br />
         Téléphone = <?php echo $userinfo['tel_cli']; ?>
         <br />
         Mail = <?php echo $userinfo['mail_cli']; ?>
         <br />
         <br />
         <a href="editionprofil.php">Editer mon profil</a>
         <a href="deconnexion.php">Se déconnecter</a>
         
      </div>
</center>
      <?php
        include '../footer_panier.php';
       ?>

   </body>
</html>

<?php
}
?>
