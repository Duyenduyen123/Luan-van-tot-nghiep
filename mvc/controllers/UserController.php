<?php
require_once 'vendor/autoload.php'; // Đường dẫn đến file autoload.php trong thư mục vendor

use PhpOffice\PhpSpreadsheet\IOFactory;

class UserController {
    public function upload() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $targetDir = 'path_to_upload_folder/';
            $targetFile = $targetDir . basename($_FILES["excelFile"]["name"]);
            $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);

            // Kiểm tra định dạng file
            if ($fileType == 'xlsx' || $fileType == 'xls') {
                // Di chuyển file tải lên vào thư mục upload
                if (move_uploaded_file($_FILES["excelFile"]["tmp_name"], $targetFile)) {
                    // Đọc dữ liệu từ file Excel
                    $data = $this->readExcelData($targetFile);

                    // Tiến hành xử lý dữ liệu để tạo tài khoản mới và cấp username, password
                    $createdUsers = $this->createUserAccounts($data);

                    // Hiển thị danh sách tài khoản đã tạo____ SỬA THÊM Ở ĐÂY SỬA ĐƯỜNG DẪN
                    require_once 'index.php?url=User/user_list.php';
                } else {
                    echo "Có lỗi xảy ra khi tải lên file";
                }
            } else {
                echo "Định dạng file không hợp lệ. Vui lòng tải lên file Excel.";
            }
        }

        // Hiển thị form tải lên
        require_once 'path_to_views_folder/upload_form.php';
    }

    private function readExcelData($filePath) {
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();

        $data = [];
        foreach ($worksheet->getRowIterator() as $row) {
            $rowData = [];
            foreach ($row->getCellIterator() as $cell) {
                $rowData[] = $cell->getValue();
            }
            $data[] = $rowData;
        }

        return $data;
    }

    private function createUserAccounts($data) {
        // Tiến hành xử lý dữ liệu để tạo tài khoản mới và cấp username, password
        // Lưu ý: Thực hiện kiểm tra và xử lý dữ liệu theo yêu cầu cụ thể của bạn

        $createdUsers = [];

        foreach ($data as $row) {
            $username = $row[0]; // Lấy thông tin username từ file Excel
            $password = $row[1]; // Lấy thông tin password từ file Excel

            // Tiến hành tạo tài khoản mới và cấp username, password
            // Ví dụ:
            // $user = new User();
            // $user->setUsername($username);
            // $user->setPassword($password);
            // $user->save();

            $createdUsers[] = [
                'username' => $username,
                'password' => $password
            ];
        }

        return $createdUsers;
    }
}
?>
