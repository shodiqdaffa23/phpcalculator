<?php

namespace Jakmall\Recruitment\Calculator\Commands;

use Illuminate\Console\Command;
use Jakmall\Recruitment\Calculator\Traits\History;
use Symfony\Component\Console\Input\InputArgument;

class HistoryListCommand extends Command {
  use History;

  protected $name = 'history:list';

  protected $description = 'Show calculator history';

  protected function getArguments(){
    return [
      [
        'commands', InputArgument::IS_ARRAY, 'Filter the history by commands'
      ]
    ];
  }

  public function handle(){
    $commands = $this->argument('commands');
    $data     = $this->getDataArray($commands);
    $headers  = ['No', 'Command', 'Description', 'Result', 'Output', 'Time'];
    
    ((!empty($data))) ? $this->table($headers, $data) : $this->info('History is empty.');

  }
  


}