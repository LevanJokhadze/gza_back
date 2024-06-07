<?php
require('../Dbh/Database.php');

class ContentModel extends Database {
    private $dbh;
    private $conn;

    public function __construct() {
        $this->dbh = new Database();
        $this->conn = $this->dbh->getConnection();
    }

    protected function fetchTitle($title) {
        $query = "SELECT pdf_path FROM list WHERE title = :title";
        
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $content = $stmt->fetch(PDO::FETCH_ASSOC);
                return [
                    "status" => "success",
                    "content" => $content
                ];
            } else {
                return [
                    "status" => "error",
                    "content" => "No data found",
                    "title" => $title
                ];
            }
        } else {
            return [
                "status" => "error",
                "content" => "Not Executed!"
            ];
        }
    }
}
?>
