<!DOCTYPE html>
<html lang="fr">
<!-- Bon voici mon header qui me sert aussi de page de connexion -->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Jarditou</title>

  <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather|Nosifer|Rock+Salt&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>


<body class="bg">
  <div class="container-md bg_container">
    <!-- Navbar -->
    <header>
      <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><img src="assets/img/jarditou_logo2.png" alt="" title="Logo Jarditou" id="Logo" height="70" class="d-inline-block align-top">2.0</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse row justify-content-end mr-1" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Accueil<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="formulaire.php">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="liste.php">Liste</a>
              </li>
            </ul>
            <a href="signup.php"></a>
            <div class="">
              <span class="navbar-text">
                Connectez vous !
              </span>
              <button class="btn btn-danger position-relative" id="btnco" name="formconn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Connexion
              </button>
            </div>
        </div>
      </nav>
      <!-- Voici mon formulaire de connxion au site qui determinera avec une autre page PHP qu'elle est leurs roles -->
      <form action="" method="POST">
        <div class="collapse" id="collapseExample">
          <div class="card card-body bg-dark">
            <div class="form-row">
              <div class="form-group col-6">
                <label for="login"> Identifiant :</label>
                <input type="text" id="login" name="login" class="form-control" value="">
              </div>
              <div class="form-group col-6">
                <label for="password">Mot de passe :</label>
                <input type="text" id="password" name="password" class="form-control" value="">
              </div>
            </div>
            <input type="submit" id="connexion" name="connexion" class="btn btn-success" value="connecter">
            <a href="<?= site_url("produits/signup"); ?>" class="btn btn-warning mt-2">S'incrire</a>
          </div>
        </div>
      </form>

      <!-- <a href="tableau.php"><img src="" alt="photo" title="photo" class="img-fluid"> </a> -->
    </header>


    
  