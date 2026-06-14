<?= $this->extend("layout/sablona"); ?>
<?= $this->section("title"); ?>
    <title>Steam Database - <?php foreach($game as $g) { echo $g->name; } ?></title>
<?=$this->endSection();?>

<?=$this->section("content"); ?>
<?php

?>
<div class="row pt-3">
    <?php foreach($game as $g) { ?>
    <div class="col-lg-6 mt-3">
        <?php 
        if ($g->photo[0] == "-") {
            $img = array(
                "src" => base_url("img/main/".$g->photo),
                'alt' => $g->name,
                'class' => 'w-100 h-100',
                'style' => 'object-fit: cover; width:100%; height:100%;'
            );
            echo img($img);
        } else {
        ?>
        <div class="position-relative" style="height:100%;">
            <img class="w-100 h-100" style="object-fit: cover; width:100%; height:100%;" src="<?=$g->photo?>" alt="<?=$g->name;?>">
        </div>
        <?php } ?>
    </div>
    <div class="col-lg-6 mt-1">
        <h1 style="text-align: left;"><?=$g->name?></h1>

        <div style="text-align: justify; overflow:hidden; max-height: 100px" class="mt-3">
            <?php if ($g->description[0] == "<") {
                echo $g->description;
            } else {?>
                <p class="card-text"><?= $g->description;?></p>
            <?php } ?>
        </div>

        <div class="mt-2">
            <p class="fs-5 mb-1">Release Date: <u><?=date("d. m. Y", strtotime($g->release_date))?></u></p>
            <p class="fs-5 mb-1">Developer: <u><?=$g->name_developer?></u></p>
            <p class="fs-5 mb-1">Publisher: <u><?=$g->name_publisher?></u></p>    
        </div>
        <p class="mt-2 card-text border d-inline-block px-2 py-1 fs-5"><strong>$<?=$g->price?></strong></p>
    </div>

    <div class="mt-3">
        <h4>OS Support</h4>
        <p class="fs-5 mb-1">Windows: <?= isset($g->windows) && $g->windows ? 'Yes' : 'No' ?></p>
        <p class="fs-5 mb-1">Mac: <?= isset($g->mac) && $g->mac ? 'Yes' : 'No' ?></p>
        <p class="fs-5 mb-1">Linux: <?= isset($g->linux) && $g->linux ? 'Yes' : 'No' ?></p>
    </div>
    <?php } ?>
</div>

<?=$this->endSection();?>