<?php
/**
 * Created by PhpStorm.
 * User: johan
 * Date: 6/12/17
 * Time: 12:21 PM
 */

namespace SmartSheet\Sheet;


/**
 * Class Properties
 * @package SmartSheet\Sheet
 */
class Properties {

  /**
   * @var
   */
  private $data;
  /**
   * @var
   */
  private $type;


  public function setType($type) {
  	$this->type = $type;
  }

  public function setData($data ) {
  	$this->data = $data;
  }

  public function getData() {
  	return $this->data;
  }

  /**
   * @param $name
   *
   * @return null
   */
  public function __get ( $name ) {
    $result = NULL;
    if ( array_key_exists( $name, $this->data ) ) {
      $result = $this->data[ $name ];
    }

    return $result;
  }


  /**
   * @param $name
   * @param $value
   */
  public function __set ( $name, $value ) {
    $this->data[ $name ] = $value;
  }

}