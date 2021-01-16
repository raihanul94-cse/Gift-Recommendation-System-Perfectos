<?php
include '../database/db_con.php';
$qage = $_POST['age'];
$qcolor = $_POST['color'];

$qgender = $_POST['gender'];
$qmarital_status = $_POST['marital_status'];
$qoccasion = $_POST['occasion'];
$qoccupation = $_POST['occupation'];
$qsport = $_POST['sport'];
$userid = $_POST['userid'];
$com = 0;
$get = mysqli_query( $con, 'SELECT * FROM `RECOMMENDATION` LIMIT 10' );

while( $row = mysqli_fetch_array( $get ) ) {
    $id = $row['scoreid'];
    $age = $row['age'];
    $color = $row['color'];

    $gender = $row['gender'];
    $marital_status = $row['marital_status'];
    $occasion = $row['occasion'];
    $occupation = $row['occupation'];
    $sport = $row['sport'];
    $gift = $row['gift'];
    $score = sqrt( pow( ( int )$age-( int )$qage, 2 )+pow( ( int )$color-( int )$qcolor, 2 )+pow( ( int )$gender-( int )$qgender, 2 )+pow( ( int )$marital_status-( int )$qmarital_status, 2 )+pow( ( int )$occasion-( int )$qoccasion, 2 )+pow( ( int )$occupation-( int )$qoccupation, 2 )+pow( ( int )$sport-( int )$qsport, 2 ) );

    // echo json_encode( array( 'statusCode'=>200, 'age'=>$age, 'gender'=>$gender, 'color'=>$color, 'occasion'=>$occasion, 'occupation'=>$occupation, 'marital_status'=>$marital_status, 'sport'=>$sport, 'gift'=>$gift, 'score'=>$score ) );

    if ( mysqli_query( $con, "INSERT INTO `SCORE`(`userid`,`scoreid`,`score`) VALUES ('$userid','$id','$score')" ) ) {
        $com = 1;
    }
}

if ( $com == 1 ) {
    date_default_timezone_set( 'Asia/Dhaka' );
    $date_time = date( 'Y-m-d%20H:i:s' );
    echo json_encode( array( 'statusCode'=>200, 'userid'=>$userid , 'time'=>$date_time) );
} else {
    echo json_encode( array( 'statusCode'=>201 ) );
}
?>