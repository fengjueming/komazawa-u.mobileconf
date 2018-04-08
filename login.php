<?php
$username = $_POST["username"];
$password = $_POST["password"];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,'https://yestudy.komazawa-u.ac.jp/2018/login/index.php');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"username=" . $username . "&password=" . $password );
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$result = curl_exec($ch);
curl_close($ch);
if(strpos($result,'testsession') > 0){
echo "Success";
    exit;
}
?>
