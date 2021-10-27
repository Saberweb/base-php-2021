<?php

// fichier de configuration

// MariaDB connexion
define("MDB_HOST","localhost");
define("MDB_PORT",3307);
define("MDB_NAME","crud01");
define("MDB_USER","root");
define("MDB_PWD","");
define("MDB_CHARSET","utf8");

// Règlages d'affichage des news
define("NEWS_HOME_LENGTH", 240); // nombre de caractères du texte sur la page d'accueil
define("NEWS_USER_LENGTH", 140); // nombre de caractères du texte sur la page d'accueil
define("NEWS_BR",true); // si true, retours automatiques à la ligne, si false pas de <br>

// on définit les pages publiques acceptées en variable get dans une constante contenant un tableau (depuis PHP7)
define("PUBLIC_PAGE", ['home','user','article','erreur404','admin','create','update','delete']);
