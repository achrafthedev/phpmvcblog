<?php 

	class Postscontroller extends Controller{

		private $post_model;

		public function __construct(){
			$this->post_model=$this->model('Post');
		}

		public function index(){
			$posts=$this->post_model->getAllPosts();
			$this->view('posts/index',$posts);
		}

		public function createPost(){
			
			if ($_SERVER['REQUEST_METHOD']=='POST') {
				$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$data=[
					'title'=> trim($_POST['title']),
					'body'=> trim($_POST['body']),
					'title_err'=>'',
					'body_err'=>''
				];

				if(empty($data['title'])){
					$data['title_err']='Insert the name of your post';
				}

				if( empty($data['body']) ){
					$data['body_err']='Your Post Body can\'t be empty';
				}

				if( empty($data['title_err']) && empty($data['body_err']) ){

					if ($this->post_model->create($data)) {
						$_SESSION['create_msg']='Post created';
						header('location:'.URL.'postscontroller/dashboard');
					}else {
						die('something went wrong');
					}

				}else {
					$_SESSION['title_err']=$data['title_err'];
					$_SESSION['body_err']=$data['body_err'];
					header('location:'.URL.'postscontroller/dashboard');
				}
				
			}else{
				die('something went wrong');
			}

		}

		public function postview($id){
			 $post=$this->post_model->getPostById($id);
			 $this->view('posts/postview',$post);
			
		}

		public function dashboard(){
			$id = $_SESSION['user_id'];
			$posts=$this->post_model->getPostsByUserId($id);
			$this->view('posts/dashboard',$posts);
		}

		public function postedit($id){

			if ($_SERVER['REQUEST_METHOD']=='POST') {
				$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$data=[
					'post_id' =>$id,
					'title'=> $_POST['title'],
					'body'=> $_POST['body'],
					'title_err'=>'',
					'body_err'=>''
				];
				//validating title
				if(empty($data['title'])){
					$data['title_err']='Insert the name of your post';
				}
				//validating body
				if( empty($data['body']) ){
					$data['body_err']='Your Post Body can\'t be empty';
				}
				//checking errors
				if( empty($data['title_err']) && empty($data['body_err']) ){

					//passing data to model
					if ($this->post_model->update($data)) {
						//setting update msg
						$_SESSION['update_msg']='Post created';
						header('location:'.URL.'postscontroller/dashboard');
					}else {
						die('something went wrong');
					}
				

				}else {
					
					header('location:'.URL.'postscontroller/edit',$data);
				}
				
			}else{
				$post=$this->post_model->getPostById($id);
				$data=[
					'post_id' =>$id,
					'title'=> $post->title,
					'body'=> $post->body,
					'title_err'=>'',
					'body_err'=>''
				];
				$this->view('posts/edit',$data);
				
			}

		}

		public function postdelete($id){
			if ($this->post_model->deletePostById($id)) {
				$_SESSION['delete_msg']='Post deleted Successfully';
				header('location:'.URL.'postscontroller/dashboard');
			}else {
				die('Something went wrong');
			}
			
		}
	}

 ?>