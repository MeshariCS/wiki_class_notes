<?php

require_once("DB.php");

class Course extends DB{

  public function __construct(){
    parent::__construct();
    parent::setTableName("courses");
  }

} 
