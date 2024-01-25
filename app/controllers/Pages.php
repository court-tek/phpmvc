<?php
    class Pages extends Controller 
    {
        public function __construct()
        {
            // echo 'Pages controller loaded';
        }

        public function index()
        {
            $this->view('pages/welcome', ['title' => 'Welcome']);
            // echo 'This is the index page';
        }

        public function new()
        {
            echo 'This is the new page';
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