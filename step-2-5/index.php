<h2><b>Step 2</b></h2>
<h4>5. Hasil dari function dibawah adalah</h4>

<?php
$x = 8;

function data()
{
    $x = 2;
    $y = 3;
    $z = 4;

    return $x + $y + $z;
}

data();

echo '$x = 8;
    <br><br>
    function data() {
        <br>
        $x = 2;
        <br>
        $y = 3;
        <br>
        $z = 4;
        <br><br>
        return $x + $y + $z;
        <br>
    }
    <br><br>
    data();
    <br><br>';

echo 'Hasil dari function diatas adalah :' . $x;
echo '<br><br>';
echo 'Data yang di echo adalah variabel x yang bernilai 8';
echo '<br><br>';
echo 'dan function itu berisi penjumlahan antar variabel x + y + z yang menghasilkan nilai 9';

?>