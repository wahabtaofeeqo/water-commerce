<?php defined("BASEPATH") OR exit("No Direct Script access allowed");

/**
 * 
 */
class Admin extends CI_Controller {
	
	public function index() {

		if (!$this->session->has_userdata('adminUsername')) {
			redirect('../../admin-login', 'location');
		}
		else {

			$this->load->model('homeModel');

			$data['page'] = 'home';
			$data['products'] = $this->homeModel->getProducts();
			$data['testimonials'] = $this->homeModel->getTestimonials();
			$data['contacts'] = $this->homeModel->all();
			$data['newsletter'] = $this->homeModel->subscribers();

			$this->load->view('admin/index', $data);
		}
	}

	public function orders() {

		$this->load->model('homeModel');

		$data['page'] = 'orders';
		$data['orderedProducts'] = $this->homeModel->getOrders();
		$this->load->view('admin/index', $data);
	}

	public function contacts() {

		$this->load->model('homeModel');

		$data['page'] = 'contact';
		$data['contacts'] = $this->homeModel->all();
		$this->load->view('admin/index', $data);
	}

	public function testimonials() {

		$this->load->model('homeModel');

		$data['testimonials'] = $this->homeModel->getTestimonials();
		$data['page'] = 'testimonials';
		$this->load->view('admin/index', $data);
	}

	public function newsletters() {

		$this->load->model('homeModel');

		$data['page'] = 'newsletter';
		$data['newsletter'] = $this->homeModel->subscribers();
		$this->load->view('admin/index', $data);
	}

	public function products() {

		$this->load->model('homeModel');

		if(!isset($_POST['name']) && !isset($_POST['price'])) {
			$data['page'] = 'products';
			$data['products'] = $this->homeModel->getProducts();
			$this->load->view('admin/index', $data);
		}
		else {

			$name = $this->input->post('name', TRUE);
			$price = $this->input->post('price', TRUE);
			$cat = $this->input->post('category', TRUE);
			$company = $this->input->post('company', TRUE);
			$desc = $this->input->post('desc', TRUE);
			$logo = 'default.jpg';

			$response = $this->uploadFile('logo');

			if (!$response['error']) {
				$logo = $response['data']['file_name'];
			}

			$data = array(
				'name' => $name,
				'price' => $price,
				'category' => $cat,
				'company' => $company,
				'description' => $desc,
				'logo' => $logo);

			if ($this->homeModel->addProduct($data)) {
				
				$data['page'] = 'products';
				$data['products'] = $this->homeModel->getProducts();
				$data['error'] = FALSE;
				$data['message'] = "Product Added Successfully";
				$this->load->view('admin/index', $data);
			}
			else {

				$data['page'] = 'products';
				$data['products'] = $this->homeModel->getProducts();
				$data['error'] = TRUE;
				$data['errorMessage'] = "Error Occured While Adding Product. Try Again";
				$this->load->view('admin/index', $data);
			}
		}
	}


	public function uploadFile($filename) {

		$response = array('error' => FALSE);

		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($filename)) {

			$response['error'] = TRUE;
			$response['errorMessage'] = $this->upload->display_errors();
		}
		else {
			$response['error'] = FALSE;
			$response['data'] = $this->upload->data();
		}

		return $response;
	}


	public function login() {

		if (!isset($_POST['username']) && !isset($_POST['password'])) {
			$this->load->view('admin/login');
		}
		else {

			$username = $this->input->post("username", TRUE);
			$password = $this->input->post("password", TRUE);

			$response = array('error' => FALSE);

			if ($username != null && $password != null) {

				$this->load->model('homeModel');

				if ($this->homeModel->adminLogin($username, $password)) {
					$this->session->set_userdata('adminUsername', $username);
					$response['message'] = "Login Successfully. Rediecting...";
				}
				else {
					$response['error'] = TRUE;
					$response['errorMessage'] = "Username OR Password Not Correct.";
				}
			}

			echo json_encode($response);
		}
	}

	public function admins() {

		$this->load->model('homeModel', 'dash');

		if (!isset($_POST['email']) && !isset($_POST['phone'])) {
			$data['page'] = 'admin';
			$data['admins'] = $this->dash->admins();
			$this->load->view('admin/index', $data);
		}
		else {

			$response = array('error' => FALSE);

			$fname = $this->input->post('firstname', TRUE);
			$lname = $this->input->post('lastname', TRUE);
			$email = $this->input->post('email', TRUE);
			$phone = $this->input->post('phone', TRUE);
			$password = $this->input->post('password', TRUE);

			if ($fname != null && $lname != null) {

				$check = $this->dash->checkAdmin($email);

				if ($check) {
					
					$response['error'] = TRUE;
					$response['errorMessage'] = "Email Already Exist!";
				}
				else {

					$data = array (
					'firstname' => $fname,
					'lastname' => $lname,
					'email' => $email,
					'phone' => $phone,
					'password' => md5($password));

					if ($this->dash->addAdmin($data)) {
						
						$response['error'] = FALSE;
						$response['message'] = "Admin Added Successfully";
					}
					else {

						$response['error'] = TRUE;
						$response['errorMessage'] = "Database Error! Could Not Add Admin";
					}
				}
			}

			$data['page'] = 'admin';
			$data['admins'] = $this->dash->admins();
			$this->load->view('index', $data);
		}
	}

	public function logout() {
		unset($_SESSION['adminUsername']);
		redirect('../../admin');
	}
}