<?php 

namespace Jakmall\Recruitment\Calculator\Commands;

use Jakmall\Recruitment\Calculator\Traits\Result;
use Illuminate\Console\Command;
use Jakmall\Recruitment\Calculator\Traits\History;
use Symfony\Component\Console\Input\InputArgument;

class SubtractCommand extends Command{
  use Result, History;

  protected $name = 'subtract';

  protected $description = 'Subtract all given Numbers';

  protected function getArguments(){
    return [
      [
        'numbers', InputArgument::IS_ARRAY | InputArgument::REQUIRED, 'The numbers to be subtracted'
      ]
    ];
  }

  public function handle(){
    $numbers = $this->argument('numbers');

    $this->setOperator('-');
    $total = $this->calculate($numbers);
    $desc  = $this->getDescriptionResult($numbers, $total);

    $data = [
      'Command' => 'Subtract', 
      'Description' => $this->generateDescription(), 
      'Total' => $total, 
      'Output' => $desc, 
      'Time' => date('Y-m-d H:i:s')
    ];

    $this->initiate($data);

    echo $desc;
  }

  public function calculate($numbers){
    $total = array_shift($numbers);
    
    foreach($numbers as $number){
      $total = $total - $number;
    }

    return $total;
  }

}