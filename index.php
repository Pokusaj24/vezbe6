<?php 
$msg = isset($msg) ? $msg : ""; 
include 'partials/header.php'; 
?>
<div class="container">
    <form action="controller.php" method="POST">
        <input type="hidden" name="action" value="doPost">    
        Marka: <br> 
        <input type="text" name="marka"><br>
        Cena: <br> 
        <input type="number" name="cena"><br><br>     
        <input type="submit" value="Pretraži">
    </form>
    <form action="controller.php" method="GET">
        <input type="hidden" name="action" value="doGet">
        <input type="submit" value="Sortiraj po ceni">
    </form>
    <?= $msg ?>
</div>
<?php 
include 'partials/footer.php'; 
?>
