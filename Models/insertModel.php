<?php
require('../Dbh/Database.php');

class InsertModel extends Database {
    private $dbh;
    private $conn;

    public function __construct() {
        $this->dbh = new Database();
        $this->conn = $this->dbh->getConnection();
    }

    public function insertPdf($title, $pdfPath) {
        // Prepare the INSERT query
        $query = "INSERT INTO list (title, pdf_path) VALUES (:title, :pdfPath)";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':pdfPath', $pdfPath, PDO::PARAM_STR);

        // Execute the query
        if ($stmt->execute()) {
            return ["status" => "success", "content" => "PDF path inserted successfully"];
        } else {
            return ["status" => "error", "content" => "Failed to insert PDF path"];
        }
    }
}
