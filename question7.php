<!DOCTYPE html>
<html lang="en">
<head>
	<title>Question 7</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php
	include_once('nav_bar.php');
?>

<h1>Question 7</h1>


<div>

<?php
// connects to database giving credentials
    const DB_HOST = 'localhost';
    const DB_NAME = 'questions';
    const DB_USER = 'adminer';
    const DB_PASSWORD = 'P@ssw0rd';
//using PDO for security	
$pdo = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$query = "SELECT * FROM questionInformation WHERE questionID = 7";


//submits and calls query from database
$sql = $query;
$stmt = $pdo->prepare($sql);
$stmt->execute();
 ?>
 
  <table cellpadding="10" align="center" style="border-collapse: collapse; border: 1px solid black; border-radius: 10px;">
    <tr style="border: 1px solid black;">
        <th style="border: 1px solid black;  border-radius: 10px;">Question</th>
        <th style="border: 1px solid black;  border-radius: 10px;">Description</th>
        <th style="border: 1px solid black;  border-radius: 10px;">Answer</th>
    </tr>
			
  <!--SPRINT 1 - php used to echo table and display database contents inside -->			
  <?php
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<tr style='border: 1px solid black;'>";
            echo "<td style='border: 1px solid black;  border-radius: 10px;'>" . $row['question'] . "</td>";
            echo "<td style='border: 1px solid black;  border-radius: 10px;'>" . $row['description'] . "</td>";
            echo "<td style='border: 1px solid black;  border-radius: 10px;'>" . $row['answer'] . "</td>";
        echo "</tr>";
        }
        echo "</table>";


?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>