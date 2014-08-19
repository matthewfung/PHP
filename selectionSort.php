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
	for($i=0; $i<=count($array)-$i-1; $i++){
		$min_index = $i;
		$max_index = count($array)-$i-1;
		for($j=$i+1; $j<=count($array)-$i-1; $j++){
			if($array[$j] < $array[$min_index])
				$min_index = $j;
			if($array[$j] > $array[$max_index])
				$max_index = $j;
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