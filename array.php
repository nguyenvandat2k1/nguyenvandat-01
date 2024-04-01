<?php

$array = [
    ['id' => 5698, 'first_name' => 'Peter', 'last_name' => 'Griffin',],
    ['id' => 4767, 'first_name' => 'Ben 1', 'last_name' => ' Smith Ahihi',],
    ['id' => 3807, 'first_name' => 'Joe', 'last_name' => 'Doe',],
    ['id' => 5693, 'first_name' => 'Peter', 'last_name' => 'Griffin',],
    ['id' => 4765, 'first_name' => 'Ben 2', 'last_name' => 'Ahihi Smith',],
    ['id' => 3807, 'first_name' => 'Joe', 'last_name' => 'Doe',],
];

echo "<pre>";

// https://www.w3schools.com/php/func_array_chunk.asp
$arrayChunk = array_chunk($array, 2);
// print_r($arrayChunk);

// https://www.w3schools.com/php/func_array_column.asp
$arrayColumn = array_column($array, 'first_name');
// print_r($arrayColumn);

// https://www.w3schools.com/php/func_array_unique.asp
$arrayColumnUnique = array_unique($arrayColumn);
// print_r($arrayColumnUnique);

// https://www.w3schools.com/php/func_array_combine.asp
$fname = array("Peter", "Ben", "Joe");
$age = array("35", "37", "43");
$c = array_combine($fname, $age);
// print_r($c);

// https://www.w3schools.com/php/func_array_diff.asp
$files = scandir('./proof');
$files = array_diff($files, ['.', '..']);
// print_r($files);

// https://www.w3schools.com/php/func_array_keys.asp
// https://www.w3schools.com/php/func_array_values.asp
$a = array(
    "Name" => "Peter",
    "Age" => "41",
    "Country" => "USA"
);
// $keys = array_keys($a);
// $values = array_values($a);
// echo "KEYS" . PHP_EOL;
// print_r($keys);
// echo "VALUES" . PHP_EOL;
// print_r($values);

// https://www.w3schools.com/php/func_array_map.asp
// Bảng user
// "INSERT INTO users (`name`, `email`, `password`) VALUES ($virtualParams)"
$data = [
    'name' => 'NVA',
    'email' => 'a@gmail.com',
    'password' => 12345678
];
// $keys = array_keys($data);
// $keys2 = array_map(function ($item) {
//     return "`$item`";
// }, $keys);
// $strKeys = implode(', ', $keys2);
// print_r($strKeys);

// https://www.w3schools.com/php/func_array_filter.asp
$a = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

// $soChan = array_filter($a, function ($item) {
//     return $item % 2 == 0;
// });
// print_r($soChan);

$Smiths = array_filter($array, function ($item) {
    return strpos($item['last_name'], 'Smith') !== false;
    // return $item['last_name'] == 'Smith';
});
// print_r($Smiths);

$Smiths2 = [];
foreach($array as $item) {
    if (strpos($item['last_name'], 'Smith') !== false) {
        $Smiths2[] = $item;
    }
}
// print_r($Smiths2);