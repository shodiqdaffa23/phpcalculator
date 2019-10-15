<?php

namespace Jakmall\Recruitment\Calculator\Traits;

trait Result{

  private $operator;

  private $numbers;

  public function getOperator() : string{
    return ' '.$this->operator.' ';
  }

  public function setOperator($operator) {
    $this->operator = $operator;
  }

  public function generateDescription(){
    return $desc = implode($this->getOperator(), $this->numbers);
  }

  public function getDescriptionResult(Array $numbers, $total){
    $this->numbers = $numbers;


    $descResult = $this->generateDescription(). ' = ' . $total;

    return $descResult;
  }

}