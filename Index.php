<?php
// Declaration des variables
    $results = [0,0,0,0];
    $GP = [0,0,0,0];
    $GW = [0,0,0,0];
    $GE = [0,0,0,0];
    $GL = [0,0,0,0];
    $GS = [0,0,0,0];
    $GR = [0,0,0,0];
    $GS_GR = [0,0,0,0];
    $table = [  ["TEAMS", "PTS", "GP", "GW", "GE", "GL","GS","GR","+/-"],
              ["MOR", $results[0], $GP[0], $GW[0], $GE[0], $GL[0], $GS[0], $GR[0], $GS_GR[0]],
              ["BEL", $results[1], $GP[1], $GW[1], $GE[1], $GL[1], $GS[1], $GR[1], $GS_GR[1]],
              ["CRO", $results[2], $GP[2], $GW[2], $GE[2], $GL[2], $GS[2], $GR[2], $GS_GR[2]],
              ["CAN", $results[3], $GP[3], $GW[3], $GE[3], $GL[3], $GS[3], $GR[3], $GS_GR[3]]
    ];
// Quand on clique sur le boutton submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $morocco = [$_POST["MOR1"],$_POST["MOR2"],$_POST["MOR3"]];
    $belgium = [$_POST["BEL1"],$_POST["BEL2"],$_POST["BEL3"]];
    $croitia = [$_POST["CRO1"],$_POST["CRO2"],$_POST["CRO3"]];
    $canada = [$_POST["CAN1"],$_POST["CAN2"],$_POST["CAN3"]];

// Toutes les équipes prennent la valeur 3 dans matches joués
     $GP = [3,3,3,3];
// L'addition des buts marqués
     $GS[0]=$_POST["MOR1"]+$_POST["MOR2"]+$_POST["MOR3"];
     $GS[1]=$_POST["BEL1"]+$_POST["BEL2"]+$_POST["BEL3"];
     $GS[2]=$_POST["CRO1"]+$_POST["CRO2"]+$_POST["CRO3"];
     $GS[3]=$_POST["CAN1"]+$_POST["CAN2"]+$_POST["CAN3"];
// L'addition des buts reçus
     $GR[0]=$_POST["BEL1"]+$_POST["CRO1"]+$_POST["CAN1"];
     $GR[1]=$_POST["MOR1"]+$_POST["CRO2"]+$_POST["CAN2"];
     $GR[2]=$_POST["MOR2"]+$_POST["BEL2"]+$_POST["CAN3"];
     $GR[3]=$_POST["CRO3"]+$_POST["BEL3"]+$_POST["MOR3"];
// La soustraction des buts reçus des buts marqués
     $GS_GR[0]= $GS[0]-$GR[0];
     $GS_GR[1]= $GS[1]-$GR[1];
     $GS_GR[2]= $GS[2]-$GR[2];
     $GS_GR[3]= $GS[3]-$GR[3];
// Les conditions Au cas de victoire/egalité/perte
     if ($morocco[0] > $belgium[0]) {
       $results[0]+= 3;
       $GW[0]+= 1;
       $GL[1]+= 1;
     }elseif($morocco[0] < $belgium[0]){
       $results[1]+= 3;
       $GW[1]+= 1;
       $GL[0]+= 1;
     }else{
       $results[0]+= 1;
       $results[1]+= 1;
       $GE[0]+= 1;
       $GE[1]+= 1;
     }
     //////////////////////////////////////////
     if ($morocco[1] > $croitia[0]) {
       $results[0]+= 3;
       $GW[0]+= 1;
       $GL[2]+= 1;
     }elseif($morocco[1] < $croitia[0]){
       $results[2]+= 3;
       $GW[2]+= 1;
       $GL[0]+= 1;
     }else{
       $results[0]+= 1;
       $results[2]+= 1;
       $GE[0]+= 1;
       $GE[2]+= 1;
     }
     //////////////////////////////////////////
     if ($morocco[2] > $canada[0]) {
       $results[0]+= 3;
       $GW[0]+= 1;
       $GL[3]+= 1;
     }elseif($morocco[2] < $canada[0]){
       $results[3]+= 3;
       $GW[3]+= 1;
       $GL[0]+= 1;
     }else{
       $results[0]+= 1;
       $results[3]+= 1;
       $GE[0]+= 1;
       $GE[3]+= 1;
     }
     //////////////////////////////////////////
     if ($belgium[1] > $croitia[1]) {
       $results[1]+= 3;
       $GW[1]+= 1;
       $GL[2]+= 1;
     }elseif($belgium[1] < $croitia[1]){
       $results[2]+= 3;
       $GW[2]+= 1;
       $GL[1]+= 1;
     }else{
       $results[1]+= 1;
       $results[2]+= 1;
       $GE[1]+= 1;
       $GE[2]+= 1;
     }
     //////////////////////////////////////////
     if ($belgium[2] > $canada[1]) {
       $results[1]+= 3;
       $GW[1]+= 1;
       $GL[3]+= 1;
     }elseif($belgium[2] < $canada[1]){
       $results[3]+= 3;
       $GW[3]+= 1;
       $GL[1]+= 1;
     }else{
       $results[1]+= 1;
       $results[3]+= 1;
       $GE[1]+= 1;
       $GE[3]+= 1;
     }
     //////////////////////////////////////////
     if ($croitia[2] > $canada[2]) {
       $results[2]+= 3;
       $GW[2]+= 1;
       $GL[3]+= 1;
     }elseif($croitia[2] < $canada[2]){
       $results[3]+= 3;
       $GW[3]+= 1;
       $GL[2]+= 1;
     }else{
       $results[2]+= 1;
       $results[3]+= 1;
       $GE[2]+= 1;
       $GE[3]+= 1;
     }
// remplissage du tableau
     $table = [  ["TEAMS", "PTS", "GP", "GW", "GE", "GL","GS","GR","+/-"],
              ["MOR", $results[0], $GP[0], $GW[0], $GE[0], $GL[0], $GS[0], $GR[0], $GS_GR[0]],
              ["BEL", $results[1], $GP[1], $GW[1], $GE[1], $GL[1], $GS[1], $GR[1], $GS_GR[1]],
              ["CRO", $results[2], $GP[2], $GW[2], $GE[2], $GL[2], $GS[2], $GR[2], $GS_GR[2]],
              ["CAN", $results[3], $GP[3], $GW[3], $GE[3], $GL[3], $GS[3], $GR[3], $GS_GR[3]]
    ];
// Fonction de tri du tableau
     function compare($a, $b) {
            if ($a[1] == $b[1]) {
                if ($a[8] == $b[8]) {
                    return $a[6] < $b[6] ? 1 : -1;
                }
                return $a[8] < $b[8] ? 1 : -1;
            }
            return $a[1] < $b[1] ? 1 : -1;
      }
     usort($table, "compare");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Matches</title>
</head>
<body>
<?php
// Boucle foreach pour imprimer le tableau apres son remplissage et son tri
     echo "<table class='table table-dark'>";
        foreach ($table as $row) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
?>
<form method="post">
<div class="d-flex justify-content-center">
    <p class="font-monospace"> MOR </p> <input type="number" min="0" value="0" name="MOR1"> 
    <input type="number" min="0" value="0" name="BEL1"> <p class="font-monospace"> BEL </p>
</div>

<div class="d-flex justify-content-center ">
    <p class="font-monospace"> MOR </p> <input type="number" min="0" value="0" name="MOR2"> 
    <input type="number" min="0" value="0" name="CRO1"> <p class="font-monospace"> CRO </p>
</div>
  
<div class="d-flex justify-content-center ">
    <p class="font-monospace"> MOR </p> <input type="number" min="0" value="0" name="MOR3"> 
    <input type="number" min="0" value="0" name="CAN1"> <p class="font-monospace"> CAN </p>
</div>

<div class="d-flex justify-content-center ">
    <p class="font-monospace"> BEL </p> <input type="number" min="0" value="0" name="BEL2"> 
    <input type="number" min="0" value="0" name="CRO2"> <p class="font-monospace"> CRO </p>
</div>

<div class="d-flex justify-content-center ">
    <p class="font-monospace"> BEL </p> <input type="number" min="0" value="0" name="BEL3"> 
    <input type="number" min="0" value="0" name="CAN2"> <p class="font-monospace"> CAN </p>
</div>

<div class="d-flex justify-content-center ">
    <p class="font-monospace"> CRO </p> <input type="number" min="0" value="0" name="CRO3"> 
    <input type="number" min="0" value="0" name="CAN3"> <p class="font-monospace"> CAN </p>
  </div>
  <div class="d-flex justify-content-center">
  <input type="submit" value="Submit Scores">
  </div>
</form>

</body>
</html>
