<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Illuminate\Console\Command;
use Jakmall\Recruitment\Calculator\Traits\History;
use Symfony\Component\Console\Input\InputArgument;

class HistoryClearCommand extends Command {
  use History;

  protected $name = 'history:clear';

  protected $description = 'Clear saved history';


  public function handle(){
    $filename = 'history.json';
    file_put_contents($filename, "");

    $this->info('History cleared!');
  }
  
}