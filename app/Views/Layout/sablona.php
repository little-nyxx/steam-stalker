<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->renderSection("title"); ?>
    <?= $this->include("Layout/css_js"); ?>
</head>
<body>
    <?= $this->include("Layout/navbar"); ?>
    <div class="container">
        <?= $this->renderSection("content"); ?>
    </div>
</body>
</html>