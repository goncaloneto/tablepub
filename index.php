<?php
include("cnx.php");
include("session.php");
?>

<?php

echo "
<!DOCTYPE html>
<html >
  <head>
    <title>Lista de Publicações</title>
  
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=400px, user-scalable=no\">
    
    <link rel=\"stylesheet\" href=\"css/normalize.css\">
    <link rel=\"stylesheet\" href=\"css/w3.css\">
    <link rel=\"stylesheet\" href=\"css/style.css\">
  </head>

  <body class=\"w3-content\" style=\"max-width:500px\">
  
  <ul class=\"w3-navbar w3-light-grey w3-border\">
    <li><a href=\"index.php\">Refresh</a></li>
    <li><a href=\"logout.php\">Logout</a></li>
    
    <li class='w3-right'><button class=\"w3-btn w3-green w3-text-green\" id=\"gobtn\">&nbsp;&nbsp;</button></li>
    <li class='w3-right'><input type=\"search\" class=\"w3-input\" placeholder=\"Search..\" id=\"search\" autofocus></li>
  </ul>
  </br>
  ";
?>

<?php

$result = mysqli_query($conn, "SELECT * FROM publishers ORDER BY name"); 
$del_result = mysqli_query($conn, "SELECT * FROM deliveries ORDER BY name");

if (!$result) 
{
     printf("Erro:%s\n", $conn->error);
}
else 
{
    echo "

    <table class='w3-table w3-bordered'>
    <thead>
    <tr class='w3-green'>
    <th class='col'>Nome</th>
    <th class='col'>W</th>
    <th class='col'>WBig</th>
    <th class='col'>WEasy</th>
    <th class='col'>WBook</th>
    <th class='col'>BigWBook</th>
    </tr>
    </thead>";
    

    while($row = mysqli_fetch_array($result))
    {
    $del_row =  mysqli_fetch_array($del_result);
    
    echo "<tbody>";
    echo "<tr>";
    echo "<td class='row noBackColor'>" . $row['Name'] . "</td>";

    //Watchtower
    if($del_row['W']==1){
        echo "<td class='done'>" . $row['W'] . "</td>";
    }
    else
        echo "<td>" . $row['W'] . "</td>";
    
    //Watchtower Big Letters    
    if($del_row['WBig']==1){
        echo "<td class='done'>" . $row['WBig'] . "</td>";
    }
    else
        echo "<td>" . $row['WBig'] . "</td>";
    
    //Watchtower Easy to read    
    if($del_row['WEasy']==1){
        echo "<td class='done'>" . $row['WEasy'] . "</td>";
    }
    else
        echo "<td>" . $row['WEasy'] . "</td>";
    
    //Meating Worbook     
    if($del_row['WBook']==1){
        echo "<td class='done'>" . $row['WBook'] . "</td>";
    }
    else
        echo "<td>" . $row['WBook'] . "</td>";
    
    //Meating Worbook Big    
    if($del_row['BigWBook']==1){
        echo "<td class='done'>" . $row['BigWBook'] . "</td>";
    }
    else
        echo "<td>" . $row['BigWBook'] . "</td>";
        
    echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    
    mysqli_close($conn);
  
}

?>


<?php
echo"
<script src=\"js/jquery.js\"></script>
<script src=\"js/script.js\"></script>

</body>
</html>";

?>