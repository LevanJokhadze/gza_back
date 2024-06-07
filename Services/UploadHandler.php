<?php
class UploadHandler {
    public function handleUpload($title) {
        if ($_FILES['pdfFile']['error'] === UPLOAD_ERR_OK) {
            // Get the temporary file path
            $tmpFilePath = $_FILES['pdfFile']['tmp_name'];

            // Set the destination directory
            $uploadDir = "../Data/";

            // Generate a unique filename
            $fileName = uniqid() . '_' . $_FILES['pdfFile']['name'];

            // Set the destination file path
            $filePath = $uploadDir . $fileName;

            // Move the uploaded file to the destination directory
            if (move_uploaded_file($tmpFilePath, $filePath)) {
                // File uploaded successfully
                return $filePath;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
