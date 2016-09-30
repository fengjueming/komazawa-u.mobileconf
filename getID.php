<?php
/**
 * Created by PhpStorm.
 * User: fengjueming
 * Date: 2016/09/23
 * Time: 11:42
 */
#get yestudy login
if (empty($_GET["username"]))
{
    echo 'Please input username!';
    exit;
}
if (empty($_GET["password"]))
{
    echo 'Please input password!';
    exit;
}
$username = $_GET["username"];
$password = $_GET["password"];

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,'https://yestudy.komazawa-u.ac.jp/2016/login/index.php');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"username=" . $username . "&password=" . $password );
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$result = curl_exec($ch);
curl_close($ch);

if(strpos($result,'testsession') > 0){
    header('Content-type: application/x-apple-aspen-config; chatset=utf-8');
    header('Content-Disposition: attachment; filename="komazawa.mobileconfig"');
    echo '<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
	<key>PayloadContent</key>
	<array>
		<dict>
			<key>PayloadCertificateFileName</key>
			<string>GlobalSign Root CA.cer</string>
			<key>PayloadContent</key>
			<data>
			MIIDdTCCAl2gAwIBAgILBAAAAAABFUtaw5QwDQYJKoZIhvcNAQEF
			BQAwVzELMAkGA1UEBhMCQkUxGTAXBgNVBAoTEEdsb2JhbFNpZ24g
			bnYtc2ExEDAOBgNVBAsTB1Jvb3QgQ0ExGzAZBgNVBAMTEkdsb2Jh
			bFNpZ24gUm9vdCBDQTAeFw05ODA5MDExMjAwMDBaFw0yODAxMjgx
			MjAwMDBaMFcxCzAJBgNVBAYTAkJFMRkwFwYDVQQKExBHbG9iYWxT
			aWduIG52LXNhMRAwDgYDVQQLEwdSb290IENBMRswGQYDVQQDExJH
			bG9iYWxTaWduIFJvb3QgQ0EwggEiMA0GCSqGSIb3DQEBAQUAA4IB
			DwAwggEKAoIBAQDaDuaZjc6j40+Kfvvxi4Mla+pIH/EqsLmVEQS9
			8GPR4mdmzxzdzxtIK+6NiY6arymAZavpxy0Sy6scTHAHoT0KMM0V
			jU/43dSMUBUc71DuxC73/OlS8pF94G3VNTCOXkNz8kHp1Wrjsok6
			Vjk4bwY8iGlbKk3Fp1S4bInMm/k8yuX9ifUSPJJ4ltbcdG6TRGHR
			jcdGsnUOhugZitVtbNV4FpWi6cgKOOvyJBNPc1STE4U6G7weNLWL
			BYy5d4ux2x8gkasJU26Qzns3dLlwR5EiUWMWea6xrkEmCMgZK9FG
			qkjWZCrXgzT/LCrBbBlDSgeF59N89iFo7+ryUp9/k5DPAgMBAAGj
			QjBAMA4GA1UdDwEB/wQEAwIBBjAPBgNVHRMBAf8EBTADAQH/MB0G
			A1UdDgQWBBRge2YaRQ2XyolQL30EzTSo//z9SzANBgkqhkiG9w0B
			AQUFAAOCAQEA1nPnfE920I2/7LqivjTFKDK1fPxsnCwrvQmeU79r
			XqoRSLblCKOzyj1hTdNGCbM+w6DjY1Ub8rrvrTnhQ7k4o+YviiY7
			76BQVvnGCv04zcQLcFGUl5gE38NflNUVyRRBnMRddWQVDf9VMOyG
			j/8N7yy5Y0b2qvzfvGn9LhJIZJrglfCm7ymPAbEVtQwdpf5pLGkk
			eB6zpxxxYu7KyJesF12KwvhHhm4qxFYxldBniYUr+WymXUadDKqC
			5JlR3XC321Y9YeRq4VzW9v493kHMB65jUr9TU/Qr6cf9tveCX4XS
			QRjbgbMEHMUfpIBvFSDJ3gyICh3WZlXi/EjJKSZp4A==
			</data>
			<key>PayloadDescription</key>
			<string>Adds a CA root certificate</string>
			<key>PayloadDisplayName</key>
			<string>GlobalSign Root CA</string>
			<key>PayloadIdentifier</key>
			<string>com.apple.security.root.E3C795F8-91EE-41DF-8D9C-FFB62CCE59B8</string>
			<key>PayloadType</key>
			<string>com.apple.security.root</string>
			<key>PayloadUUID</key>
			<string>E3C795F8-91EE-41DF-8D9C-FFB62CCE59B8</string>
			<key>PayloadVersion</key>
			<integer>1</integer>
		</dict>
		<dict>
			<key>AutoJoin</key>
			<false/>
			<key>CaptiveBypass</key>
			<false/>
			<key>EAPClientConfiguration</key>
			<dict>
				<key>AcceptEAPTypes</key>
				<array>
					<integer>25</integer>
				</array>
				<key>OneTimeUserPassword</key>
				<false/>
				<key>PayloadCertificateAnchorUUID</key>
				<array>
					<string>E3C795F8-91EE-41DF-8D9C-FFB62CCE59B8</string>
				</array>
				<key>UserName</key>
				<string>'.$username.'</string>
				<key>UserPassword</key>
				<string>'.$password.'</string>
			</dict>
			<key>EncryptionType</key>
			<string>WPA2</string>
			<key>HIDDEN_NETWORK</key>
			<true/>
			<key>IsHotspot</key>
			<false/>
			<key>PayloadDescription</key>
			<string>Configures Wi-Fi settings</string>
			<key>PayloadDisplayName</key>
			<string>Wi-Fi</string>
			<key>PayloadIdentifier</key>
			<string>com.apple.wifi.managed.6A9AF7AC-CD61-48C1-9F0C-5F5D2E7D6C25</string>
			<key>PayloadType</key>
			<string>com.apple.wifi.managed</string>
			<key>PayloadUUID</key>
			<string>32786758-CCFA-4816-A6F4-970DCCE50982</string>
			<key>PayloadVersion</key>
			<integer>1</integer>
			<key>ProxyType</key>
			<string>None</string>
			<key>SSID_STR</key>
			<string>komazawa-musen-2015</string>
		</dict>
		<dict>
			<key>EmailAddress</key>
			<string>'.$username .'@komazawa-u.ac.jp</string>
			<key>Host</key>
			<string>m.google.com</string>
			<key>MailNumberOfPastDaysToSync</key>
			<integer>7</integer>
			<key>Password</key>
			<string>'.$password.'</string>
			<key>PayloadDescription</key>
			<string>Configures an Exchange account</string>
			<key>PayloadDisplayName</key>
			<string>KOMAnet Gmail</string>
			<key>PayloadIdentifier</key>
			<string>com.apple.eas.account.ED83F0EA-57B6-4E7E-93AC-9A329F9A0EAE</string>
			<key>PayloadType</key>
			<string>com.apple.eas.account</string>
			<key>PayloadUUID</key>
			<string>A4079F2E-ABEF-4DA4-BECA-F8933300140B</string>
			<key>PayloadVersion</key>
			<integer>1</integer>
			<key>PreventAppSheet</key>
			<true/>
			<key>SSL</key>
			<true/>
			<key>UserName</key>
			<string>'.$username.'@komazawa-u.ac.jp</string>
			<key>disableMailRecentsSyncing</key>
			<false/>
		</dict>
	</array>
	<key>PayloadDescription</key>
	<string>駒澤大学無線LANとKOMAnet Gmail一括設定のプロフィールです。(ユーザID：'. $username .')</string>
	<key>PayloadDisplayName</key>
	<string>駒澤大学無線＆メール一括設定</string>
	<key>PayloadIdentifier</key>
	<string>komazawa-u.conf</string>
	<key>PayloadRemovalDisallowed</key>
	<false/>
	<key>PayloadType</key>
	<string>Configuration</string>
	<key>PayloadUUID</key>
	<string>A40250AB-B2B9-4716-B1E3-E2614FF03AA5</string>
	<key>PayloadVersion</key>
	<integer>1</integer>
</dict>
</plist>
';
    exit;
}
echo "IDとパスワードの認証はできませんでした";
?>