<?php
error_reporting(E_ALL ^ E_NOTICE);

// devdaily.com paypal php ipn example.
// version 1.0
// this example built on the paypal php ipn example, with bug fixes,
// and no need for ssl.

$header = "";
$emailtext = "";

// read the post from paypal and add 'cmd'
$req = 'cmd=_notify-validate';
if(function_exists('get_magic_quotes_gpc'))
{
  $get_magic_quotes_exits = true;
}

// handle escape characters, which depends on setting of magic quotes
foreach ($_POST as $key => $value)
{
  if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1)
  {
    $value = urlencode(stripslashes($value));
  }
  else
  {
    $value = urlencode($value);
  }
  $req .= "&$key=$value";
}

// post back to paypal to validate
$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

// here you can use ssl, or not
// $fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
$fp = fsockopen ('www.sandbox.paypal.com', 80, $errno, $errstr, 30);

// process validation from paypal
// TODO: This sample does not test the http response code.
// All HTTP response codes must be handles or you should use an HTTP
// library, such as cUrl.

if (!$fp)
{
  // HTTP ERROR
}
else
{
  // NO HTTP ERROR
  fputs ($fp, $header . $req);
  while (!feof($fp))
  {
    $res = fgets ($fp, 1024);
    if (strcmp ($res, "VERIFIED") == 0)
    {
      // get variables from the paypal post to us
      // see these pages for possible variables:
      // https://developer.paypal.com/us/cgi-bin/devscr
      // https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_admin_IPNIntro

      // payment info
      $payment_status = $_POST['payment_status'];
      $payment_amount = $_POST['mc_gross'];
      $payment_currency = $_POST['mc_currency'];
      $txn_id = $_POST['txn_id'];

      // product info
      $item_name = $_POST['item_name'];
      $item_number = $_POST['item_number'];

      // buyer info
      $payer_email = $_POST['payer_email'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $address_city = $_POST['address_city'];
      $address_state = $_POST['address_state'];
      $address_country = $_POST['address_country'];

      // receiver_email, that's our email address
      $receiver_email = $_POST['receiver_email'];

      // put your actual email address here
      $our_email = 'foobar@example.com';

      // if all these conditions are true, send the email
      // note: should also verify that $txn_id was not used before
      if (($payment_status == 'Completed') &&
         ($receiver_email == $our_email) &&
         ($payment_amount == $amount_they_should_have_paid ) &&
         ($payment_currency == "USD"))
      {
        foreach ($_POST as $key => $value)
        {
          $emailtext .= $key . " = " .$value ."\n\n";
        }
        mail($payer_email, "Live-VERIFIED IPN", $emailtext . "\n\n" . $req);
      }
    }
    else if (strcmp ($res, "INVALID") == 0)
    {
      // If 'INVALID', send an email. TODO: Log for manual investigation.
      foreach ($_POST as $key => $value)
      {
        $emailtext .= $key . " = " .$value ."\n\n";
      }
      mail($payer_email, "Live-INVALID IPN", $emailtext . "\n\n" . $req);
    }
  }
}
fclose ($fp);
?>