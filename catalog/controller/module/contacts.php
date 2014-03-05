<?php
/**
 * Created by PhpStorm.
 * User: sergei
 * Date: 3/5/14
 * Time: 1:39 PM
 */

class ControllerModuleContacts extends Controller{
	public function index() {
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/contacts.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/contacts.tpl';
		} else {
			$this->template = 'default/template/module/contacts.tpl';
		}
		$this->response->setOutput($this->render());
	}
}
?>