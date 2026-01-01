<?php include "../get_identitas.php"; ?>

<footer style="background:#a3ebb1; color:#333; text-align:center; padding:20px; margin-top:40px; font-size:14px;">
    <strong><?php echo $iden['nama']; ?></strong><br>
    <?php echo nl2br($iden['alamat']); ?><br>
    Telp: <?php echo $iden['telp']; ?> |
    Email: <?php echo $iden['email']; ?> |
    Website: <?php echo $iden['website']; ?><br>
    &copy; <?php echo date('Y'); ?> <?php echo $iden['nama']; ?>. All rights reserved.
</footer>


</body>
</html>