<?php

require("../config/db.php");

class DB{

  public $dbh;
  private $tableName;

  function __construct(){
    
    // we connect to example.com and port 3307
    $con = mysql_connect($dbHost, $dbUser, $dbPassword);
    if (!$con) {
      die('Could not connect: ' . mysql_error());
    }
    
    mysql_select_db($dbName, $con);

    $this->dbh = $con;

  }

  function select($id, $where = false){

  }

  function insert($values){
    
    $query = "insert into " . $this->tableName . " (";
    $separator = "";

    foreach ($values as $key => $value){
      $query .= $separator . "'" . $value . "'";
      $separator = ", ";
    }
      
    $query .= ") values (";
    $separator = "";

    foreach ($values as $key => $value){
      $query .= $separator . "'" . $value . "'";
      $separator = ", ";
    }

    $query .= ");";

    $this->db->query($query);

  }

  function update($id, $values = false){

  }

  function delete($id){
  }

  function query($q){
  }

}
