<?php defined("BASEPATH") OR exit("No direct script access allowed");

/**
 * 
 */
class HomeModel extends CI_Model {

	public function getProducts($clause = null) {

		if ($clause != null) {
			return $this->db->get_where('products', array('category' => $clause))->result();
		}
		else {
			return $this->db->get('products')->result();
		}
	}


	public function getSimilarProducts($category, $id) {

		$sql = "SELECT * FROM products WHERE category = '$category' AND id != $id";
		$query = $this->db->query($sql);

		return $query->result();
	}


	public function all() {
		return $this->db->get('messages')->result();
	}

	public function subscribe($data) {
		$this->db->insert('newsletter', $data);

		if ($this->db->insert_id() > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	public function checkEmail($email) {
		$this->db->select('id');
		$query = $this->db->get_where('newsletter', array('email' => $email));

		$id = $query->row()->id;

		if ($id) {
			return true;
		}
		else {
			return false;
		}
	}

	public function insert($data) {
		$this->db->insert($this->table, $data);

		if ($this->db->insert_id() > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	public function getTestimonials() {

		$this->db->order_by('created', 'DESC');
		$query = $this->db->get('testimonials');
		
		return $query->result();
	}

	public function testimonials() {
		return $this->db->get('testimonials')->result();
	}

	public function subscribers() {
		return $this->db->get('newsletter')->result();
	}

	public function add($data) {
		$this->db->insert('messages', $data);

		return $this->db->insert_id() > 0;
	}

	public function getProduct($id) {
		return $this->db->get_where('products', array('id' => $id))->row();
	}

	public function getOrders($status = null) {

		$sql = "SELECT orders.*, customers.firstname, customers.phone, order_products.quantity, order_products.location, payments.status AS pstatus, products.name FROM orders LEFT JOIN customers ON (orders.customer_id = customers.id) LEFT JOIN order_products ON (orders.id = order_products.order_id) LEFT JOIN products ON (order_products.product_id = products.id) LEFT JOIN payments ON (orders.id = payments.order_id)";

		if ($status != null) {
			
			$sql = $sql . " WHERE orders.status = '$status'";
		}

		return $this->db->query($sql)->result();
	}

	public function addAdmin($data) {

		$this->db->insert('admins', $data);

		if ($this->db->affected_rows()) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function admins() {
		return $this->db->get('admins')->result();
	}

	public function checkAdmin($email) {

		$query = $this->db->get_where('admins', array('email' => $email));

		if ($query->num_rows() > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	public function adminLogin($email, $password) {

		$query = $this->db->get_where('admins', array('email' => $email, 'password' => md5($password)));

		if ($query->num_rows() > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	public function getUser($username, $password) {

		$query = $this->db->get_where("customers", array("email" => $username, "password" => md5($password)));

		return $query->row();
	}

	public function getUserWithEmail($username) {

		$query = $this->db->get_where("customers", array("username" => $username));

		return $query->row();
	}

	public function getUserId($email) {

		$this->db->select("id");
		$query = $this->db->get_where("customers", array("email" => $email));

		$id = 0;

		if ($query->num_rows() > 0) {
			$id = $query->row()->id;
		}

		return $id;
	}


	public function getUserWithID($userid) {

		$query = $this->db->get_where("customers", array("id" => $userid));

		if ($query->num_rows() > 0) {
			return $query->row();
		}
		else {
			return false;
		}
	}

	public function hasEmail($username) {

		$this->db->select('id');
		$query = $this->db->get_where('customers', array('email' => $username));

		if ($query->num_rows() > 0)
			return true;
		else
			return false;
	}

	public function addUser($data) {

		$this->db->insert('customers', $data);

		$id = $this->db->insert_id();

		if ($id > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	public function placeOrder($data) {

		$this->db->insert('orders', $data);
		return $this->db->insert_id();
	}

	public function addOrder($data) {

		$this->db->insert('order_products', $data);
		return $this->db->insert_id();
	}

	public function addPayment($data) {

		$this->db->insert('payments', $data);
		return $this->db->insert_id();
	}

	public function updatePayment($data, $orderid, $userid) {

		$this->db->update('payments', $data, array('order_id' => $orderid, 'customer_id' => $userid));
		return $this->db->affected_rows();
	}

	public function contact($data) {

		$this->db->insert('contacts', $data);
		return $this->db->insert_id();
	}


	public function hasSubscribe($username) {

		$query = $this->db->get_where('newsletter', array('email' => $username));

		if ($query->num_rows() > 0)
			return true;
		else
			return false;
	}


	public function addProduct($data) {
		$this->db->insert('products', $data);

		if ($this->db->affected_rows()) {
			return true;
		}
		else {
			return false;
		}
	}

	public function updateProduct($data, $id) {
		$this->db->update('products', $data, array('id' => $id));

		if ($this->db->affected_rows()) {
			return true;
		}
		else {
			return false;
		}
	}

	public function deleteProduct($id) {

		$this->db->delete('products', array('id' => $id));

		if ($this->db->affected_rows()) {
			return true;
		}
		else {
			return false;
		}
	}
}