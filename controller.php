<?php
require_once 'DAO.php';
session_start();
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if ($action === 'doPost') {
        $marka = isset($_POST['marka']) ? test_input($_POST['marka']) : '';
        $cena = isset($_POST['cena']) ? test_input($_POST['cena']) : 0;
        if (!empty($marka) && !empty($cena)) {
            $dao = new DAO();
            $telefoni = $dao->svi();
            $_SESSION['telefoni'] = array_filter($telefoni, function($telefon) use ($marka, $cena) {
                return strpos(strtolower($telefon['marka']), strtolower($marka)) !== false && $telefon['cena'] <= $cena;
            });
            include 'prikaz1.php';
        } else {
            $msg = "Popunite sva polja.";
            include 'index.php';
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === "GET") {
    if ($action === 'doGet') {
        $dao = new DAO();
        $_SESSION['telefoni'] = $dao->sortPoCeni();
        include 'prikaz2.php';
    } elseif ($action === 'logout') {
        session_unset();
        session_destroy();
        include 'index.php';
    } else {
        header("Location: index.php");
        die();
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
