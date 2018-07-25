<?php

$a = 'pertalite';
$b = 2;
$c = 30000;

if ($a == 'pertalite') {
  hitungPertalite($b,$c);
} elseif ($a = 'pertamax') {
  hitungPertamax($b,$c);
}

function hitungPertamax($b,$c)
{
  $total = $b * 7800;
  $kembalian = $c - $total;
  echo "total = ".$total.<br>;
  echo "kembalian = ".$kembalian;
}

function hitungPertalite($b,$c)
{
  $total = $b * 6000;
  $kembalian = $c - $total;
  echo "total = ".$total."<br>";
  echo "kembalian = ".$kembalian;
}



 ?>
