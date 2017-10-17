<?php

if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] === "OK"
  && file_exists("../htdocs/private/passwd")){
    $string_file = file_get_contents("../htdocs/private/passwd");
    $accounts = unserialize($string_file);
    if ($accounts[$_POST['login']] && $_POST['oldpw'] != $_POST['newpw'] &&
        hash("whirlpool", $_POST['oldpw']) === $accounts[$_POST['login']]['passwd']){
      $accounts[$_POST['login']]['passwd'] = hash("whirlpool", $_POST['newpw']);
      $string_file = serialize($accounts);
      file_put_contents("../htdocs/private/passwd", $string_file);
      echo "OK\n";
    }
    else{
      echo "ERROR\n";
    }
}
else{
  echo "ERROR\n";
}

?>
