<?php

class View {
  private $path="";

  function __construct(string $path="") {
    $this->path = $path;
  }

  function show(string $path="") {

    $p = $path ? $path : $this->path;

    if ($p[0] != '.' && $p[0] != '/') {
      $p = "../view/".$p;
      $p = $p.".view.php";
    }

    foreach ($this as $key => $value) {
      $$key = $this->$key;
    }
    include($p);
  }
}
?>
