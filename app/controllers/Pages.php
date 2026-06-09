<?php
class Pages extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home Page',
            'message' => 'Welcome to PHP MVC Blog! Share your thoughts with the world.'
        ];

        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us',
            'message' => 'This is a modern custom PHP MVC blog application developed with pure PHP and object-oriented principles, running inside a secure Docker container environment.'
        ];
        $this->view('pages/about', $data);
    }
}
