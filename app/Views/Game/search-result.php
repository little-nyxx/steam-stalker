<?= $this->extend("layout/sablona"); ?>

<?= $this->section("title"); ?>
    <title>Steam Database</title>
<?=$this->endSection();?>

<?=$this->section("content"); ?>
<h1 class="text-center">Search results for "<?= esc($search) ?>"</h1>
<div class="row row-cols-1 row-cols-md-4 mt-4">
    <?php
    foreach($game as $g) {
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <div class="card h-100">
                <img src="<?=$g->photo?>" class="card-img-top" alt="<?=$g->name?>">
                <div class="card-body">
                    <h5 class="card-title"><?= anchor('game/' . $g->id_game, $g->name) ?></h5>
                    
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