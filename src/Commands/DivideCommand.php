<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Jakmall\Recruitment\Calculator\Traits\Result;

class DivideCommand extends Command{
  use Result;

  protected $name = 'divide';

  protected $description = 'divide all given Numbers';

  protected function getArguments(){
    return [
      [
        'numbers', InputArgument::IS_ARRAY | InputArgument::REQUIRED, 'The numbers to be divided'
      ]
    ];
  }

  public function handle(){
    $numbers = $this->argument('numbers');

    $this->setOperator('/');
    $total = $this->calculate($numbers);

    echo $this->getDescriptionResult($numbers, $total);
  }

  public function calculate($numbers){
    $total = array_shift($numbers);

    foreach($numbers as $number){
      $total = $total / $number;
    }

    return $total;
  }

}
