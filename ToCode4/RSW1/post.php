<?php
  $url = 'http://127.0.0.1/To_code_4/RSW1/produits';
  $data = array('name' => 'PEC', 'description' => 'Pencil 2H', 'price' => '2.25', 'category' => '9');
  // utilisez 'http' même si vous envoyez la requête sur https:// ...
  $options = array(
    'http' => array(
      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
      'method'  => 'POST',
      'content' => http_build_query($data)
    )
  );
  $context  = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  if ($result === FALSE) { /* Handle error */ }
  var_dump($result);
?>
