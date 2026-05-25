<?= $this->extend("layout/sablona"); ?>
<?= $this->section("title"); ?>
    <title>Steam Database</title>
<?=$this->endSection();?>

<?=$this->section("content"); ?>
<div class="col">
        <div class="position-relative" style="height:100%;">
            <img class="w-100 h-100" style="object-fit: cover; width:100%; height:100%;" src="<?=$game->photo?>" alt="<?=$game->name;?>">
        </div>
    </div>
        <h1 style="text-align: left;"><?= $game->name?></h1>
        <h2 class="py-2"><?=$game->name_developer?></h2> 
        
        <p class="d-inline-block py-2"><?=date("d. m. Y", strtotime($game->release_date))?></p>

        <div style="text-align: justify; ">
           <?= $game->description?>
        </div>
        <div class="mt-3">
                <p class="border d-inline-block fs-4 fw-bold px-3 py-2">$<?= $game->price?></p>
            </div>

<?=$this->endSection();?>