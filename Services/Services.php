<?php
    require('../Models/ContentModel.php');

    class Services extends ContentModel {
        protected function checkData($data) {
            if (empty($data)) {
                return [
                    "status" => "error",
                    "content" => "Empty Title"
                ];
            }
        
            $model = $this->fetchTitle($data);
            
            if ($model['status'] == 'success') {
                $pdfPath = isset($model['content']['pdf_path']) ? $model['content']['pdf_path'] : '';
        
                if (!empty($pdfPath) && file_exists($pdfPath)) {
                    header('Content-type: application/pdf');
                    header('Content-Disposition: inline; filename="' . basename($pdfPath) . '"');
                    readfile($pdfPath);
        
                    return [
                        "status" => "success",
                        "content" => "File Sent Successfully",
                    ];
                } else {
                    return [
                        "status" => "error",
                        "content" => "PDF File Not Found or Empty Path!",
                    ];
                }
            } else {
                return [
                    "status" => "error",
                    "content" => $model['content']
                ];
            }
        }
        
    }