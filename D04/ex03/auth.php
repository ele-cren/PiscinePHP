<?php

function auth($login, $passwd){
  if (file_exists("../htdocs/private/passwd")){
    $string_file = file_get_contents("../htdocs/private/passwd");
    $accounts = unserialize($string_file);
    if ($accounts[$login] && $accounts[$login]['passwd'] === hash("whirlpool", $passwd)){
      return TRUE;
    }
    else {
      return FALSE;
    }
  }
  return FALSE;
}

?>
