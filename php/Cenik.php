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
        if (isset($_GET['ID'])) {
            $ID = $_GET['ID'];
            $delete = mysqli_query($conn, "DELETE FROM cenik WHERE ID = $ID");
        }
        $sql = "SELECT * FROM cenik";
        $info = mysqli_query($conn, $sql);
        $stVrstic = mysqli_num_rows($info);
        $x = 1;
        if (!mysqli_query($conn, $sql)) {
            echo "ERROR";
        } else {

            echo "
            <table>
                <tr style = 'color: red;'>
                    <th>ID</th>
                    <th>Cena</th>
                    <th>Velikost</th>
                    <th>Barva</th>
                </tr>
                <tr>
                ";
            do{
                $row = mysqli_fetch_assoc($info);
                echo "<td class='id'> " .$row['ID']. " </td>";
                echo "<td> " .$row['Cena']. " </td>";
                echo "<td> " .$row['Velikost']. " </td>";
                echo "<td> ".$row['Barva']." </td>";
                echo "<td> <a href='?ID=" .$row['ID']. "'>DELETE</a> </td></tr>";
                $x++;
            }while($x <= $stVrstic);
            echo "</table>";
        }
        ?>  
        
        </div>
        <div class="formi">
        <form action='ADDCenik.php' method='POST'>
            
            <div>ADD v Tabelo Cenik</div><br>
            <label for='velikost'>Velikost:</label>
            <input type='text' name='velikost' placeholder='Velikost'><br>
            <label for='barva'>Barva:</label>
            <input type='text' name='barva' placeholder='Barva'><br>
            <label for='cena'>Cena: </label>
            <input type='text' name='cena' placeholder='Cena'><br>
            <br>
            <input type='submit' value='SUBMIT'>
        </form>
        <form action='update.php' method='POST'>
            
            <div>UPDATE for Table</div><br>
            <label for='velikost'>Velikost:</label>
            <input type='text' name='velikost' placeholder='Velikost'><br>
            <label for='barva'>Barva:</label>
            <input type='text' name='barva' placeholder='Barva'><br>
            <label for='cena'>Cena: </label>
            <input type='text' name='cena' placeholder='Cena'><br>
            <label for='cena'>ID za katerega si zelite te podatke spremeniti: </label>
            <input type='text' name='ID' placeholder='Cena' id="input" value=""><br>
            <br>
            <input type='submit' value='SUBMIT'>
        </form>
        </div>
    </div>
</body>

</html>