

<?php
// Exercice 1

echo "Les nombres entiers impairs entre 0 et 150 :<br><br>";

for ($impair = 1; $impair < 150; $impair += 2) {
     echo $impair."<br>";
}

// 2e possibilité
echo "Les nombres entiers impairs entre 0 et 150 :<br><br>";

$impair = 1;

While ($impair < 150) {
     echo $impair."<br>";
     $impair += 2;
}

?>



<?php

// Exercice 2

$save = 1;

for ($save=0 ; $save <= 500; $save++) {
     echo "$save Je dois faire des sauvegardes régulières de mes fichiers.<br>";
}

?>

<?php

// Exercice 3

echo "Table de multiplication<br><br>";

$table = "<table border=1><thead><tr><th></th>";
$i = 0;
$j = 0;
$k = 0;
$multiply = $k*$j;

for ($i=0; $i<=12; $i++) {
     $table .= "<th>$i</th>";
}

$table .= "</tr></thead><tbody>";
for ($j = 0; $j <= 12; $j++) {
     $table .= "<tr><th>$j</th>";
     for ($k = 0; $k <=12; $k++) {
          $multiply = $k*$j;
          $table .= "<td>$multiply</td>" ;
     }
     $table .= "</tr>";
}

$table .= "</tbody></table>";
echo $table;

?>