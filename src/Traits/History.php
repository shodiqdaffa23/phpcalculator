<?php

namespace Jakmall\Recruitment\Calculator\Traits;

trait History{

  protected $data = [];

  public function getFilename(): string{
    return 'history.json';
  }

  public function getDataArray($commands = []){
    $inp = file_get_contents($this->getFilename());
    
    if(!empty($inp)){
      $datas     = json_decode($inp);
      $dataArray = [];

      $i = 1;

      if(count($commands) <0){
        foreach($datas as $data){
          $dataArray[] = [
            $i,
            $data->Command,
            $data->Description,
            $data->Total,
            $data->Output,
            $data->Time
          ];
  
          $i++;
        }
      }else{
        foreach($datas as $data){
          $command = strtolower($data->Command);
          if(in_array($command, $commands)){
            $dataArray[] = [
              $i,
              $data->Command,
              $data->Description,
              $data->Total,
              $data->Output,
              $data->Time
            ];
    
            $i++;
          }
        }
      }
      
      return $dataArray;
    }

    return null;
  }

  public function initiate($data){
    $filename  = $this->getFilename();
    $tempArray = [];
    $inp       = file_get_contents($filename);

    if(!empty($inp)){
      $tempArray = json_decode($inp);
    }
    
    array_push($tempArray, $data);
    $dataStore = $tempArray;

    $fhist = file_put_contents('history.json', json_encode($dataStore));  
  
  }

}