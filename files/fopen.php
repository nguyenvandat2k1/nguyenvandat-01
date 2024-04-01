<?php 

echo "<pre>";

$open = @fopen('./demo.txt', 'a+');

if ($open) {
    echo 'Mở file thành công!';
} else {
    echo 'Mở file KHÔNG thành công!';
}