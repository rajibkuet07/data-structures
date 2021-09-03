<?php
ini_set( 'display_errors', 'On' );

// Singly linked list

/**
 * Node class to process node information
 */
class Node {
  /**
   * Node data attribute
   *
   * @var mixed
   */
  private $data;

  /**
   * Node next attribute
   *
   * @var object
   */
  private $next;

  /**
   * Node class constructor
   */
  public function __construct() {
    $this->data = 0;
    $this->next = null;
  }
  
  /**
   * To set the data attribute of a node
   *
   * @param mixed $data
   * @return void
   */
  public function setData( $data ) {
    $this->data = $data;
  }

  /**
   * To get the data attribute of a node
   *
   * @return mixed
   */
  public function getData() {
    return $this->data;
  }
  
  /**
   * To set the next attribute of a node
   *
   * @param object $next
   * @return void
   */
  public function setNext( $next ) {
    $this->next = $next;
  }

  /**
   * To get the next attribute of a node
   *
   * @return object
   */
  public function getNext() {
    return $this->next;
  }
}


class Linked_List {
  /**
   * Variable to keep the head information of the list
   * Head is the entry point of a link list
   *
   * @var object
   */
  private $head;

  /**
   * Constructor of the class
   */
  public function __construct() {
    $this->head = null;
  }

  /**
   * Get the head of the list
   *
   * @return object
   */
  public function getHead() {
    return $this->head;
  }

  /**
   * Set the head of the list
   *
   * @return void
   */
  public function setHead( $node ) {
    $this->head = $node;
  }

  /**
   * Create a new node using the data
   *
   * @param mixed $data
   * @return object
   */
  private function create_node( $data ) {
    $new_node = new Node();
    $new_node->setData( $data );

    return $new_node;
  }

  /**
   * Insert a node at the end of the list
   *
   * @param mixed $data
   * @return void
   */
  public function insert_at_back( $data ) {
    // create a new node
    $new_node = $this->create_node( $data );

    if ( $this->head ) {
      // set the head as current node
      $current_node = $this->head;

      // find the last node (the last node's next is always null of a linear link list)
      while ( $current_node->getNext() !== null ) {
        $current_node = $current_node->getNext();
      }

      $current_node->setNext( $new_node );
    } else {
      // if list is empty then add the new node as the head
      $this->head = $new_node;
    }
  }

  /**
   * Insert a node at the start of the list
   *
   * @param mixed $data
   * @return void
   */
  public function insert_at_front( $data ) {
    // create a new node
    $new_node = $this->create_node( $data );

    if ( $this->head ) {
      // add the head(previously created) as the next of the new node
      $new_node->setNext( $this->head );
    }

    // then set the new node as the new head
    $this->head = $new_node;
  }

  /**
   * Insert a node after a specific node of the list
   * actually value comparison needed, so not right for all types of data
   *
   * @param mixed $data
   * @param int $target the value of the target node
   * @return void
   */
  public function insert_after_specific_node( $data, $target ) {
    // create a new node
    $new_node = $this->create_node( $data );
    
    if ( $this->head ) {
      $current_node = $this->head;

      // check through the list for the target node
      // if it is last node then skip
      while (
        $current_node->getData() !== $target &&
        $current_node->getNext() !== null
      ) {
        $current_node = $current_node->getNext();
      }

      // if match found then add the new node as next of the current node
      if ( $current_node->getData() === $target ) {
        $current_next = $current_node->getNext();

        $current_node->setNext( $new_node );
        $new_node->setNext( $current_next );
      }
      // if no match found do nothing or do something in the future
    }
  }

  /**
   * Insert a node before a specific node of the list
   * actually value comparison needed, so not right for all types of data
   *
   * @param mixed $data
   * @param int $target the value of the target node
   * @return void
   */
  public function insert_before_specific_node( $data, $target ) {
    // create a new node
    $new_node = $this->create_node( $data );
    
    if ( $this->head ) {
      $current_node   = $this->head;
      $previous_node  = null;

      // check through the list for the target node
      // if it it last node then skip
      while (
        $current_node->getData() !== $target &&
        $current_node->getNext() !== null
      ) {
        $previous_node  = $current_node;
        $current_node   = $current_node->getNext();
      }

      // if match found then add the new node as previous of the current node
      if ( $current_node->getData() === $target ) {
        if ( $previous_node ) {
          $previous_node->setNext( $new_node );
          $new_node->setNext( $current_node );
        } else {
          $new_node->setNext( $current_node );
          $this->head = $new_node;
        }
      }
      // if no match found do nothing or do something in the future
    }
  }

  /**
   * Insert a node after a specific position of the list
   * actually we have to count the index of the node
   *
   * @param mixed $data
   * @param int $position the position of the target node
   * @return void
   */
  public function insert_after_specific_position( $data, $position ) {
    // create a new node
    $new_node = $this->create_node( $data );
    
    if ( $this->head ) {
      $current_node   = $this->head;

      // check through the list for the target node
      // if it it last node then skip
      // if pos of the node is 1 node before then skip
      $pos = 0;
      while (
        $pos <= $position - 1 &&
        $current_node->getNext() !== null
      ) {
        $current_node   = $current_node->getNext();

        $pos++;
      }
      
      // didn't check the position if it is larger than the size of the list
      // if larger then insert as last node
      $current_next = $current_node->getNext();
      $current_node->setNext( $new_node );
      $new_node->setNext( $current_next);
      // if no match found do nothing or do something in the future
    } else {
      $this->head = $new_node;
    }
  }

  /**
   * Delete a node comparing the data
   *
   * @param mixed $target
   * @return void
   */
  public function delete_target_node( $target ) {
    if ( $this->head ) {
      $previous_node  = null;
      $current_node   = $this->head;

      // check through the list for the target node
      // if it it last node then skip
      while ( 
        $current_node->getData() !== $target &&
        $current_node->getNext() !== null
      ) {
        $previous_node  = $current_node;
        $current_node   = $current_node->getNext();
      }

      if ( $current_node->getData() === $target ) {
        if ( $previous_node ) {
          $previous_node->setNext( $current_node->getNext() );
        } else {
          $this->head = $current_node->getNext();
        }
        unset( $current_node );
      }
    }
  }

  /**
   * Reverse a linked list using recursive function
   *
   * @param Node $node
   * @return void
   */
  public function reverse_recursive( $node ) {
    // for n th item that means the last item of the list
    // if the last item of list then stop recursive
    // the last node will be the head of the reversed list
    if ( $node === null || $node->getNext() === null ) {
      $this->setHead( $node );
      return;
    }
    $this->reverse_recursive( $node->getNext() );

    // for n-1, n-2, -3 ... 2, 1, 0
    // now the n-1 will be the next of the n th item
    // n-2 will be next of n-1 th item
    $recursive_previous = $node->getNext();
    $recursive_previous->setNext( $node );
    $node->setNext( null );
  }
}

function wbfxpr( $data ) {
  echo '<pre>';
  print_r( $data );
  echo '</pre>';
}

$list = new Linked_List();

// insert at front
$list->insert_at_front(3);
echo 'Insert from front <br />';
wbfxpr( $list->getHead() );

// insert at back
$list->insert_at_back(5);
echo 'Insert from back <br />';
wbfxpr( $list->getHead() );

// insert after specific
$list->insert_after_specific_node(9, 3);
echo 'Insert after specific node<br />';
wbfxpr( $list->getHead() );

// insert before specific
$list->insert_before_specific_node(12, 5);
echo 'Insert before specific node <br />';
wbfxpr( $list->getHead() );

// insert after specific position
$list->insert_after_specific_position(15, 3);
echo 'Insert after specific position <br />';
wbfxpr( $list->getHead() );

// insert before specific
$list->delete_target_node(9);
echo 'Delete a node <br />';
wbfxpr( $list->getHead() );

// reverse the list using recursive function
$list->reverse_recursive( $list->getHead() );
echo 'Reverse using recursive <br />';
wbfxpr( $list->getHead() );
