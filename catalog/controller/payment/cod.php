<?php
class ControllerPaymentCod extends Controller {
	protected function index() {
		$this->data['button_confirm'] = $this->language->get('button_confirm');

		$this->data['continue'] = $this->url->link('checkout/success');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/cod.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/payment/cod.tpl';
		} else {
			$this->template = 'default/template/payment/cod.tpl';
		}

		$this->render();
	}

	public function confirm() {
		$this->load->model('checkout/order');

		$this->model_checkout_order->confirm($this->session->data['order_id'], $this->config->get('cod_order_status_id'));
	}

	public function printInvoice() {
		if (isset($this->request->get['order_id'])) {
			$order_id = $this->request->get['order_id'];
			$this->load->model('checkout/order');
			$order = $this->model_checkout_order->getOrder($order_id) ;
			header('Content-type: application/txt');
			header('Content-Disposition: attachment; filename="order_persona.txt"');
			echo 'Номер заказа: ' . $order["order_id"] . PHP_EOL;
			echo 'Клиент: ' . $order['lastname'] . ' ' . $order['firstname'] . PHP_EOL;
			echo 'Телефон: ' . $order['telephone'] . PHP_EOL;
			echo 'К оплате: ' . $order['total'] . PHP_EOL;
		}
	}
}
?>