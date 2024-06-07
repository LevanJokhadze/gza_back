<?php
require('../Models/insertModel.php');
require('../Services/UploadHandler.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the title from the form
    $title = $_POST['title'];

    // Handle file upload
    $uploadHandler = new UploadHandler();
    $pdfFilePath = $uploadHandler->handleUpload($title);

    if ($pdfFilePath !== false) {
        // File uploaded successfully, insert the file path into the database
        $insertModel = new InsertModel();
        $insertResult = $insertModel->insertPdf($title, $pdfFilePath);

        if ($insertResult['status'] === "success") {
            echo "PDF path inserted successfully!";
        } else {
            echo "Error: " . $insertResult['content'];
        }
    } else {
        echo "Error: Failed to upload PDF file.";
    }
} else {
    echo "Error: Invalid request method.";
}
