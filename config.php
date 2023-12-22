<?php
 
/*$conn=mysqli_connect('localhost','root','','pfa') or die ('Connection failed !');*/


 $servername='127.0.0.1';
  $username='root';
 $password='';
 $dbname="pfa";
 

 Try{
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "<span style='color:green'>Connexion reussie</span><br>";

 }

 catch(PDOException $e){
    echo "error :" . $e->getMessage();
}
?>