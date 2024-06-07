<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require('../Services/Services.php');

class Content extends Services {
    public $response;
    public function searchContent() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the title from the request body
            $requestData = json_decode(file_get_contents('php://input'), true);
            $title = isset($requestData['title']) ? $requestData['title'] : null;

            // Check if title is provided
            if ($title !== null) {
                // Call checkData method with the provided title
                $content = $this->checkData($title);

                if ($content['status'] == 'success') {
                    $this->response = [
                        "status" => "success",
                        "content" => $content['content']
                    ];
                    echo json_encode($this->response); // Send the response to the frontend
                } else {
                    $this->response = [
                        "status" => "error",
                        "content" => $content['content'],
                    ];
                    echo json_encode($this->response); // Send the response to the frontend
                }
            } else {
                // Title is not provided in the request
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => 'Title is required']);
            }
        } else {
            http_response_code(405);
            echo json_encode(['status' => 'error', 'message' => 'Method Not Allowed']);
        }
    }
}

$init = new Content();
$init->searchContent();
