<?php

class UploadController {
    public function showUploadForm() {
        // Hiển thị biểu mẫu tải lên
        include('upload_form.php');
    }

    public function processUpload() {
        // Xử lý tệp Excel tải lên ở đây
        if (isset($_FILES['excel_file']) && $_FILES['excel_file']['error'] == UPLOAD_ERR_OK) {
            $file = $_FILES['excel_file']['tmp_name'];

            require 'vendor/autoload.php'; // Import thư viện PHPExcel
            use PhpOffice\PhpSpreadsheet\IOFactory;

            $spreadsheet = IOFactory::load($file);
            $worksheet = $spreadsheet->getActiveSheet();

            // Duyệt qua từng dòng trong tệp Excel và tạo tài khoản
            foreach ($worksheet->getRowIterator() as $row) {
                $data = $row->getCellIterator();
                $name = $data->current()->getValue();
                $email = $data->next()->getValue();
                $password = $data->next()->getValue();

                // Thực hiện tạo tài khoản dựa trên dữ liệu từ Excel
                // Nếu thành công, thêm người dùng vào cơ sở dữ liệu
            }

            // Hiển thị thông báo cho người dùng (View)
            echo "Xử lý tệp Excel và tạo tài khoản thành công!";
        }
    }
}
?>