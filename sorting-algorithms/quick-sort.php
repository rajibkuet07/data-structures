<?php

/**
 * Quick sort function
 *
 * @param array $arr reference of the array
 * @param int $low // first index of array
 * @param int $high last index of array
 * @return void
 */
function quick_sort( &$arr, $low, $high ) {
  // if array is empty or has only one element
  if ( $low >= $high ) {
    return;
  }

  // find the partition of the sort
  $partition_index = partition( $arr, $low, $high );

  // sort the left half part of the partition index
  quick_sort( $arr, $low, $partition_index - 1 );
  // sort the right half part of the partition index
  quick_sort( $arr, $partition_index + 1, $high );
}

/**
 * Partition the array and find the correct index for the last item
 *
 * @param array $arr
 * @param int $low
 * @param int $high
 * @return int
 */
 // 6 4 5 2 3 pivot = 3
 // 6 4 5 2 3 // no exchange 6 > 3
 // 6 4 5 2 3 // no exchange 4 > 3
 // 6 4 5 2 3 // no exchange 5 > 3
 // 2 4 5 6 3 // exchange 2 < 3 now index is 0
 // 2 3 5 6 4 // finally exchange 3 with index + 1
 // now partition index is 1
 // [2] and [5 6 4] is two partitions
 // repeat the process for both partitions until sorted

// https://www.youtube.com/watch?v=kwG0C2Lv-fQ&list=PLym69wpbTIIEOesltWGUsVnY9HDWbJit_&index=28
function partition( &$arr, $low, $high ) {
  $index = $low;

  // $arr[$high] is also called pivot
  $pivot = $arr[ $high ];

  // compare the current value with the pivot and exchange it to the arr[$index] if smaller
  for ( $i = $low; $i <= $high - 1; $i++ ) {
    if ( $arr[ $i ] <= $pivot ) {
      $temp         = $arr[ $index ];
      $arr[ $index ]= $arr[ $i ];
      $arr[ $i ]    = $temp;
      $index++;
    }
  }

  // finally exchange the pivot with $arr[$index]
  $temp         = $arr[ $index ];
  $arr[ $index ]= $pivot;
  $arr[ $high ] = $temp;

  return $index;
}

// $arr = [ 4, 1, 3, 2 ];
$arr = [ 100, 3, 7, 4, 11, 6, 5, 1, 19, 8, 2, 5 ];
$length = count( $arr );

// send the address of the array so that the change occurs in the main array
quick_sort( $arr, 0, $length - 1 );

echo '<pre>';
print_r($arr);
echo '</pre>';