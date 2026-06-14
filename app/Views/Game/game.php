<?= $this->extend("layout/sablona"); ?>
<?= $this->section("title"); ?>
    <title>Steam Database - <?= $game->name ?></title>
<?=$this->endSection();?>

<?=$this->section("content"); ?>
<div class="row pt-3">
    <div class="col-lg-6">
        <?php 
        if ($game->photo[0] == "-") {
            $img = array(
                "src" => base_url("img/main/".$game->photo),
                'alt' => $game->name,
                'class' => 'w-100 h-100',
                'style' => 'object-fit: cover; width:100%; height:100%;'
            );
            echo img($img);
        } else {
        ?>
        <div class="position-relative" style="height:100%;">
            <img class="w-100 h-100" style="object-fit: cover; width:100%; height:100%;" src="<?=$game->photo?>" alt="<?=$game->name;?>">
        </div>
        <?php } ?>
    </div>
    <div class="col-lg-6 mt-1">
        <h1 style="text-align: left;"><?=$game->name?></h1>

        <div style="text-align: justify; overflow:hidden; max-height: 100px" class="mt-3">
            <?php if ($game->description[0] == "<") {
                echo $game->description;
            } else {?>
                <p class="card-text"><?= $game->description;?></p>
            <?php } ?>
        </div>

        <div class="mt-2">
            <p class="fs-5 mb-1">Release Date: <u><?=date("d. m. Y", strtotime($game->release_date))?></u></p>
            <p class="fs-5 mb-1">Developer: <u><?=$game->name_developer?></u></p>
            <p class="fs-5 mb-1">Publisher: <u><?=$game->name_publisher?></u></p>    
        </div>
        <p class="mt-2 card-text border d-inline-block px-2 py-1 fs-5"><strong>$<?=$game->price?></strong></p>
    </div>

    <div class="mt-3">
        <h4>OS Support</h4>
        <p class="fs-5 mb-1">Windows: <?= isset($game->windows) && $game->windows ? 'Yes' : 'No' ?></p>
        <p class="fs-5 mb-1">Mac: <?= isset($game->mac) && $game->mac ? 'Yes' : 'No' ?></p>
        <p class="fs-5 mb-1">Linux: <?= isset($game->linux) && $game->linux ? 'Yes' : 'No' ?></p>
    </div>
</div>

<?=$this->endSection();?>