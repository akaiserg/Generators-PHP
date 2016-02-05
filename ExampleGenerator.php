<?php
// simple example with  a function
/*
function collatz($val) {
    yield $val;

  while ($val != 1) {
      if ($val%2 == 0) $val /= 2;
      else $val = 3*$val + 1;

      yield $val;
  }
}

foreach (collatz(11) as $c) {
    echo $c," ";
}
*/
/*********************************/

/**
 * Returns an array with n values
 * @param $top
 * @return array
 */
$arrayData = function($top){
    $aData=Array();
    foreach (range(0, $top) as $number) {
        $aData[]= $number;
    }
    return $aData;
};


/**
 * Class oldWay
 * Old way in which  the result array is passed from one method to  another
 */
class oldWay {

    private $count;

    function __construct(Array $aData){

        $this->count=$this->checkOverANumber($this->checkOddNumber($aData),5);

    }

    private function checkOddNumber(Array $aData){

        $aOddNumbers=Array();
        foreach($aData as $key=>$values){
            if($values%2==0){
                $aOddNumbers[]=$values;
            }
        }
        return $aOddNumbers;

    }

    private function checkOverANumber($aOddNumbers,$top){

        $count=0;
        foreach($aOddNumbers as $values){
            if($values>=$top){
                $count++;
            }
        }
        return $count;

    }

    public function getCount(){

        return $this->count;

    }

}


/**
 * Class GeneratorWay
 * By using generator  is much easier  to get  the result of  one met5hod that has a loop
 */
class GeneratorWay {

    private $count;

    function __construct(Array $aData){

        $this->count=$this->checkOverANumber($this->checkOddNumber($aData),5);

    }

    private function checkOddNumber(Array $aData){

        $value=0;// It has to be defined
        yield $value;
        foreach($aData as $key=>$values){
            if($values%2==0){
                $value=$values;
               yield $value;
            }
        }

    }

    private function checkOverANumber($generator,$top){

        $count=0;
        foreach($generator as $values){
            if($values>=$top){
                $count++;
            }
        }
        return $count;
    }

    public function getCount(){

        return $this->count;

    }

}
echo "Without generator<br>";
// getting the  initial  time
$executionStartTime = microtime(true);
$o2= new oldWay($arrayData(200000));
echo "Result = ".$o2->getCount()."<br>";
// getting the  final  time
$executionEndTime = microtime(true);
$seconds = $executionEndTime - $executionStartTime;
echo " time = ".$seconds."<br>";

/*************************************/
echo "With generator<br>";
// getting the  initial  time
$executionStartTime = microtime(true);
$o= new GeneratorWay($arrayData(200000));
echo "Result = ".$o->getCount()."<br>";
// getting the  final  time
$executionEndTime = microtime(true);
$seconds = $executionEndTime - $executionStartTime;
echo " time = ".$seconds;