<?php 
    $ID = $_POST["ID"];
    $velikost = $_POST["velikost"];
    $barva = $_POST["barva"];               //to je ime spremnlj. ki smo jo dobili iz kontak.php ---- post pošlje iz forma v (newcomment.php) file.
    $cena = $_POST["cena"];   
    $conn=mysqli_connect("localhost", "root", "", "database_GlowZone");
    $sql = "SELECT * FROM cenik";
    $result=mysqli_query($conn,$sql);
    $sql= "UPDATE cenik SET Cena = '$cena', Velikost = '$velikost', Barva = '$barva' WHERE ID = '$ID'"; //shranimo v spremenljivko SQL
    if(mysqli_query($conn,$sql)) //povezava med localhost in sql stavkom ---- izvede sql stavek v tabeli coments
    {
        mysqli_close($conn);
        echo "<script>location.href='./Cenik.php'</script>"; // nas vrže na to stran
    }
?>