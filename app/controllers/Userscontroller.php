<?php 
	/**
	 * summary
	 */
	class Userscontroller extends Controller
	{
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	    	$this->user_model=$this->model('User');
	        
	    }

	    public function login(){
	    	if($_SERVER['REQUEST_METHOD']=='POST'){

	    		$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

	    		$data = [
			          'email' => trim($_POST['email']),
			          'password' => trim($_POST['password']),
			          'email_err' => '',
			          'password_err' => '',
        				];

        		
        		//email
        		if(empty($data['email'])){
        			$data['email_err']='please enter your email';
        		}else{
        			if($this->user_model->findUserByEmail($data['email'])==false){
        				$data['email_err']='no user found';
        			}
        		}
        		//password
        		if(empty($data['password'])){
		          	$data['password_err'] = 'Please enter a password.';     
		        }elseif(strlen($data['password']) < 6){
		          	$data['password_err'] = 'Password must have atleast 6 characters.';
		        }

		        if(empty($data['email_err']) && empty($data['password_err'])){
		        	if($user=$this->user_model->login($data)){

		        		$_SESSION['user_id']=$user->id;
		        		$_SESSION['user_name']=$user->name;
		        		$_SESSION['user_email']=$user->email;

		        		header('location:'.URL.'postscontroller/dashboard');

		        	}else{
		        		$data['password_err']='Wrong password';
		        		$this->view('users/login',$data);
		        	}
		        }else{

		        	$this->view('users/login',$data);
		        }

				}else{
		    		$data = [
				         
				          'email' => '',
				          'password' => '',
				          'email_err' => '',
				          'password_err' => ''
	        				];
		    		$this->view('users/login',$data);

	    	}
	    }

	    public function logout(){
	    	if(isset($_SESSION['user_name']) && isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){

	    		unset($_SESSION['user_id']);
	    		unset($_SESSION['user_name']);
	    		unset($_SESSION['user_email']);

	    		header('location:'.URL);

	    	}else {
	    		die('you are not logged in');
	    	}
	    }

	    public function register(){
	    	
	    	if ($_SERVER['REQUEST_METHOD']=='POST'){
	    		$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	    		$data = [
			          'name' => trim($_POST['name']),
			          'email' => trim($_POST['email']),
			          'password' => trim($_POST['password']),
			          'confirm_password' => trim($_POST['confirm_password']),
			          'name_err' => '',
			          'email_err' => '',
			          'password_err' => '',
			          'confirm_password_err' => ''
        				];

        		if(empty($data['name'])){
        			$data['name_err']='please enter your name';
        		}
        		if(empty($data['email'])){
        			$data['email_err']='please enter your email';
        		}else{
        			if($this->user_model->findUserByEmail($data['email'])){
        				$data['email_err']='email already taken';
        			}
        		}
        		if(empty($data['password'])){
		          $data['password_err'] = 'Please enter a password.';     
		        }elseif(strlen($data['password']) < 6){
		          $data['password_err'] = 'Password must have atleast 6 characters.';
		        }else{
			      	if(empty($data['confirm_password'])){
			          $data['confirm_password_err'] = 'Please confirm password.';     
			        }else{
			            if($data['password'] != $data['confirm_password']){
			                $data['confirm_password_err'] = 'Password do not match.';
			            }
			        }
		        }
		        

		        if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
		        	$this->user_model->register($data);
		        	$_SESSION['register_msg']='registration successfull. now sing in';
		        	$this->view('users/login');

		        }else{
		        	$this->view('users/register',$data);
		        }
					    		
	    	}else {
	    		$data = [
			          'name' => '',
			          'email' => '',
			          'password' => '',
			          'confirm_password' => '',
			          'name_err' => '',
			          'email_err' => '',
			          'password_err' => '',
			          'confirm_password_err' => ''
        				];
	    		$this->view('users/register',$data);
	    	}
	    }

	    public function index(){

	    	$this->view('users/index');
	    }

	    public function edit(){

	    	if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_SESSION['user_email'])){
	    		$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	    		$data = [
			          'name' => trim($_POST['name']),
			          'email' => trim($_POST['email']),
			          'password' => trim($_POST['password']),
			          'confirm_password' => trim($_POST['confirm_password']),
			          'name_err' => '',
			          'email_err' => '',
			          'password_err' => '',
			          'confirm_password_err' => ''
        				];

        		if(empty($data['name'])){
        			$data['name_err']='please enter your name';
        		}
        		
        		if(empty($data['password'])){
		          $data['password_err'] = 'Please enter a password.';     
		        }elseif(strlen($data['password']) < 6){
		          $data['password_err'] = 'Password must have atleast 6 characters.';
		        }else{
			      	if(empty($data['confirm_password'])){
			          $data['confirm_password_err'] = 'Please confirm password.';     
			        }else{
			            if($data['password'] != $data['confirm_password']){
			                $data['confirm_password_err'] = 'Password do not match.';
			            }
			        }
		        }
		        

		        if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
		        	if($this->user_model->update($data)){

		        	    $_SESSION['user_name']=$data['name'];
		        	    $_SESSION['user_email']=$data['email'];

		        	    $_SESSION['update_msg']='update successful';
		        	    $this->view('users/index');
		        		
		        	}else{
		        		die('something went wrong');
		        	}
		        	

		        }else{
		        	$this->view('users/edit',$data);
		        }
					    		
	    	}else {

	    		if ($user=$this->user_model->findUserByEmail($_SESSION['user_email'])) {
	    			$data = [
			          'name' => $user->name,
			          'email' => $user->email,
			          'password' => '',
			          'confirm_password' => '',
			          'name_err' => '',
			          'email_err' => '',
			          'password_err' => '',
			          'confirm_password_err' => '',
        				];
        			$this->view('users/edit',$data)	;
	    		}else {
	    			die('retrieve failed');
	    		}
	    	}
	    }


	}

 ?>