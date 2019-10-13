<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class AddCommand extends Command{

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

    $result = '';
    $total = 0;
    $lastNumber = end($numbers);

    foreach($numbers as $number){
      $total += $number;
      
      if($number == $lastNumber){
        echo $result .= $number . ' = ' . $total;
      }else{
        $result .= $number . ' + ';
      }

    }
  }

}
