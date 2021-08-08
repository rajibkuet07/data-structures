<?php
// Fibonacci numbers/series
// 0 1 1 2 3 5 8 13 21 34 55  89 ... fib series
// 0 1 2 3 4 5 6 7  8  9  10  11     $n
// we can consider the series like a tree
//                                  7
//              5                                    6 
//      3                 4                 4                 5
//  1       2         2     3         2         3        3            4
//        0  1    0  1    1   2     0   1     1   2    1   2        2    3
// and so on

/**
 * Fibonacci serries function
 *
 * @param int $n number of the sequence
 * @return int
 */
function fib( $n ) {
  if ( $n <= 2 ) return 1;

  return fib( $n -1 ) + fib( $n - 2 );
}

echo "Fib function without any special process: \n";
echo fib( 4 ) . "\n"; // 3
echo fib( 7 ) . "\n"; // 13
echo fib( 11 ) . "\n"; // 55
echo fib( 20 ) . "\n"; // 6765
//echo fib( 50 ) . "\n"; // 13 // in this process it will be timeout


// To omit the timeout issue we can memoize the repeated calculation
// in the tree you can see 1, 2, 3, 4, 5 has repeated calculations
// so if we store the values after one calculation and use this on repeated calculation then the time complexity will be decrease
/**
 * Fibonacci function with memoization
 *
 * @param int $n number of the sequence
 * @param array $memo the memoization array to store the repeated calculations
 * @return int
 */
function fib_memoization( $n, &$memo = [] ) {
  if ( isset( $memo[ $n ] ) && ! empty( $memo[ $n ] ) ) return $memo[ $n ]; 

  if ( $n <= 2 ) return 1;

  $memo[ $n ] = fib_memoization( $n - 1, $memo ) + fib_memoization( $n - 2, $memo );
  return $memo[ $n ];
}

echo "Fib function with memoization: \n";
echo fib_memoization( 6 ) . "\n"; // 3
echo fib_memoization( 7 ) . "\n"; // 13
echo fib_memoization( 11 ) . "\n"; // 55
echo fib_memoization( 20 ) . "\n"; // 6765
echo fib_memoization( 50 ) . "\n"; // 12586269025

// https://www.youtube.com/watch?v=oBt53YbR9Kk&t=2827s
// Another process using tabulation
// 0 1 1 2 3 5 8 13 21 34 55  89 ... fib series
// 0 1 2 3 4 5 6 7  8  9  10  11     $n
// initially take an array of size $n
// set all the values 0
// set arr[1] = 1 as fib number of position 1 is 1
// now loop through from 0 to $n and each time add current position with the next two
// 0 0 0 0 0 0 initial array
// 0 1 0 0 0 0 set 1 to array[1]
// 0 1 0 0 0 0 index 0 add 0 with next two elements
// 0 1 1 1 0 0 index 1 add 1 with next two elements
// 0 1 1 2 1 0 index 2 add 1 with next two elements
// 0 1 1 2 3 2 index 3 add 2 with next two elements
// 0 1 1 2 3 5 index 4 add 3 with next two elements

/**
 * Fibonacci using tabulation
 *
 * @param int $n
 * @return int
 */
function fib_tabulation( $n ) {
  // fill the array with 0
  // two element more than the $n
  // cause we will add the current position with next 2
  $series = array_fill( 0, $n + 2, 0 ); // O(n)
  // set the value of index 1 1
  $series[1] = 1;
  
  // O(n)
  for ( $i = 0; $i < $n; $i++ ) {
    $series[ $i + 1 ] += $series[ $i ];
    $series[ $i + 2 ] += $series[ $i ];
  }
  return $series[ $n ];
}

echo "Fib function with tabulation: \n";
echo fib_tabulation( 6 ) . "\n"; // 3
echo fib_tabulation( 7 ) . "\n"; // 13
echo fib_tabulation( 11 ) . "\n"; // 55
echo fib_tabulation( 20 ) . "\n"; // 6765
echo fib_tabulation( 50 ) . "\n"; // 12586269025

/**
 * Fibonacci function using iteration
 * Similar to tabulation
 *
 * @param int $n
 * @return int
 */
function fib_iteration( $n ) {
  $series[0] = 0;
  $series[1] = 1;
  
  // O(n)
  for ( $i = 2; $i <= $n; $i++ ) {
    $series[ $i ] = $series[ $i - 1 ] + $series[ $i - 2 ];
  }
  return $series[ $n ];
}

echo "Fib function with iteration: \n";
echo fib_iteration( 6 ) . "\n"; // 3
echo fib_iteration( 7 ) . "\n"; // 13
echo fib_iteration( 11 ) . "\n"; // 55
echo fib_iteration( 20 ) . "\n"; // 6765
echo fib_iteration( 50 ) . "\n"; // 12586269025