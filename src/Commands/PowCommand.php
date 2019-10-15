<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Jakmall\Recruitment\Calculator\Traits\Result;
use Illuminate\Console\Command;
use Jakmall\Recruitment\Calculator\Traits\History;
use Symfony\Component\Console\Input\InputArgument;

class PowCommand extends Command {
  use Result, History;

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
    $desc  = $this->getDescriptionResult($numbers, $total);

    $data = [
      'Command' => 'Pow', 
      'Description' => $this->generateDescription(), 
      'Total' => $total, 
      'Output' => $desc, 
      'Time' => date('Y-m-d H:i:s')
    ];

    $this->initiate($data);

    echo $desc;
  }

  public function calculate($base, $exp){
    $total = pow($base, $exp);

    return $total;
  }

}