<?php

Class Jaime extends Lannister{
  public function sleepWith($perso){
    if (get_class($perso) === "Tyrion")
      print("Not even if I'm drunk !" . PHP_EOL);
    elseif (get_class($perso) === "Cersei")
      print("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
    else {
      print("Let's do this." . PHP_EOL);
    }
  }
}

?>
