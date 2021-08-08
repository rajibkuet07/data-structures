<?php

/**
 * Merge sort function
 *
 * @param array $arr reference of array
 * @param int $left
 * @param int $right
 * @return void
 */
function merge_sort( &$arr, $left, $right ) {
  // if array has only one value or less than it is already sorted
  if ( $left >= $right ) {
    return;
  }

  // find the mid of the array
  $mid = $left + floor( ( $right - $left ) / 2 );

  // merge the left half part of the array
  merge_sort( $arr, $left, $mid );
  // merge the right half part of the array
  merge_sort( $arr, $mid + 1, $right );

  // finally sort and merge the array
  merge( $arr, $left, $mid, $right );
}

/**
 * Merge function
 * Compare two array elements and sort them
 *
 * @param array $arr reference of array
 * @param int $left
 * @param int $mid
 * @param int $right
 * @return void
 */
function merge( &$arr, $left, $mid, $right ) {
  $left_arr   = [];
  $right_arr  = [];

  // calculate the total number of element n the left and right array
  $left_arr_count   = $mid - $left + 1;
  $right_arr_count  = $right - $mid;

  // create the left & right arrays from $arr
  // can also be done using array_slice
  for ( $i = 0; $i < $left_arr_count; $i++ ) {
    $left_arr[ $i ] = $arr[ $left + $i ];
  }
  for ( $i = 0; $i < $right_arr_count; $i++ ) {
    $right_arr[ $i ] = $arr[ $mid + 1 + $i ];
  }
  
  $i = $j = 0;
  $index = $left;
  // compare left and right arrays and place them in order
  while ( $i < $left_arr_count && $j < $right_arr_count ) {
    if ( $left_arr[ $i ] <= $right_arr[ $j ] ) {
      $arr[ $index ] = $left_arr[ $i ];
      $i++;
    } else {
      $arr[ $index ] = $right_arr[ $j ];
      $j++;
    }
    $index++;
  }

  // now add the rest of the elements from left and right arrays
  while ( $i < $left_arr_count ) {
    $arr[ $index ] = $left_arr[ $i ];
    $i++;
    $index++;
  }

  while ( $j < $right_arr_count ) {
    $arr[ $index ] = $right_arr[ $j ];
    $j++;
    $index++;
  }

  // echo '<pre>';
  // echo $left . '===' . $right . '<br />';
  // echo $left_arr_count . '===' . $right_arr_count . '<br />';
  // print_r( $left_arr );
  // print_r( $right_arr );
  // print_r( $arr );
  // echo '=======';
  // echo '</pre>';
  // return $arr;
}

// $arr = [ 4, 2, 3, 1 ];
$arr = [ 3, 7, 4, 11, 6, 5, 1, 19, 8, 2, 5 ];
$length = count( $arr );
//echo $length;

// send the address of the array so that the change occurs in the main array
merge_sort( $arr, 0, $length - 1 );

echo '<pre>';
print_r( $arr );
echo '</pre>';
