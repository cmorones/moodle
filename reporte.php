<?php 
header('Content-Type: application/excel');
header('Content-Disposition: attachment; filename=usuarios.csv');

$servername = "localhost";
$username = "moodleuser";
$password = "?a83yy0X";
$dbname = "moodle";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Select id, username, firstname, lastname, email, city, country, timecreated, Fecha.`data` as 'Fecha_nacimiento' from mdl_user left join (select mdl_user_info_data.data,mdl_user_info_data.userid from mdl_user_info_data join mdl_user_info_field on mdl_user_info_data.fieldid= mdl_user_info_field.id and mdl_user_info_field.id=2) as Fecha on Fecha.userid= mdl_user.id
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$conn->set_charset("utf8");
//echo "Connected successfully";

//$sql = "Select id, username, firstname, lastname, email, city, country, timecreated from mdl_user";
$sql = "Select id, username, firstname, lastname, email, country, timecreated, Fecha.`data` as 'Fecha_nacimiento', Genero.`data` as 'Sexo', Estado.`data` as 'Estado' 
,institucionP.`data` as 'institucionP'
from mdl_user 
left join (select mdl_user_info_data.data,mdl_user_info_data.userid from mdl_user_info_data join mdl_user_info_field on mdl_user_info_data.fieldid= mdl_user_info_field.id and mdl_user_info_field.id=2) as Fecha on Fecha.userid= mdl_user.id 
left join (select mdl_user_info_data.data,mdl_user_info_data.userid from mdl_user_info_data join mdl_user_info_field on mdl_user_info_data.fieldid= mdl_user_info_field.id and mdl_user_info_field.id=3) as Genero on Genero.userid= mdl_user.id 
left join (select mdl_user_info_data.data,mdl_user_info_data.userid from mdl_user_info_data join mdl_user_info_field on mdl_user_info_data.fieldid= mdl_user_info_field.id and mdl_user_info_field.id=9) as Estado on Estado.userid= mdl_user.id
left join (select mdl_user_info_data.data,mdl_user_info_data.userid from mdl_user_info_data join mdl_user_info_field on mdl_user_info_data.fieldid= mdl_user_info_field.id and mdl_user_info_field.id=17) as institucionP on institucionP.userid= mdl_user.id";
//echo $sql . "<br />";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	$expcsv = array("Usuario,Nombre,Apellido,Email,Pais,Cursos,Creado,Fecha de Nacimiento,Genero,Estado,Institucion");
	//echo "<table>";
	//echo "<tr><th>Usuario</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>Ciudad</th><th>Pais</th><th>Cursos</th></tr>";
    while($row = $result->fetch_assoc()) {
		//subquery
		$sql1 = "SELECT c.shortname FROM mdl_user u INNER JOIN mdl_user_enrolments ue ON ue.userid = u.id INNER JOIN mdl_enrol e ON e.id = ue.enrolid INNER JOIN mdl_course c ON e.courseid = c.id where u.id = " . $row['id'];
//echo $sql1;

		//echo "<p>".$row["id"]." </p>";

		$result1 = $conn->query($sql1);
		$cursos = "";
		if ($result1->num_rows > 0) {
			while($row1 = $result1->fetch_assoc()) {
				//echo "id  cursos: " . $row1["id"];
				$cursos = $cursos . " " . $row1["shortname"];
			}
			 
		}
		
		//subquery
        //echo "<tr><td>" .$row["username"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>" . $row["email"] . "</td><td>" . $row["city"] . "</td><td>" . $row["country"] . "</td><td>" . $cursos . "</td></tr>";
		array_push($expcsv,"".$row["username"].",".$row["firstname"].",".$row["lastname"].",".$row["email"].",".$row["country"].",".$cursos.",".date("d-m-Y",$row["timecreated"]).",".date("d-m-Y",$row["Fecha_nacimiento"]).",".$row['Sexo'].",".$row['Estado'].",".$row['institucionP']."");
		
    }
	//echo "</table>";
	//print_r($expcsv);
	


} else {
    //echo "0 results";
}
$conn->close();

//var_dump($expcsv);


$file = fopen("php://output","w");
$expcsv = array_map("utf8_decode", $expcsv);
foreach ($expcsv as $line)
{
	$val = explode(",", $line);
  fputcsv($file,$val);
}
fclose($fp);

?>
