<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Jakmall\Recruitment\Calculator\Traits\Result;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class PowCommand extends Command {

  use Result;

  protected $name = 'pow';

  protected $description = 'Exponent the given number';

  protected function getArguments(){
    return [
      [
        'base', InputArgument::REQUIRED, 'The base number'
      ],
      [
        'exp', InputArgument::REQUIRED, 'The exponent number'
      ]
    ];
  }

  public function handle(){
    $base = $this->argument('base');
    $exp  = $this->argument('exp');
    $numbers = [
      $base, $exp
    ];

    $this->setOperator('^');
    $total = $this->calculate($base, $exp);

    echo $this->getDescriptionResult($numbers, $total);
  }

  public function calculate($base, $exp){
    $total = pow($base, $exp);

    return $total;
  }

}