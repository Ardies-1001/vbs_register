<?php 
if (isset($_SESSION['notification']['message'])) : ?>

<div
    class=" alert alert-<?= $_SESSION['notification']['type'] ?> font-weight-bold">

    <?= $_SESSION['notification']['message'] ?>

</div>

<?php 
$_SESSION['notification'] = [];
?>

<?php endif; ?>