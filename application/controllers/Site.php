<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'libraries/paypal-php-sdk/autoload.php'); // require paypal files
//
use PayPal\Api\ItemList;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
class Site extends CI_Controller {
  public $_api_context;
	public function __construct() {
        parent::__construct();
				$this->load->model('Public_model');
				$this->load->model('Paypal_model');
				$this->config->load('paypal');
				$this->_api_context = new \PayPal\Rest\ApiContext(
				new \PayPal\Auth\OAuthTokenCredential(
				$this->config->item('client_id'), $this->config->item('secret')
				)
				);
    }
	public function index()
	{
		$data	=	$this->Public_model->all("course");
		$best_seller	=	$this->Public_model->best_seller("course");

		$this->load->view('public/header',array('rows' => $data,'best_seller' => $best_seller ));
		$this->load->view('public/index');
		$this->load->view('public/footer');
	}
	public function home()
	{
		$this->load->view('public/header');
		$this->load->view('public/index');
		$this->load->view('public/footer');
	}
	public function details($id)
	{
		$data = $this->Public_model->single_course_details($id);
		//echo "<pre>";print_r($data);die;
		$this->load->view('public/header', array('row' => $data));
		$this->load->view('public/details');
		$this->load->view('public/footer');
	}
	public function courses()
	{
		$this->load->view('public/header');
		$this->load->view('public/courses');
		$this->load->view('public/footer');
	}
	function create_payment_with_paypal()
	{
			$this->_api_context->setConfig($this->config->item('settings'));
			$payer['payment_method'] = 'paypal';
			$item1["name"] = $this->input->post('item_name');
			$item1["sku"] = $this->input->post('item_number');  // Similar to `item_number` in Classic API
			$item1["description"] = $this->input->post('item_description');
			$item1["currency"] ="USD";
			$item1["quantity"] =1;
			$item1["price"] = $this->input->post('item_price');
			$itemList = new ItemList();
			$itemList->setItems(array($item1));
			$details['tax'] = $this->input->post('details_tax');
			$details['subtotal'] = $this->input->post('details_subtotal');
			$amount['currency'] = "USD";
			$amount['total'] = $details['tax'] + $details['subtotal'];
			$amount['details'] = $details;
			$transaction['description'] ='Payment description';
			$transaction['amount'] = $amount;
			$transaction['invoice_number'] = uniqid();
			$transaction['item_list'] = $itemList;
			$baseUrl = base_url();
			$redirectUrls = new RedirectUrls();
			$redirectUrls->setReturnUrl($baseUrl."site/getPaymentStatus")
					->setCancelUrl($baseUrl."site/getPaymentStatus");
			$payment = new Payment();
			$payment->setIntent("sale")
					->setPayer($payer)
					->setRedirectUrls($redirectUrls)
					->setTransactions(array($transaction));

			try {
					$payment->create($this->_api_context);
			} catch (Exception $ex) {
					ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $ex);
					exit(1);
			}
			foreach($payment->getLinks() as $link) {
					if($link->getRel() == 'approval_url') {
							$redirect_url = $link->getHref();
							break;
					}
			}
			if(isset($redirect_url)) {
					redirect($redirect_url);
			}
			$this->session->set_flashdata('success_msg','Unknown error occurred');
			redirect('site/index');
	}
	public function getPaymentStatus()
	{
		redirect('site/success');
	}
	function success(){
		$this->load->view("public/header");
		$this->load->view("public/success");
		$this->load->view("public/footer");
	}
	function cancel(){
			$this->load->view("public/header");
			$this->load->view("public/cancel");
			$this->load->view("public/footer");

	}

}
