<?php
namespace Utils\function;

function redirect(string $lien){
    return header("Location:$lien");
  }