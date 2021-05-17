<?php


function calculator($nb1, $ope ,$nb2) {
     switch ($ope) {
          case "+": 
               $result = $nb1 + $nb2;
               return $result;
          case "*":
               $result = $nb1 * $nb2;
               return $result;
          case "-":
               $result = $nb1 - $nb2;
               return $result;
          case "/":
               $result = $nb1 / $nb2;
               return $result;
     }
}

// Test

$result = calculator(15, '-', 5);
echo $result;


?>