<?php
class CartComponent extends Component {

//////////////////////////////////////////////////

	public $components = array('Session');

//////////////////////////////////////////////////

	public $controller;

//////////////////////////////////////////////////

	public function __construct(ComponentCollection $collection, $settings = array()) {
		$this->controller = $collection->getController();
		parent::__construct($collection, array_merge($this->settings, (array)$settings));
	}

//////////////////////////////////////////////////

	public function startup(Controller $controller) {
		//$this->controller = $controller;
	}

//////////////////////////////////////////////////

	public $maxQuantity = 1;

//////////////////////////////////////////////////

	public function add($id,$quantity=1) {

		if(!is_numeric($quantity)) {
			$quantity = 1;
		}

		$quantity = abs($quantity);

		if($quantity > $this->maxQuantity) {
			$quantity = $this->maxQuantity;
		}

		if($quantity == 0) {
			$this->remove($id);
			return;
		}

		$product = $this->controller->ZipData->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'ZipData.id' => $id
			)
		));
		//mail('ehask71@gmail.com','Product',print_r($product,1));
		if(empty($product)) {
			return false;
		}

		$data['product_id'] = $product['ZipData']['id'];
		$data['name'] = $product['ZipData']['county'].' '.$product['ZipData']['state'];
		$data['price'] = $product['ZipData']['price'];
		$data['subtotal'] = sprintf('%01.2f', $product['ZipData']['price'] * $quantity);
		$data['Product'] = $product['ZipData'];

                $this->Session->write('Shop.OrderItem.' . $id, $data);

		$this->Session->write('Shop.Order.shop', 1);

		$this->Cart = ClassRegistry::init('Cart');

		$cartdata['Cart']['session_id'] = $this->Session->id();
		$cartdata['Cart']['product_id'] = $product['ZipData']['id'];
		$cartdata['Cart']['name'] = $product['ZipData']['county'].' '.$product['ZipData']['state'];
		$cartdata['Cart']['price'] = $product['ZipData']['price'];
                
		$cartdata['Cart']['subtotal'] = sprintf('%01.2f', $product['ZipData']['price'] * $quantity);

		$existing = $this->Cart->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'Cart.session_id' => $this->Session->id(),
				'Cart.product_id' => $product['ZipData']['id'],
			)
		));
		if($existing) {
			$cartdata['Cart']['id'] = @$existing['Cart']['id'];
		} else {
			$this->Cart->create();
		}
		$this->Cart->save($cartdata, false);

		$this->cart();

		return $product;
	}

//////////////////////////////////////////////////

	public function remove($id) {
		if($this->Session->check('Shop.OrderItem.' . $id)) {
			$product = $this->Session->read('Shop.OrderItem.' . $id);
			$this->Session->delete('Shop.OrderItem.' . $id);

			ClassRegistry::init('Cart')->deleteAll(
				array(
					'Cart.session_id' => $this->Session->id(),
					'Cart.product_id' => $id,
				),
				false
			);

			$this->cart();
			return $product;
		}
		return false;
	}

//////////////////////////////////////////////////

	public function cart() {
		$shop = (array)$this->Session->read('Shop');
		$quantity = 0;
		$weight = 0;
		$subtotal = 0;
		$total = 0;
		$order_item_count = 0;

		if (count(@$shop['OrderItem']) > 0) {
			foreach ($shop['OrderItem'] as $item) {
				$quantity += 1;
				$subtotal += $item['subtotal'];
				$total += $item['subtotal'];
				$order_item_count++;
			}
			$d['order_item_count'] = $order_item_count;
			$d['subtotal'] = sprintf('%01.2f', $subtotal);
			$d['total'] = sprintf('%01.2f', $total);
			$this->Session->write('Shop.Order', $d + (array)@$shop['Order']);
			return true;
		}
		else {
			$d['quantity'] = 0;
			$d['subtotal'] = 0;
			$d['total'] = 0;
			$this->Session->write('Shop.Order', $d + (array)@$shop['Order']);
			return false;
		}
	}

//////////////////////////////////////////////////

	public function clear() {
		ClassRegistry::init('Cart')->deleteAll(array('Cart.session_id' => $this->Session->id()), false);
		$this->Session->delete('Shop');
	}

//////////////////////////////////////////////////

}