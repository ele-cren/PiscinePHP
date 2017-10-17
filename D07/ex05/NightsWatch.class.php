<?php

Class NightsWatch implements IFighter{
  public function recruit($perso){
    if (method_exists($perso, 'fight'))
      $perso->fight();
  }
  public function fight(){

  }
}

?>
