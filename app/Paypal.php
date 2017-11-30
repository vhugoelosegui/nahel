<?php

namespace App;


class PayPal
{
	private $_apiContext;
	private $shopping_cart;
	private $_ClientId ="AS1qKLjtgHSM-jumi2QqPIv_pvAPXyM6O2r0kdvPUzLTcD7T8dWMJ7eOCRT1PoSNJvLgeQeDN087cU8X";
	private $_ClientSecret ="EEniPVfp59s7v_CtOI2DEY3ZZwhKRUeB5SyLtUo2lAOyalASN8Ces_WhLBnTXmE3grTl3M6IWWpuOD0Q";

	public function __construct($shopping_cart)
	{
		$this->_apiContext = \PaypalPayment::ApiContext($this->_ClientId,$this->_ClientSecret);

		$config = config("paypal_payment");
		$flatConfig = array_dot($config);

		$this->_apiContext->setConfig($flatConfig);

		$this->shopping_cart = $shopping_cart;
	}

	public function generate()
	{
		$payment = \PaypalPayment::payment()->setIntent("sale")
																				->setPayer($this->payer())
																				->setTransactions([$this->transaction()])
																				->setRedirectUrls($this->redirectURLs());

		try{
			$payment->create($this->_apiContext);
		} catch(\Exception $ex){
			dd($ex);
			exit(1);
		}
		return $payment;

	}

	public function payer()
	{ 
		// Returns payment´s info
		return \PaypalPayment::payer()
													->setPaymentMethod("paypal");

	}
	public function transaction()
	{
		// Returns transactio´s info
		return \PaypalPayment::transaction()
						->setAmount($this->amount())
						->setItemList($this->items())
						->setDescription("Tu compra en Nahel")
						->setInvoiceNumber(uniqid());

	}
	public function redirectURLs()
	{
	$baseURL = url("/");
	return \PaypalPayment::redirectUrls()
												->setReturnUrl("$baseURL/payments/store")
												->setCancelUrl("$baseURL/carrito");
	}



	public function items()
	{
		$items = [];

		$products = $this->shopping_cart->products()->get();

		foreach ($products as $product) {
			array_push($items, $product->paypalItem());
		}

		return \PaypalPayment::itemList()->setItems($items);
	}

	public function amount()
	{
		return \PaypalPayment::amount()->setCurrency("MXN")
													->setTotal($this->shopping_cart->total());
	}
	public function execute($paymentId,$payerId)
	{
		$payment = \PaypalPayment::getById($paymentId,$this->_apiContext);

		$execution = \PaypalPayment::PaymentExecution()
														->setPayerId($payerId);


		return $payment->execute($execution,$this->_apiContext);
	}

}
