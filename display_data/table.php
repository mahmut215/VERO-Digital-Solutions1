<?php
$i = 1;
//$total_rows = 0 ;
include '../api/connect.php';
foreach ($json1 as $firat) {
//   $total_rows = count( $json1->result );
//   echo $i." ".$start ." " .$end ." <br>";
//   if ( $i >= $start && $i <= $end){
//             var_dump($firat) ;
    echo '<tr style="background-color:'.$firat->colorCode.'"><th scope="row">' . $i . '</th>';
    echo '<td>' . $firat->task. '</td>';
     echo '<td>' . $firat->title. '</td>';
      echo '<td>' . $firat->description . '</td>';

    echo '<td>' . $firat->colorCode . '</td>';
    echo ' </tr>';
 $i = $i + 1 ;              
}
 
?>

