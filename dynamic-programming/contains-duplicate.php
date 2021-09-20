<?php

/**
 * Find or check if an array contains duplicate number.
 * If has duplicate then return true, if not then return false.
 * [4, 1, 9, 1, 11, 19] return true
 * [5, 9, 13, 12] return false
 * 
 * This question can be in two format
 * 1. The value of the items in an array should be 0 to n-1. where n is number of elements.
 *    - in this case the time complexity will be O(n) and space will be O(1)
 * 2. No boundary of the values.
 *    - in this case the time complexity will be O(n) and space will be O(n)
 */

/**
 * Contains duplicate first question format
 * Approach One
 *
 * @param array $numbers array of numbers
 * @return string
 */
function contains_duplicate_I_I( $numbers ) {
  $length = count( $numbers );

  // add length to each item
  for ( $i = 0; $i < $length; $i++ ) {
    $numbers[ $numbers[ $i ] % $length ] += $length;
  }
  
  // if any items value is divided more than once than its repeated
  for ( $i = 0; $i < $length; $i++ ) {
    if ( floor( $numbers[ $i ] / $length ) > 1 ) {
      return 'Contains duplicate';
    }
  }
  return 'Does not contain duplicate';
}

echo "Question 1 approach 1: ";
echo contains_duplicate_I_I( [0, 4, 3, 2, 5, 1] );
echo "\n";

/**
 * Contains duplicate first question format
 * Approach Two
 *
 * @param array $numbers array of numbers
 * @return string
 */
function contains_duplicate_I_II( $numbers ) {
  $length = count( $numbers );

  for ( $i = 0; $i < $length; $i++ ) {
    // make negative of each value if positive
    if ( $numbers[ abs( $numbers[ $i ] ) ] >= 0 ) {
      $numbers[ abs( $numbers[ $i ] ) ] = -$numbers[ abs( $numbers[ $i ] ) ];
    } else {
      return 'Contains duplicate';
    }
  }
  return 'Does not contain duplicate';;
}

echo "Question 1 approach 2: ";
echo contains_duplicate_I_II( [1, 4, 3, 2, 5, 1] );
echo "\n";

/**
 * Contains duplicate second question format
 * Approach 1
 * O(n) - space
 *
 * @param array $numbers array of numbers
 * @return string
 */
function contains_duplicate_II_I( $numbers ) {
  $length   = count( $numbers );
  $hash_map = (object)[];

  foreach ( $numbers as $num ) {
    if ( isset( $hash_map->$num ) ) {
      return 'Contains duplicate';
    }

    $hash_map->$num = true;
  }
  
  return 'Does not contain duplicate';
}

echo "Question 2 approach 1: ";
echo contains_duplicate_II_I( [0, -3, 3, 2, 5, 1] );
echo "\n";

/**
 * Contains duplicate second question format
 * Approach 2
 * O(nlogn) - time as sorting need nlogn
 * O(1) - space
 *
 * @param array $numbers array of numbers
 * @return string
 */
function contains_duplicate_II_II( $numbers ) {
  $length = count( $numbers );

  // sort the array
  sort( $numbers );

  for ( $i = 0; $i < $length -1; $i++ ) {
    if ( $numbers[ $i ] === $numbers[ $i + 1 ] ) {
      return 'Contains duplicate';
    }
  }
  
  return 'Does not contain duplicate';
}

echo "Question 2 approach 2: ";
echo contains_duplicate_II_II( [0, -3, 3, 2, 5, 1] );
echo "\n";
