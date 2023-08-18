<?php
$page_id = "index";
$title = "My Blog";
ob_start();
?>


<div class="container">
    <?php

    // displaying the articles
    // changed to a foreach because it is already being fetched in model.php
    foreach ($articles as $article) {
        include('./view/component/articleCard.php');
    }
    ?>
</div>

<?php
$content = ob_get_clean();
require "template.php";
?>