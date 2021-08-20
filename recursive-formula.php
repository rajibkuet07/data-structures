<?php
/* ===RECURSIVE FORMULA=== */

/**
 * Recursive function to display $n numbers
 *
 * @param int $n
 * @return void
 */
 /*
 -- Step 1
 the base condition of the recursive function
 otherwise an infinite loop will occur
 after this stage the function will exit
 here, when the value of $n is 0 then the function will return
 
 -- Step 2 (optional)
 Any code if needed
 the lines in step 2 will execute before the recursive call
 here, for the first entry to the function with $n = 10 the line in step 2 will echo 10
 on next call from step 3 the value of $n will be 9, so, then it will print 9

 -- Step 3
 after completing steps 1 & 2 if the base condition is not fulfilled then the step 3 will be executed
 after first entry the next values of $n will be $n -1 = 10 - 1 = 9, 9 - 1 = 8 ... 1 - 1 = 0
 when the value becomes 0 then it will match the exit condition

 the function calls will be
 recursive_print(10)
      echo 10
 recursive_print(9)
      echo 9
 recursive_print(8)
      echo 8
 recursive_print(7)
      echo 7
 recursive_print(6)
      echo 6
 recursive_print(5)
      echo 5
 recursive_print(4)
      echo 4
 recursive_print(3)
      echo 3
 recursive_print(2)
      echo 2
 recursive_print(1)
      echo 1
 recursive_print(0)
      return; // exit condition

  After exit condition
  recursive_print(0) will be finished and control will go to the recursive_print(1)
  as there is nothing after that function nothing will be done and the function will be finished
  and control will go to the recursive_print(2) and so on upto recursive_print(10)
 */
function recursive_print( $n ) {
  // base condition or exit condition -- Step 1
  if ( $n <= 0 ) return;

  // any code to execute before recursive call -- Step 2
  // any other conditions also can be here
  echo $n . '   '; // print $n value with four spaces

  // recursive call -- Step 3
  recursive_print( $n - 1 );
}
echo 'Recursive to print $n numbers' . PHP_EOL;
recursive_print( 10 );
echo PHP_EOL;

/**
 * Recursive function to print $n numbers in reverse order
 * 1 2 3 4 5 6 7 8 ... n-2 n-1 n
 *
 * @param int $n
 * @return void
 */
 /*
 the function calls will be
 reverse_recursive_print(10)
 reverse_recursive_print(9)
 reverse_recursive_print(8)
 reverse_recursive_print(7)
 reverse_recursive_print(6)
 reverse_recursive_print(5)
 reverse_recursive_print(4)
 reverse_recursive_print(3)
 reverse_recursive_print(2)
 reverse_recursive_print(1)
 reverse_recursive_print(0)
      return; // exit condition
 
 After completing the exist condition the control will go to reverse_recursive_print(1)
 as there is some code after the function call so the lines will be executed now
 so it will print 1 as $n = 1 now
 after that the control will go to reverse_recursive_print(2) and will print 2
 similarly upto 10
 */
function reverse_recursive_print( $n ) {
  // base condition or exit condition -- Step 1
  if ( $n <= 0 ) return;

  // recursive call
  reverse_recursive_print( $n - 1 );

  // any code to execute before recursive call
  // any other conditions also can be here
  echo $n . '   '; // print $n value with four spaces
}
echo 'Recursive to print $n numbers in reverse order' . PHP_EOL;
reverse_recursive_print( 10 );
echo PHP_EOL;

/**
 * nth Fibonacci number
 * there is some other better techniques in random-problems folder
 *
 * @param int $n
 * @return int
 */
function fibonacci_number( $n ) {
  if ( $n <= 2 ) return 1;

  return fibonacci_number( $n -1 ) + fibonacci_number( $n -2 );
}
echo 'Recursive to print $n th fibonacci numbers' . PHP_EOL;
echo fibonacci_number( 10 );
echo PHP_EOL;

/**
 * Factorial
 *
 * @param int $n
 * @return int
 */
function factorial( $n ) {
  if ( $n <= 1 ) return 1;

  return $n * factorial( $n -1 );
}
echo 'Recursive to print factorial of $n' . PHP_EOL;
echo factorial( 5 );
echo PHP_EOL;

/*
Some other examples are
-- print/reverse a linked list
-- depth-first traversal in tree
*/