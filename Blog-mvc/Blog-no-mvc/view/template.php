<!DOCTYPE html>
<!-- INDEX VIEW is responsible for displaying the main page -->
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title; ?></title>
    <link href="./public/css/mycss.css" rel="stylesheet" />
</head>

<body id="<?= $page_id; ?>">
    <header>
        <h1>Mah cool page </h1>
    </header>
    <?= $content; ?>
</body>

</html>