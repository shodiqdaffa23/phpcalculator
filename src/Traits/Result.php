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

  public function getDescriptionResult(Array $numbers, $total){
    $this->numbers = $numbers;

    $desc = implode($this->getOperator(), $numbers);

    $desc .= ' = ' . $total;

    return $desc;
  }

}