<?php
function main() {
    ?>

    <style>
    input, textarea { display: block; margin-bottom: 1em; }
    label { font-weight: bold; display: block; }
    </style>
    <br><br>
    <center><h1>VER JORNADAS</h1></center>
    
    <?php
    // Find out how many teams we want fixtures for.
    if (! isset($_GET['teams']) && ! isset($_GET['names'])) {
        print get_form(); 
    } else {
        # XXX check for int
        print show_fixtures(isset($_GET['teams']) ?  nums(intval($_GET['teams'])) : explode("\n", trim($_GET['names'])));
     
    }
}

function nums($n) {
    $ns = array();
    for ($i = 1; $i <= $n; $i++) {
        $ns[] = $i;
    }
    return $ns;
}

function show_fixtures($names) { 
    $teams = sizeof($names);
    // If odd number of teams add a "ghost".
    $ghost = false;
    if ($teams % 2 == 1) {
        $teams++;
        $ghost = true;
    }
    
    // Generate the fixtures using the cyclic algorithm.
    $totalRounds = $teams - 1;
    $matchesPerRound = $teams / 2;
    $rounds = array();
    for ($i = 0; $i < $totalRounds; $i++) {
        $rounds[$i] = array();
    }

    $conexion = mysqli_connect('localhost','root','','futbol');
    $sql1="TRUNCATE TABLE `sorteo` ";
    $sql2="TRUNCATE TABLE `calendario` ";
    $sql3="TRUNCATE TABLE `partidos` ";
    $result1=mysqli_query($conexion,$sql1);
    $result2=mysqli_query($conexion,$sql2);
    $result3=mysqli_query($conexion,$sql3);  

    for ($round = 0; $round < $totalRounds; $round++) {
        for ($match = 0; $match < $matchesPerRound; $match++) {
            $home = ($round + $match) % ($teams - 1);
            $away = ($teams - 1 - $match + $round) % ($teams - 1);
            // Last team stays in the same place while the others
            // rotate around it.
            if ($match == 0) {
                $away = $teams - 1;
            }

            $rounds[$round][$match] = team_name($home + 1, $names) 
                . " v " . team_name($away + 1, $names);

            $eq1 = team_name($home + 1, $names);
            $eq2 = team_name($away + 1, $names);
            $fecha = $round + 1;

        $sql="INSERT INTO `sorteo`(`idE1`, `idE2`, `jornada`,`partido`) VALUES ($eq1,$eq2,$fecha,$match+1)";
        $result=mysqli_query($conexion,$sql);
        
        }
       
    }

    header("Location: ../../modulos.html");

}

function flip($match) {
    $components = explode(' v ', $match);
    return $components[1] . " v " . $components[0];
}

function team_name($num, $names) {
    $i = $num - 1;
    if (sizeof($names) > $i && strlen(trim($names[$i])) > 0) {
        return trim($names[$i]);
    } else {
        return $num;
    }
}

function get_form() {

    $conexion = mysqli_connect('localhost','root','','futbol');

    $sql="SELECT count(*) num FROM `equipo`";
    $result=mysqli_query($conexion,$sql);
    $rows=mysqli_fetch_array($result);


    $s = '';
    $s .= '<center><form method="" action="' .$_SERVER['SCRIPT_NAME'] . '">' . "\n";
    $s .= '<label for="teams">Numero de equipos participantes: '.$rows['num'].'</label><input type="text" name="teams"  style="visibility:hidden" value="'.$rows['num'].'"/>' . "\n";
    $s .= '<input type="submit" value="GENERAR JORNADAS"/><br>' . "\n";
    $s .= '<label for="teams" style="color: red;">Nota: Si usted presiona el botón generar jornadas<br>los datos de los equipos se borraran... '. "\n";
    $s .= '</form></center></center>' . "\n";

    return $s;
}

main();

?>