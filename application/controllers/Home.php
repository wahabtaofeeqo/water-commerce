<?php defined("BASEPATH") OR exit("No direct script access allowed");

/**
 * 
 */
class Home extends CI_Controller {
	
	public function index() {

		$this->load->model('homeModel');

		$data['tableWater'] = $this->homeModel->getProducts('table water');
		$data['pureWater'] = $this->homeModel->getProducts('pure water');
		$data['dispenserWater'] = $this->homeModel->getProducts('dispenser water');
		$data['products'] = $this->homeModel->getProducts();
		$data['testimonials'] = $this->homeModel->getTestimonials();
		$this->load->view('index', $data);
	}

	public function details($id = 0) {

		$this->load->model('homeModel');

		if ($id) {
			$product = $this->homeModel->getProduct($id);

			if ($product != null) {
				
				$data['product'] = $product;
				$data['similars'] = $this->homeModel->getSimilarProducts($product->category, $product->id);

				$this->load->view('details', $data);
			}
			else {
				echo "Product Not Found";
			}
		}
		else {
			$this->load->view('details', $data);
		}
	}

	public function add() {

		$id = $this->input->post('id', TRUE);
		$name = $this->input->post('name', TRUE);
		$price = $this->input->post('price', TRUE);
		$quantity = $this->input->post('q', TRUE);

		$item = array(
			'id' => $id,
			'name' => $name,
			'price' => $price,
			'qty' => $quantity);

		$this->cart->insert($item);

		echo json_encode(array('error' => FALSE));
	}

	public function checkout() {
		
		if (!$this->session->has_userdata('username')) {
			
			$this->session->set_userdata('shopping', TRUE);
			redirect('../../login');
		}
		else {

			$this->load->model('homeModel');

			$data['products'] = $this->homeModel->getProducts();
			$this->load->view('checkout', $data);
		}
	}

	public function contact() {


		$email = $this->input->post('email', TRUE);
		$message = $this->input->post('message', TRUE);
		$sub = $this->input->post('subject', TRUE);
		$name = $this->input->post('name', TRUE);

		$response = array();

		if ($email != null && $message != null) {

			$this->load->model('homeModel');

			$data = array(
				'name' => $name,
				'email' => $email,
				'subject' => $sub,
				'message' => $message);

			if ($this->homeModel->contact($data)) {
				
				$response['error'] = FALSE;
				$response['message'] = "We Have Received You Message. We will Get Back soon";

				$this->load->view('includes/header');
				$this->load->view('contact', $response);
			}
			else {

				$response['error'] = TRUE;
				$response['errorMessage'] = "Please Try Again!";
				$this->load->view('includes/header');
				$this->load->view('contact', $response);
			}
		}
		else {

			$this->load->view('includes/header');
			$this->load->view('contact');
		}
	}
	
	public function login() {

		$this->load->model("homeModel");
		$response = array("error" => false);

		if (!isset($_POST['username']) && !isset($_POST['password'])) {

			$this->load->view('login');
		}
		else {

			$username = $this->input->post("username", TRUE);
			$password = $this->input->post("password", TRUE);

			$user = $this->homeModel->getUser($username, $password);
			if ($user) {
				
				$this->session->set_userdata('username', $username);
				
				if ($this->session->has_userdata("shopping")) {
					$this->load->view('checkout');
				}
				else {
					$this->load->view('index');
				}
			}
			else {

				$response['error'] = TRUE;
				$response['errorMessage'] = "Username OR Password Not Correct.";
				$this->load->view('login', $response);
			}
		}
	}


	public function register() {

		// Coming from a link
		if (!isset($_POST['email']) && !isset($_POST['phone'])) {
			$this->load->view('register');
		}
		else {

			$response = array('error' => FALSE);

			$this->load->model("homeModel");
			$this->load->library("form_validation");

			$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

			if ($this->form_validation->run() === FALSE) {

				$response['error'] = TRUE;
				$response['errorMessage'] = "Data Validation Error. Use Valid Data";

				$this->load->view('register', $response);
			}
			else {

				$firstname = $this->input->post("firstname", TRUE);
				$lastname = $this->input->post('lastname', TRUE);
				$phone = $this->input->post('phone', TRUE);
				$password = $this->input->post('password', TRUE);
				$username = $this->input->post('email', TRUE);

				if (!$this->homeModel->hasEmail($username)) {
					
					$data = array(
						'firstname' => $firstname,
						'lastname' => $lastname,
						'phone' => $phone,
						'password' => md5($password),
						'email' => $username);

					$user = $this->homeModel->addUser($data);

					if ($user) {
					
						$response['error'] = FALSE;
						$response['message'] = "Account Successfully Created";

						$this->login();
					}
					else {

						$response['error'] = TRUE;
						$response['errorMessage'] = "Database error. Try again";

						$this->load->view('register', $response);
					}
				}
				else {

					$response['error'] = TRUE;
					$response['errorMessage'] = 'User Already Exist With This Email';

					$this->load->view('register', $response);
				}
			}
		}
	}


	public function order() {

		$this->load->model('homeModel');

		$email = $this->input->post('email', TRUE);
		$phone = $this->input->post('phone', TRUE);
		$location = $this->input->post('address', TRUE);
		$amount = $this->input->post('amount', TRUE);

		if ($email != null && $amount != null) {
			
			$userid = $this->homeModel->getUserId($email);

			$data = array(
					'customer_id' => $userid,
					'status' => 'pending');

			$orderID = $this->homeModel->placeOrder($data);

			foreach ($this->cart->contents() as $key => $cart) {
				
				$orderProduct = array(
							'order_id' => $orderID,
							'product_id' => $cart['id'],
							'quantity' => $cart['qty'],
							'location' => $location);

				// Add The Order Details
				$this->homeModel->addOrder($orderProduct);
			}

			$data = array(
				'customer_id' => $userid,
				'amount' => $amount,
				'order_id' => $orderID,
				'status' => 0);

			$this->homeModel->addPayment($data);

			$this->session->set_userdata('location', $location);
			$this->session->set_userdata('orderID', $orderID);

			$this->makePayment($email, $amount);
		}
	}

	public function completeOrder() {

		$this->load->model('homeModel');

		$orderID = $this->session->orderID;
		$email = $this->session->username;
		$userid = $this->homeModel->getUserId($email);

		$data = array (
			'status' => 1);
		$this->homeModel->updatePayment($data, $orderID, $userid);

		$this->cart->destroy();

		$this->index();
	}

	public function makePayment($email, $amount) {
		
		$curl = curl_init();


		$amount = $amount * 100;  //the amount in kobo. This value is actually NGN 300

		$ref = rand(1000000, 9999999999);
	    $callback_url = 'ritabestxpression.com.ng/water';
	    $postdata =  array('email' => $email, 'amount' => $amount, "reference" => $ref, "callback_url" => $callback_url);

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => json_encode($postdata),
			CURLOPT_HTTPHEADER => [
			    "authorization: Bearer sk_test_78e8f2bb795ec853123bdb2f9fec2d04a139c25e", //replace this with your own test key
			    "content-type: application/json",
			    "cache-control: no-cache"
			  ]
			)
		);

		$responseAPI = curl_exec($curl);
		$err = curl_error($curl);

		if($err) {
			  // there was an error contacting the Paystack API
			  // die('Curl returned error: ' . $err);

			$response['error'] = TRUE;
			$response['errorMessage'] = "CURLReturned Error: " . $err;

			echo "CURLReturned Error: " . $err;
		}
		else {

			$tranx = json_decode($responseAPI, true);

			if(!$tranx['status']) {
				// there was an error from the API

				$response['error'] = TRUE;
				$response['errorMessage'] = 'API returned error: ' . $tranx['message'];

				echo 'API returned error: ' . $tranx['message'];
			}

			// comment out this line if you want to redirect the user to the payment page
			//print_r($tranx);

			$response['error'] = FALSE;
			$response['url'] = $tranx['data']['authorization_url'];

			header("location: " . $tranx['data']['authorization_url']);
		}
	}

	public function logout() {

		unset($_SESSION['username']);
		$this->index();
	}

	public function newsletter() {

		$response = array('error' => FALSE);
		$email = $this->input->post('email');

		if ($email != null) {

			$this->load->model('homeModel');

			if ($this->homeModel->hasSubscribe($email)) {
				
				$response['error'] = TRUE;
				$response['errorMessage'] = "Email Already Exist";
			}
			else {

				$this->homeModel->subscribe(array('email' => $email));

				$response['error'] = FALSE;
				$response['message'] = "Successfully Done.";
			}
		}
		else {

			$response['error'] = TRUE;
			$response['errorMessage'] = "Email is Required";
		}

		echo json_encode($response);
	}
}