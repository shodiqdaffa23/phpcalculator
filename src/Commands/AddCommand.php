<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Jakmall\Recruitment\Calculator\Traits\Result;

class AddCommand extends Command{
  use Result;

  protected $name = 'add';

  protected $description = 'Add all given Numbers';

  protected function getArguments(){
    return [
      [
        'numbers', InputArgument::IS_ARRAY | InputArgument::REQUIRED, 'The numbers to be added'
      ]
    ];
  }

  public function handle(){
    $numbers = $this->argument('numbers');

    $this->setOperator('+');
    $total = $this->calculate($numbers);

    echo $this->getDescriptionResult($numbers, $total);
  }

  public function calculate($numbers){
    $total = 0;

    foreach($numbers as $number){
      $total += $number;
    }

    return $total;
  }

}
