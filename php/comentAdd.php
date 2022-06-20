<?php 
    $ime = $_POST["ime"];
    $priimek = $_POST["priimek"];               //to je ime spremnlj. ki smo jo dobili iz kontak.php ---- post pošlje iz forma v (newcomment.php) file.
    $coment = $_POST["coment"];   
    $conn=mysqli_connect("localhost", "root", "", "database_GlowZone");
    $sql = "SELECT * FROM coments";
    $result=mysqli_query($conn,$sql);
    $sql= "INSERT INTO coments(ime, priimek, coment) VALUES('$ime','$priimek','$coment')"; //shranimo v spremenljivko SQL
    if(mysqli_query($conn,$sql)) //povezava med localhost in sql stavkom ---- izvede sql stavek v tabeli coments
    {
        mysqli_close($conn);
        echo "<script>location.href='./komentiraj.php'</script>"; // nas vrže na to stran
    }
?>