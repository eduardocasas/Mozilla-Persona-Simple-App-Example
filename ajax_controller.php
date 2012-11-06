<?php
session_start();
if ($_POST['action'] == 'login') {
    $options = array(
        CURLOPT_URL => 'https://verifier.login.persona.org/verify',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => 2,
        CURLOPT_POSTFIELDS => 'assertion='.$_POST['assertion'].
            '&audience='.urlencode('http://'.$_SERVER['HTTP_HOST'])
    );
    $ch = curl_init();
    curl_setopt_array($ch, $options);
    $result = json_decode(curl_exec($ch), true);
    curl_close($ch);
    if ($result['status'] === 'okay') {
        $_SESSION['logged'] = true;
        $_SESSION['email'] = $result['email'];
    }
} else if ($_POST['action'] == 'logout') {
    unset($_SESSION['logged']);
}
