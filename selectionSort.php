<?php 
function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

function fillArray(){
	$array = array();
	for($i=0; $i<10; $i++){
		$array[] = rand(0,9);
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
		$max_index = $i;
		for($j=$i+1; $j<=count($array)-$i-1; $j++){
			if($array[$j] < $array[$min_index])
				$min_index = $j;
			if($array[$j] > $array[$max_index])
				$max_index = $j;
		 }
		$array = swapValues($array, $min_index, $i);
		if($max_index == $i)
			$max_index = $min_index;
		$array = swapValues($array, count($array)-$i-1, $max_index);
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