<?= $this->extend("layout/sablona"); ?>
<?= $this->section("title"); ?>
    <title>Steam Database - Choose Games</title>
<?=$this->endSection();?>

<?=$this->section("content"); ?>
<?php

?>
<div class="row pt-3">
    <?= form_open_multipart('game', ['id' => 'gameForm']) ?>
    <h2>Choose a game</h2>
    <select multiple="multiple" id="duallistbox_game" class="duallistbox" name="duallistbox_game[]">
        <?php if (!empty($game)): ?>
            <?php foreach ($game as $g): ?>
                <option value="<?= esc($g->id_game) ?>"><?= esc($g->name) ?></option>
            <?php endforeach ?>
        <?php endif ?>
    </select>
    <script style="display: none;">
        var selectt = $('select[name="duallistbox_game[]"]').bootstrapDualListbox();
        $("#gameForm").submit(function() {
            var selected = $('[name="duallistbox_game[]"]').val() || [];
            if (selected.length !== 2) {
                alert('Please select exactly 2 games.');
                return false;
            }
            var actionUrl = '<?= site_url('game') ?>/' + encodeURIComponent(selected[0]) + '/' + encodeURIComponent(selected[1]);
            $(this).attr('action', actionUrl);
            return true;
        });
    </script>
    <button class="btn btn-success mt-3 mb-3" style="float: right;" type="submit">Submit</button>
<?= form_close() ?>
</div>

<?=$this->endSection();?>