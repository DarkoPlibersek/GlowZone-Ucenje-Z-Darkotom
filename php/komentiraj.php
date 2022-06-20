<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlowZone</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <nav>
        <!-- Navigacijska Vrstica -->
        <div><a href="../index.html">MainPage</a></div> <!-- Gumb za MainPage -->
        <div><a href="">O Nas</a></div> <!-- Gumb za O Nas -->
        <div><a href="./Cenik.php">Cenik</a></div> <!-- Gumb za Cenik -->
        <div><a href="./komentiraj.php">Komentarji</a></div> <!-- Gumb za Komentarje -->
    </nav> <!-- Konec Navigacijske Vrstice -->
    <div class="container">
        <div class="Naslov"> GlowZone </div>
        <div class="title"> Cenik nasih izdelkov na GlowZone </div>
        <div class="cenik">
        <?php 
        $conn = mysqli_connect("localhost", "root", "", "database_GlowZone");
        if (isset($_GET['id_coment'])) {
            $ID = $_GET['id_coment'];
            $delete = mysqli_query($conn, "DELETE FROM coments WHERE id_coment = $ID");
        }
        $sql = "SELECT * FROM coments";
        $info = mysqli_query($conn, $sql);
        $stVrstic = mysqli_num_rows($info);
        $x = 1;
        if (!mysqli_query($conn, $sql)) {
            echo "ERROR";
        } else {

            echo "
            <table>
                <tr style = 'color: red;'>
                    <th>Ime</th>
                    <th>Priimek</th>
                    <th>Koment</th>
                </tr>
                <tr>
                ";
            do{
                $row = mysqli_fetch_assoc($info);
                echo "<td> " .$row['ime']. " </td>";
                echo "<td> " .$row['priimek']. " </td>";
                echo "<td class='koment'> " .$row['coment']. " </td>";
                echo "<td> <a href='?id_coment=" .$row['id_coment']. "'>DELETE</a> </td></tr>";
                $x++;
            }while($x <= $stVrstic);
            echo "</table>";
        }
        ?>  
        
        </div>
        <div class="formi">
        <form action='comentAdd.php' method='POST'>
            
            <div>Komentiraj</div><br>
            <label for='ime'>Ime:</label>
            <input type='text' name='ime' placeholder='ime'><br>
            <label for='priimek'>Priimek:</label>
            <input type='text' name='priimek' placeholder='priimek'><br>
            <label for='coment'>Coment: </label>
            <input type='text' name='coment' placeholder='coment'><br>
            <br>
            <input type='submit' value='SUBMIT'>
        </form>
        
        </div>
    </div>
</body>

</html>