<?php
	include_once 'Session.php';
	include 'Database.php';
class User
{	
	private $db;
	public function __construct()
	{
		$this->db=new Database();
	}
	public function userRegistration($data)
	{
		$firstname		= $data['firstname'];
		$lastname		= $data['lastname'];
		$phone			= $data['phone'];
		$skill			= $data['skill'];
		$email			= $data['email'];
		$password		= md5($data['password']);
		$gender			= $data['gender'];

		$chk_email	=$this->emailcheck($email);

		if ($firstname =="" or $lastname =="" or $phone ==""or $skill =="" or $email =="" or $password =="" or $gender =="") {
			$msg ="<div class='alert alert-danger'><strong>Error !!</strong>field must not be empty !</div>";
			return $msg;
		}
		if (strlen($firstname)< 3) {
			$msg ="<div class='alert alert-danger'><strong>Error !!</strong>username field is too short !</div>";
			return $msg;
		}
		elseif (preg_match('/[^a-z0-9_-]+/i',$firstname)) {
			$msg = "<div class='alert alert-danger'><strong>Error!</strong>The username is invalid!</div>";
			return $msg;
		}
		if (filter_var($email,FILTER_VALIDATE_EMAIL)=== false) {
			$msg = "<div class='alert alert-danger'><strong>Error!</strong>The email is invalid!</div>";
			return $msg;
		}
		if ($chk_email == true) {
			$msg = "<div class='alert alert-danger'><strong>Error!</strong>The email is already exit!</div>";
			return $msg;
		}

		$sql= "INSERT INTO user_list(firstname,lastname,phone,skill,email,password,gender) VALUES( :firstname, :lastname, :phone, :skill, :email, :password, :gender)";
		$query	=	$this->db->pdo->prepare($sql);
		$query->bindValue(':firstname',$firstname);
		$query->bindValue(':lastname',$lastname);
		$query->bindValue(':phone',$phone);
		$query->bindValue(':skill',$skill);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$password);
		$query->bindValue(':gender',$gender);
		$result = $query->execute();
		if ($result) {
			$msg = "<div class='alert alert-success'><strong>Success !</strong>You register sucessfully !</div>";
			return $msg;
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error!</strong>sorry,registation failed !</div>";
			return $msg;
		}


	}
	public function emailcheck($email){
		$sql	=	"SELECT email FROM user_list WHERE email= :email";
		$query	=	$this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->execute();
		if ($query->rowCount()>0) {
			return true;
		}else{
			return false;
		}
	}

	public function getLoginUser($email,$password)
	{
		$sql	=	"SELECT * FROM user_list WHERE email= :email AND password= :password LIMIT 1";
		$query	=	$this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$password);
		$query->execute();
		$result = $query->fetch(PDO:: FETCH_OBJ);
		return $result;
	}

	public function userLogin($data)
	{
		$email		= $data['email'];
		$password	= md5($data['password']);

		$chk_email	=$this->emailcheck($email);

		if ($email =="" or $password =="") {
			$msg ="<div class='alert alert-danger'><strong>Error !!</strong>field must not be empty !</div>";
			return $msg;
		}
		if (filter_var($email,FILTER_VALIDATE_EMAIL)=== false) {
			$msg = "<div class='alert alert-danger'><strong>Error!</strong>The email is invalid!</div>";
			return $msg;
		}
		if ($chk_email == false) {
			$msg = "<div class='alert alert-danger'><strong>Error!</strong>The email is not exit!</div>";
			return $msg;
		}

		$result= $this->getLoginUser($email,$password);
		if ($result) {
			
			Session::init();
			Session::set("login",true);
			Session::set("id",$result->id);
			Session::set("firstname",$result->firstname);
			Session::set("loginmsg","<div class='alert alert-success'><strong>Success !</strong>You are login !</div>");

			if ($email=="avi96bd@yahoo.com" || $email=="shadin123@gmail.com") {
				header("Location: Itempage.php");
			}
			else{
				header("Location: home.php");
			}
			

		}else{
			$msg = "<div class='alert alert-danger'><strong>Error!</strong>data not found !</div>";
			return $msg;
		}
	}
	public function getorderlist()
	{
		$sql	=	"SELECT order_table.order_id,order_table.Customer_Id,order_table.Address,order_table.Contact_Number,order_table.Cake_id,cake.Cake_Price,order_table.Order_date FROM order_table,cake WHERE NOT EXISTS(SELECT report.Order_Id FROM report WHERE order_table.order_id=report.Order_Id) AND order_table.Cake_id=cake.Cake_id ORDER BY order_table.order_id ASC";
		$query	=	$this->db->pdo->prepare($sql);
		$query->execute();
		$result=$query->fetchAll();
		return $result;
	}
	public function getcustomerlist()
	{
		$sql	=	"SELECT * FROM user_list LIMIT 2,100 ";
		$query	=	$this->db->pdo->prepare($sql);
		$query->execute();
		$result=$query->fetchAll();
		return $result;
	}

	public function getcustomerorderlist()
	{
		$id= Session::get("id");
		$sql	=	"SELECT order_table.Order_date,cake.Cake_Name,cake.Cake_Price FROM order_table,cake WHERE order_table.Cake_id=cake.Cake_id AND order_table.Customer_Id= $id ";
		$query	=	$this->db->pdo->prepare($sql);
		$query->execute();
		$result=$query->fetchAll();
		return $result;
	}

	public function userPayment($data)
	{
		$card_number		= $data['card_number'];
		$course_id			= $data['course_id'];
		$user_id			= $data['user_id'];
		$amount				= $data['amount'];


		if ($card_number =="" or $course_id =="" or $user_id ==""or $amount =="") {
			$msg ="<div class='alert alert-danger'><strong>Error !!</strong>field must not be empty !</div>";
			return $msg;
		}
				
		$sql= "INSERT INTO course_payment(course_id,user_id,card_number,amount) VALUES( :course_id, :user_id, :card_number, :amount)";
		$query	=	$this->db->pdo->prepare($sql);
		$query->bindValue(':card_number',$card_number);
		$query->bindValue(':course_id',$course_id);
		$query->bindValue(':user_id',$user_id);
		$query->bindValue(':amount',$amount);
		$result = $query->execute();
		if ($result) {
			$msg = "<div class='alert alert-success'><strong>Success !</strong>You payment sucessfully !</div>";
			return $msg;
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error!</strong>sorry,payment failed !</div>";
			return $msg;
		}
	}
	
}
?>