<?php
$username = $_POST["username"];
$password = $_POST["password"];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,'https://www.komazawa-u.ac.jp/cgi-bin/mt/mt-members.cgi');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X)");
curl_setopt($ch, CURLOPT_POSTFIELDS,"return_url=https%3A%2F%2Fwww.komazawa-u.ac.jp%2Fm-students%2F&blog_id=60&username=" . $username . "&password=" . $password );
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$sContent = curl_exec($ch);
$headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$header = substr($sContent, 0, $headerSize);
curl_close($ch);
//echo $header;
if(strpos($header,'302 Found') > 0){
echo "Success";
    exit;
}
?>
