<?php 
function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function fillArray(){
	$array = array();
	for($i=0; $i<100; $i++){
		$array[] = rand(0,10000);
	}
	return $array;
}

function swapValues($array, $index1, $index2){
	//Swap in place
	$temp = $array[$index1];
	$array[$index1] = $array[$index2];
	$array[$index2] = $temp;
	return $array;
}

function selectionSort($array){
	$min = PHP_INT_MAX; 
	$min_index = 0;

	$max = -PHP_INT_MAX;
	$max_index = 0;
	for($i=0; $i<count($array); $i++){
		$min = $array[$i];
		$min_index = $i;
		$max = $array[$i];
		$max_index = $i;
		for($j=$i+1; $j<count($array); $j++){
			if($array[$j] < $min){
				$min = $array[$j];
				$min_index = $j;
			}
			else if($array[$j] > $max){
				$max = $array[$j];
				$max_index = $j;
			}
		}
		$array = swapValues($array, $min_index, $i);
		$array = swapValues($array, $max_index, $j-1);
	}
	return $array;
}

$time_start = microtime_float();
$array = selectionSort(fillArray());
$time_end = microtime_float();
$duration = $time_end - $time_start;
echo $duration;

var_dump($array);

?>