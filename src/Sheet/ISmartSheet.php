<?php
/**
 * Created by PhpStorm.
 * User: johan
 * Date: 6/12/17
 * Time: 12:19 PM
 */

namespace SmartSheet\Sheet;


/**
 * Interface ISmartSheet
 * @package SmartSheet\Sheet
 */
interface ISmartSheet {

  /**
   * @return mixed
   */
  public function create ();

  /**
   * @return mixed
   */
  public function get ();

  /**
   * @return mixed
   */
  public function update ();

  /**
   * @return mixed
   */
  public function delete ();

}