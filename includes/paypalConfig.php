<?php
require_once("PayPal-PHP-SDK/autoload.php");

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
      'AbiQrIuq73YO8ftLlyjvqNMGiqs3-CGaiQmAE6b65XPxEIfqx9rU-FHBEPynpSM9fN_YciPdXyS6lSRa',
      'EOSov0bmJXyosxrQb7I5cYJUaTlhlrHXnNxSzKU1_pa2LPMpwpKOwD-awImh1o0d9mU5-U0Cc0Z5EKlW'
      )
  );
?>
