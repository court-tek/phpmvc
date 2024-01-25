<?php
    class Pages {
        public function __construct()
        {
            // echo 'Pages controller loaded';
        }

        public function index()
        {
            echo 'This is the index page';
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

        public function about($id) 
        {
            echo 'This page is about us, hello. Your number is ' . $id;
        }
    }