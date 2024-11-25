<?php
session_start();

require_once('controllers/ControllerProspect.php');
use controllers\ControllerProspect;

$nome = $_POST['nome'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$facebook = $_POST['facebook'];
$whatsapp = $_POST['whatsapp'];

$controller = new ControllerProspect();

try {
    $prospect = (object) [
        'codigo' => null, // NULL para novo cadastro
        'nome' => $nome,
        'email' => $email,
        'celular' => $celular,
        'facebook' => $facebook,
        'whatsapp' => $whatsapp
    ];

    $controller->salvarProspect($prospect);
    $_SESSION['sucesso'] = "Prospect cadastrado com sucesso!";
    header("Location: views/Prospect/v_incluir_prospect.php");
} catch (Exception $e) {
    $_SESSION['erro'] = $e->getMessage();
    header("Location: views/Prospect/v_incluir_prospect.php");
}
?>