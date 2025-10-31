<?php 
	
	class Pagescontroller extends Controller{

		public function __construct(){

		}


		public function index(){
			$data=[
			'message'=>'Projet W2 PHP MVC',
			];
			$this->view('pages/index',$data);
		}

		public function about(){
			$data=[
			'title'=>'Achraf CHARDOUDI/Issam Loucif',
			'message'=>'hi It\'s a backend project. the project has been created with core php with MVC pattern along with Bootstrap. the purpose of this project was to implement PHP in professional and secure way using MVC.',
			];
			$this->view('pages/about',$data);
		}

	}
 ?>