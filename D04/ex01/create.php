<?php

if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] === 'OK'){
  if (!file_exists("../htdocs/private/passwd")){
    @mkdir("../htdocs", 0755);
    @mkdir("../htdocs/private", 0755);
    $accounts = array();
    $accounts[$_POST['login']] = array();
    $accounts[$_POST['login']]['login'] = $_POST['login'];
    $accounts[$_POST['login']]['passwd'] = hash("whirlpool", $_POST['passwd']);
    $string_file = serialize($accounts);
    file_put_contents("../htdocs/private/passwd", $string_file);
    echo "OK\n";
  }
  else{
    $string_file = file_get_contents("../htdocs/private/passwd");
    $accounts = unserialize($string_file);
    if (!$accounts[$_POST['login']]){
      $accounts[$_POST['login']] = array();
      $accounts[$_POST['login']]['login'] = $_POST['login'];
      $accounts[$_POST['login']]['passwd'] = hash("whirlpool", $_POST['passwd']);
      $string_file = serialize($accounts);
      file_put_contents("../htdocs/private/passwd", $string_file);
      echo "OK\n";
    }
    else{
      echo "ERROR\n";
    }
  }
}
else
  echo "ERROR\n";

?>
