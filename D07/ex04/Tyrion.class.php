<?php

Class Tyrion extends Lannister{
  public function sleepWith($perso){
    if (get_class($perso) === "Jaime" || get_class($perso) === "Cersei")
      print("Not even if I'm drunk !" . PHP_EOL);
    else {
      print("Let's do this." . PHP_EOL);
    }
  }
}

?>
