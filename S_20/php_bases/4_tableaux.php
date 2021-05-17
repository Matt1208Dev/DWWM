<?php

$a = array("19001" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "", "", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", "Validation"), 
       "19002" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", ""), 
       "19003" => array("", "", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "", "", "Validation") 
     );
?>

<pre>
<?php print_r ($a); ?>
</pre>

<?php
// Exercice 1

$validation = array_search("Validation", $a[19002]);
echo "La semaine de validation a lieu en semaine " . ($validation-1) . " pour la formation 19002.<br><br>";

// Exercice 2

$aReverse = array_reverse($a[19001], true);
$lastStageWeek = array_search("Stage", $aReverse);
echo "La dernière semaine de stage de la formation 19001 est la semaine " . ($lastStageWeek - 1) . ".<br><br>";

// Exercice 3

$formations = (array_keys($a));
echo "Tableau des formations<br>";
print_r ($formations);
echo "<br><br>";

// Exercice 4

$stage = count(array_keys($a[19003], "Stage"));
echo "La période de stage pour la formation 19003 dure " . $stage . " semaines.";
 

?>