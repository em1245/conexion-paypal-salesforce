<?php
$bodyReceived = file_get_contents('php://input');
$json = file_decode($bodyReceived,true);
print_r($json);
echo($json);




//**************************** */

/*
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://resourceful-wolf-h0vjq4-dev-ed.my.salesforce.com/services/apexrest/api/salesforce_paypal",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>" {\r\n      \r\n        \"nombre\": \"INFOS11O\",\r\n        \"dato\": \".$raw_post_data.\"\r\n        \r\n    }",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "Authorization: Bearer 00D4R00000081Er!ARIAQCft8BjaDEahuKhwT6lIPhG0Eb4F1hMEsJOQOdvd_Rcpgsp0ln4AObAtnhJzn82Y72HZuvPofhfEq7La_7DEjhJAex7W",
    "Cookie: BrowserId=jN2TaqjAEeqtmUfXbyrH5g; BrowserId_sec=jN2TaqjAEeqtmUfXbyrH5g; webact=%7B%22l_vdays%22%3A-1%2C%22l_visit%22%3A0%2C%22session%22%3A1591535587779%2C%22l_search%22%3A%22%22%2C%22l_dtype%22%3A%22%22%2C%22l_page%22%3A%22SFDC%3Aes%3Alogin%22%2C%22counter%22%3A0%2C%22pv%22%3A1%2C%22f_visit%22%3A1591535587779%2C%22seg%22%3A%22non-customer%3Aes%22%7D; AMCVS_8D6C67C25245AF020A490D4C%40AdobeOrg=1; s_ecid=MCMID%7C21114504392852134163120545697726561881; AMCV_8D6C67C25245AF020A490D4C%40AdobeOrg=-1891778711%7CMCIDTS%7C18421%7CMCMID%7C21114504392852134163120545697726561881%7CMCAAMLH-1592140388%7C7%7CMCAAMB-1592140388%7CRKhpRz8krg2tLO6pguXWp5olkAcUniQYPHaMWWgdJ3xzPWQmdj0y%7CMCOPTOUT-1591542788s%7CNONE%7CMCAID%7CNONE%7CMCSYNCSOP%7C411-18428%7CvVersion%7C2.4.0; inst=APP_4R; rememberUn=true; login=ZXJpdmVybzE4MDZAcmVzb3VyY2VmdWwtd29sZi1oMHZqcTQuY29t; com.salesforce.LocaleInfo=mx; oinfo=c3RhdHVzPUZSRUUmdHlwZT0zJm9pZD0wMEQ0UjAwMDAwMDgxRXI=; disco=4R:00D4R00000081Er:0054R00000ABavg:1; autocomplete=1; sid=00D4R00000081Er!ARIAQIp1j0w7w23fHs0HUyMVrp65Q7X6vBlOfHyGLObLQtuUYm3oD2Qk8R.qFBKuPSU.zPThZPXayPku_z7L_SNR3MueBFRO; sid_Client=R00000ABavgR00000081Er; clientSrc=187.147.115.29; oid=00D4R00000081Er; sfdc_lv2=KxG83HUoW6VR83Rowlss3dZnObCK9qKyTZ+2i3rhxeyyt1GC2WWAh5muxR7QSuevU=; 52609e00b7ee307e=5edcead6:5edced2e:00D535558000F335B20983075546FDD174FD13:eyJub25jZSI6Ilk3a2RuS0xVb2x0WldhZksxXzNNbEVZc0djUEpaRkZ2SzlYYU54SVpSUzhcdTAwM2QiLCJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImtpZCI6IntcInNcIjpcIjBPMDRSMDAwMDAwQ2FSOFwiLFwidFwiOlwiME8wNFIwMDAwMDBDYVI4XCIsXCJhXCI6XCJmaW5nZXJwcmludEhtYWNcIixcImJcIjpcIjIyMlwifSIsImNyaXQiOlsiaWF0Il0sImlhdCI6MTU5MTUzNTc0MjE3MSwiZXhwIjowfQ==.TldWa1kyVmtNbVV3TUVRMU16VTFOVGd3TURCR016TTFRakl3T1Rnek1EYzFOVFEyUmtSRU1UYzBSa1F4TXc9PQ==.wTXvZ5NXkNLvzoKIFNfTzpDCo8Z2YyG7UIBGCFdww30=:null"
  ),
));

$response = curl_exec($curl);

curl_close($curl);


*/