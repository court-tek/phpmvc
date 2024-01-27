<?php
    class Pages extends Controller 
    {
        public function __construct()
        {
        }

        public function index()
        {
            $data =[
                // To add emojies control + cmd + space
                'title' => 'PHP 🐘 mvc',
            ];

            $this->view('pages/welcome', $data);
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