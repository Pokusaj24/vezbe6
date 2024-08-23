<?php 
require_once 'DAO.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['telefoni'])) {
    $telefoni = $_SESSION['telefoni'];

    include './partials/header.php'; 
?>
<div class="row" style="margin-left:1rem;">
    <div class="col-12">
        <?php if (!empty($telefoni)) { ?>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Marka</th>
                <th>Cena</th>
            </tr>
            <?php foreach ($telefoni as $telefon) { ?>
            <tr>
                <td><?= htmlspecialchars($telefon['id']) ?></td>
                <td><?= htmlspecialchars($telefon['marka']) ?></td>
                <td><?= htmlspecialchars($telefon['cena']) ?> €</td>
            </tr>
            <?php } ?>
        </table>
        <?php } else { ?>
        <p>Nema telefona koji ispunjavaju kriterijume.</p>
        <?php } ?>
        <a href="controller.php?action=logout">LOGOUT</a>
        <a href="./index.php">Index</a>
    </div>
</div>
<?php 
    include './partials/footer.php'; 
} else {
    header('Location:index.php'); 
}
?>
