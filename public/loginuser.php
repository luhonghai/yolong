<?php

if (!empty($_SESSION) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['networktype'])) {

    $result = $social_auth->loginUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['networktype']);
    echo '{"data":' . json_encode($result) . '}';
    exit;
} else {
    $result = array("data" => $_SESSION);
    echo '{"data":' . json_encode($result) . '}';
    exit;
}