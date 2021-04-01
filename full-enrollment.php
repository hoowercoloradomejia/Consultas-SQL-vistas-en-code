<?php
   
   $host = "localhost";
   $dbname = "disfraz";
   $username = "root";
   $password = "";

   $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
   $sql = " SELECT s.name as nombre_dizfras, s.genero, s.talla1, s.talla2, s.talla3, c.name as categoria, c.precio FROM mustafa as s JOIN enrollment e ON s.id = e.mustafa_id JOIN categoria c ON e.categoria_id = c.id ORDER BY s.name ";

   $q = $cnx->prepare($sql);

   $result = $q->execute();

   $enrollments = $q->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>enrollment listado</title>
</head>
<body>
      <h1> CONSULTA SQL ENROLLMENT LISTADO</h1>
      <table border="1">
         <tr>
            <td>
               Nombre dizfras
            </td> 
            <td>
               genero
            </td> 
            <td>
               talla1
            </td> 
            <td>
               talla2
            </td> 
            <td>
               talla3
            </td> 
            <td>
               Nombre 
            </td> 
            <td>
               precio
            </td>   
         </tr>

<?php
    for($i =0; $i<count($enrollments); $i++) {
?>       
         <tr>
            <td>
                 <?php  echo $enrollments[$i]["nombre_dizfras"] ?> 
            </td>
            <td>
                 <?php
                 $genero = $enrollments[$i]["genero"];
                 if($genero == "0"){
                    echo "Femenino";
                 }else{
                    echo "Masculino";
                 }   
                 ?> 
            </td>
            <td>
                 <?php  echo $enrollments[$i]["talla1"] ?> 
            </td>
            <td>
                 <?php  echo $enrollments[$i]["talla2"] ?> 
            </td>
            <td>
                 <?php  echo $enrollments[$i]["talla3"] ?> 
            </td>
            <td>
                 <?php  echo $enrollments[$i]["categoria"] ?> 
            </td>
            <td>
                 <?php  echo $enrollments[$i]["precio"] ?> 
            </td>
         </tr>
<?php         
    }     
?>

      </table>
   
</body>
</html>
