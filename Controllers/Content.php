<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");

    require('../Services/Services.php');

    class Content extends Services {
        public $response;
        public function searchContent() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               
               $title = $_POST['title'];

               $content = $this->checkData($title);
               if ($content['status'] == 'success') {
                   $this->response = [
                       "status" => "succces",
                       "content"=> $content['content']
                   ];
                   print_r($this->response);
               } else {
                   $this->response = [
                       "status" => "error",
                       "content" => $content['content'],
                   ];
                   print_r($this->response);

               }
           
           } else {
       
               http_response_code(405);
               echo json_encode(['status' => 'error', 'message' => 'Method Not Allowed']);
           }
        }
            
    }

    $init = new Content();
    if (isset($_POST['submit'])) {
        $init->searchContent();
    }