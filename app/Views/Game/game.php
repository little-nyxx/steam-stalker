<?= $this->extend("layout/sablona"); ?>
<?= $this->section("title"); ?>
    <title>Steam Database</title>
<?=$this->endSection();?>

<?=$this->section("content"); ?>

<div class="row pt-3">
    <div class="col-lg-6">
        <div class="position-relative" style="height:100%;">
            <img class="w-100 h-100" style="object-fit: cover; width:100%; height:100%;" src="<?=$game->photo?>" alt="<?=$game->name;?>">
        </div>
    </div>
    <div class="col-lg-6 mt-1">
        <h1 style="text-align: left;"><?=$game->name?></h1>

        <div style="text-align: justify; overflow:hidden; max-height: 100px" class="mt-3">
           <p class="card-text"><?= $game->description;?></p>
        </div>

        <div class="mt-2">
            <p class="fs-5 mb-1">Release Date: <u><?=date("d. m. Y", strtotime($game->release_date))?></u></p>
            <p class="fs-5 mb-1">Developer: <u><?=$game->name_developer?></u></p>
            <p class="fs-5 mb-1">Publisher: <u><?=$game->name_publisher?></u></p>    
        </div>
        <p class="mt-2 card-text border d-inline-block px-2 py-1 fs-5"><strong>$<?=$game->price?></strong></p>
        
    </div> <!-- přidat ještě výpis dalších informací z db (stránku, email, min věk -> pokud je třeba, zda podporuje win, mac a linux, počet achievementů) => udělá Lexa -->
</div>

<?=$this->endSection();?>