<h2><b>Step 2</b></h2>
<h4>1A.Buatlah urutan bilangan prima</h4>

<?php 
    error_reporting(0);
    for($i; $i <= 100; $i++){
        $a = 0;
        for($j=1; $j <= $i; $j++){
            if($i % $j == 0){
                $a++;
            }
        }
        if($a == 2){
            echo $i . '<br>';
        }
    }

?>

<hr>

<h4>1B.Buatlah urutan bilangan ganjil</h4>

<?php
    for ($ganjil = 1; $ganjil <= 100; $ganjil++) {
        if ($ganjil % 2 == 1) {
        echo $ganjil . '<br>';
        }
    }
?>

<hr>

<h4>1C.Buatlah urutan bilangan genap</h4>

<?php
    for ($genap = 1; $genap <= 100; $genap++) {
        if ($genap % 2 == 0) {
        echo $genap . '<br>';
        }
    }
?>

<hr>

<h4>1D.Buatlah urutan angka kelipatan 5</h4>

<?php
    for ($i = 1; $i <= 100; $i++) {
        if ($i % 5 == 0) {
        echo $i . '<br>';
        }
    }
?>