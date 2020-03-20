<?php
require_once '../../function/utils.php';

//Du mal avec les sessions je pensais si ma sessions j'étais bien connecter ça m'affiche coucou mais rien

if ($_SESSION['state'] == 'connected') {
echo "coucou";
} else {
    redirect('/public/login.php');
}