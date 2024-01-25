<?php
    class Pages {
        public function __construct()
        {
            echo 'Pages controller loaded';
        }

        public function index()
        {
            
        }

        public function about($id) 
        {
            echo 'This page is about us, hello. Your number is ' . $id;
        }
    }