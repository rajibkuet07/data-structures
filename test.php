<?php
// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($S) {
  // write your code in PHP7.0
  $sentances = explode( '\n', $S ); // split the sentances
  
  $photo_names = [];
  $collection = [];
  foreach ( $sentances as $sentance ) {
      $words = explode( ', ', $sentance );
      $ext = explode( '.',  $words[0] )[1]; // extension
      if ( ! isset( $collection[$words[1]] ) ) {
        $collection[$words[1]] = 0;
      }
      $collection[$words[1]] += 1;
      array_push( $photo_names, [ $words[1], $ext, $collection[$words[1]] ] );
  }

    $str = '';
  foreach ( $photo_names as $photo ) {
      $strlen = strlen(( string ) $collection[$photo[0]]);
      $name = $photo[0] . str_pad( $photo[2], $strlen, '0', STR_PAD_LEFT ) . '.' . $photo[1];
      $str = $str . $name . PHP_EOL;
      print_r( $str );
  }
  
  //print $str;
  //var_dump( $str );
  return $str;
}

$ret = solution('photo.jpg, Warsaw, 2013-09-05 14:08:15\njohn.png, London, 2015-06-20 15:13:22\nmyFriends.png, Warsaw, 2013-09-05 14:07:13\nEiffel.jpg, Paris, 2015-07-23 08:03:02\npisatower.jpg, Paris, 2015-07-22 23:59:59\nBOB.jpg, London, 2015-08-05 00:02:03\nnotredame.png, Paris, 2015-09-01 12:00:00\nme.jpg, Warsaw, 2013-09-06 15:40:22\na.png, Warsaw, 2016-02-13 13:33:50\nb.jpg, Warsaw, 2016-01-02 15:12:22\nc.jpg, Warsaw, 2016-01-02 14:34:30\nd.jpg, Warsaw, 2016-01-02 15:15:01\ne.png, Warsaw, 2016-01-02 09:49:09\nf.png, Warsaw, 2016-01-02 10:55:32\ng.jpg, Warsaw, 2016-02-29 22:13:11');
echo $ret;