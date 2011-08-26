<?php

class SQLDecorator extends FormDecorator {
  public function getInsertQuery($table) {
    $values = "";
    
    return "INSERT INTO $table (" . $this->getNames() . ") VALUES (" . $this->getValues() . "); ";
  }

  public function select($table, $id, $idcol) {
    return "SELECT " . $this->getNames() . " FROM $table WHERE $idcol = $id";
  }

  public function getNames() {
    $keys = "";
    foreach($this as $key => $value) {
      if(!$key) {
        $keys .= ", ";
      }
      $keys = $value->getName();
      //what bout
    }
    return $keys;
  }

 public function getValues() {
    $values = "";
    foreach($this as $key => $value) {
      if(!$key) {
        $values .= ", ";
      }
      //what about integers
      $values = "'" . $value->getValues() . "'";
    }
    return $values;
  }
}
