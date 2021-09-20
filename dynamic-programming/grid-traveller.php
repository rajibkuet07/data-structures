<?php

// Problem: Suppose you are a traveller on 2D grid. You begin in the top-left corner and your goal is to travel to the bottom-right corner. You can only move down or right.
// In how many ways can you travel to the goal on a grid with dimensions m * n
// suppose m = 2, and n = 3
/*
-------------------------------------
|    You    |          |            |
-------------------------------------
|           |          |   goal     |
-------------------------------------
*/
// Tree representation of the problem
// left side indicates down move, and right side indicates right move
// down move decreases the row or m, right move decreases the colum or n
/*
                                              (2, 3)

                    (1, 3)                                                      (2, 2)

      (0, 3)                (1, 2)                            (1, 2)                             (2, 1)

                  (0, 2)            (1, 1)            (0, 2)        (1, 1)              (1, 1)              (2, 0)
*/
// if any of row or column value is 0 than the move is not possible. so we can consider these nodes as leaf nodes.
// if the row and column values are 1 then the number of move is 1

/**
 * Grid traveller
 *
 * @param int $m row
 * @param int $n column
 * 
 * @return int
 */
function grid_traveller( $m, $n ) {
  if ( $m === 0 || $n === 0 ) return 0;
  if ( $m === 1 && $n === 1 ) return 1;

  return grid_traveller( $m - 1, $n ) + grid_traveller( $m, $n -1 );
}

echo "Grid traveller without any process: \n";
echo grid_traveller(2,3) . "\n"; //3
echo grid_traveller(3,3) . "\n"; // 6
// echo grid_traveller(40,60) . "\n"; // timeout

/**
 * Grid traveller using memoization
 * memoization explained in fibonacci number
 *
 * @param int $m row
 * @param int $n column
 * @param array $memo
 * @return int
 */
function grid_traveller_memoization( $m, $n, &$memo = [] ) {
  $key = $m . ',' . $n;
  if ( isset( $memo[$key] ) && ! empty( $memo[$key] ) ) return $memo[$key];

  if ( $m === 0 || $n === 0 ) return 0;
  if ( $m === 1 && $n === 1 ) return 1;

  $memo[$key] = grid_traveller_memoization( $m - 1, $n, $memo ) + grid_traveller_memoization( $m, $n -1, $memo );
  return $memo[$key];
}

echo "Grid traveller function with memoization: \n";
echo grid_traveller_memoization(2,3) . "\n"; // 3
echo grid_traveller_memoization(3,3) . "\n"; // 6
echo grid_traveller_memoization(40,60) . "\n"; // 3.3324203989825E+27

/**
 * Grid traveller using tabulation
 *
 * @param int $m row
 * @param int $n column
 * @return int
 */
/*
 m = 2 n = 3
 so row = 2 + 1, column = 3 + 1
 initialize the table
 0 1 2 3     <-column indexes
 0 0 0 0     row index 0
 0 0 0 0     row index 1
 0 0 0 0     row index 2
 set [1][1]'s value 1
 0 0 0 0
 0 1 0 0
 0 0 0 0
 0 0 0 0
 now iterate this 2D array and
 add the current with the right and the down element if it exists
 when i = 2, j =  2
 0 0 0 0
 0 1 1 0
 0 1 0 0
 when i = 2, j =  3
 0 0 0 0
 0 1 1 1
 0 1 1 0
 when i = 3, j =  2
 0 0 0 0
 0 1 1 1
 0 1 2 0
 and so on
 */
function grid_traveller_tabulation( $m, $n ) {
  $grids = array_fill( 0, $m + 1, array_fill( 0, $n + 1, 0 ) );

  $grids[1][1] = 1;

  for ( $i = 0; $i <= $m; $i++ ) {
    for ( $j = 0; $j <= $n; $j++ ) {
      if ( $j + 1 <= $n ) $grids[$i][$j + 1] += $grids[$i][$j];
      if ( $i + 1 <= $m ) $grids[$i + 1][$j] += $grids[$i][$j];
    }
  }
  return $grids[$m][$n];
}

echo "Grid traveller function with memoization: \n";
echo grid_traveller_tabulation(2,3) . "\n"; // 3
echo grid_traveller_tabulation(3,3) . "\n"; // 6
echo grid_traveller_tabulation(40,60) . "\n"; // 3.3324203989825E+27