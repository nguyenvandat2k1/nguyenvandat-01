<?php 

echo "<pre>";

// Check tồn tại
// if (file_exists(__DIR__ . '/../array.php')) {
//     echo "Tồn tại";
// } else {
//     echo "KHÔNG Tồn tại";
// }

// Lấy nội dung của file hàm file_get_contents
// Ghi toàn bộ nội dung chuỗi ra file
// file_put_contents('./img-uploaded.jpg', file_get_contents('./img.jpg'));
// $data = [
//     ['name' => 'Nguyễn Văn A','email' => 'a@gmail.com','phone' => '0928887989'],
//     ['name' => 'Nguyễn Văn B','email' => 'b@gmail.com','phone' => '0928887989'],
//     ['name' => 'Nguyễn Văn C','email' => 'c@gmail.com','phone' => '0928887989'],
//     ['name' => 'Nguyễn Văn D','email' => 'd@gmail.com','phone' => '0928887989']
// ];
// file_put_contents('./data.json', json_encode($data));

// $data = json_decode(file_get_contents('./data.json'), true);
// print_r($data);

// Copy file
// Cú pháp: copy($source, $newpath)
// Trong đó $source là path file cần copy và $newpathlà path file cần di chuyển tới.

// copy('./img.jpg', './img-copy.jpg');

// Tạo một thư mục ( folder) mới
// Cú pháp: mkdir($path)
// Trong đó $path là đường dẫn đến folder cần tạo.

// mkdir('./uploads/posts/20240326', '0777', true);
