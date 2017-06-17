<?php
/**
 * Created by PhpStorm.
 * User: johan
 * Date: 6/12/17
 * Time: 12:15 PM
 */

namespace SmartSheet\Sheet;

class Sheet extends AbstractSheet {
  /**
   * @inheritDoc
   */
  public function create ($id = NULL) {
  	$content = $this->getData();
  	$config = $this->getResource();

  	$data['json'] = $content;
  	$action = $config['action']['add'];

  	$uri = $id?str_replace(TOKEN_SHEET_ID,$id,$action['uri']):$action['uri'];

	$result = $this->smart_client->process(
		$action['method'],
		$uri,
		$data
	);

	return $result;
	}

  /**
   * @inheritDoc
   */
  public function get () {

  }

  /**
   * @inheritDoc
   */
  public function update () {
    // TODO: Implement update() method.
  }

  /**
   * @inheritDoc
   */
  public function delete () {
    $config = $this->getResource();
    $action = $config['action']['delete'];
    $content = $this->getData();
    $uri = str_replace(TOKEN_SHEET_ID, $content, $action['uri']);
    $result =  $this->smart_client->process($action['method'], $uri);
    return $result;
  }


}