<?= $this->extend("layout/sablona"); ?>

<?= $this->section("title"); ?>
    <title>Steam Database</title>
<?=$this->endSection();?>

<?=$this->section("content"); ?>

<div class="row pt-3">
    <div class="col-lg-6">
        <div class="position-relative" style="height:100%;">
            <img class="w-100 h-100" style="object-fit: cover; width:100%; height:100%;" src="<?=$game[0]->photo?>" alt="<?=$game[0]->name;?>">
        </div>
    </div>
    <div class="col-lg-6 mt-2">
        <h1 style="text-align: left;"><?= $game[0]->name;?></h1>
        <h2 class="py-2"><?=$game[0]->name_developer;?></h2>
        <p class="d-inline-block py-2"><?=date("d. m. Y", strtotime($game[0]->release_date))?></p>

        <div style="text-align: justify; overflow:hidden; max-height: 100px">
           <?= $game[0]->description;?>
           <div class="mt-3">
                <p class="border d-inline-block fs-4 fw-bold px-3 py-2">$<?= $game[0]->price;?></p>
            </div>
        </div>
    </div>
</div>


<div class="row row-cols-1 row-cols-md-4 mt-4">
    <?php
    unset($game[0]);
    foreach($game as $g) {
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <div class="card h-100">
                <img src="<?=$g->photo?>" class="card-img-top" alt="<?=$g->name?>">
                <div class="card-body">
                    <h5 class="card-title"><?=$g->name?></h5>
                    <h6><?=$g->name_developer;?></h6>
                    <p class="card-text border d-inline-block px-2 py-1"><strong>$<?=$g->price?></strong></p>
                </div>
            </div>  
        </div>
        <?php
    }
?>
</div>

<?php echo $pager->links(); ?>


<?=$this->endSection();?>