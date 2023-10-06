<?php

$pesan =  [
    "123",
    "aaa",
    "81027"    
];

$converted = serialize($pesan); //json_encode
file_put_contents("file.txt", $converted);

$isi_file = file_get_contents("file.txt");
print_r(unserialize($converted)); //json_decode

echo "Isi nya adalah $isi_file";
echo "<ol type='1'>";
foreach ($pesan as $isinya){
    echo "<li>$isinya</li>";
}
echo "</ol>"; 

?>