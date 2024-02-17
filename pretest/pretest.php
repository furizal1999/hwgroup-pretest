<?php
/*
Buatlah sebuah fungsi looping dari 1 sampai 100 dengan peraturan:

untuk setiap angka yang habis dibagi 3 cetak "Tiga"
kalau habis dibagi dengan 5 cetak "Lima"
kalau bisa dibagi oleh 3 dan 5 cetak "TigaLima"
jika tidak bisa dibagi dengan 3 ataupun 5 cetak angka tersebut
NB: boleh menggunakan bahasa pemograman apapun.
*/

// set jumlah looping = 100
$loop_max = 100;
for ($i=0; $i < $loop_max ; $i++) { // looping dari 1 - loop_max (index: 0-99)
    if(($i+1)%3==0 && ($i+1)%5==0){ // jika angka dapat dibagi 3 dan 5
        echo "TigaLima<br>"; // menampilkan "TigaLima"
    }elseif(($i+1)%3==0){ // jika angkat hanya dapat dibagi dengan 3
        echo "Tiga<br>"; // menampilkan "Tiga"
    }elseif(($i+1)%5==0){ // jika angka hanya dapat dibagi dengan 5
        echo "Lima<br>"; // menampilkan "Lima"
    }else{ // jika angka tidak dapat dibagi dengan 3 dan 5
        echo ($i+1)."<br>"; // Manampilkan angka $i+1
    }
}