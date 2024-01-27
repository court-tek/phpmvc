<?php
    class Pages extends Controller 
    {
        public function __construct()
        {
            $this->postModel = $this->model('Post');
        }

        public function index()
        {
            $this->view('pages/welcome', ['title' => 'Welcome']);
            // echo 'This is the index page';
        }

        public function new()
        {
           
        }

        public function show()
        {
            echo 'This is the show page';
        }

        public function edit()
        {
            echo 'This is the edit page';
        }

        public function about() 
        {
            echo 'This page is about us, hello. Your number is ';
        }
    }