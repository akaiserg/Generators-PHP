# PHP Generators

Since PHP 5.5 we get a new keyword called yield, this allow to  create an iterator    which can  minimize   the execution time  considerably.



```php
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
```


```php
private function checkOverANumber($generator,$top){

		$count=0;
    	foreach($generator as $values){
    		if($values>=$top){
        		$count++;
        	}
   		}
   		return $count;
   }


```

To use  the generator, this has to be passed  to  the other method  directly.


```php
$this->count=$this->checkOverANumber($this->checkOddNumber($aData),5);
```


### Reference:

 * [Generators](http://php.net/manual/en/language.generators.overview.php) 
 

 
