<?= $this->extend('layout/sablona'); ?>

<?= $this->section('content'); ?>
<h1>List of games</h1>
<table class="table">
    <?php
        $idModal = 1;

        foreach($game as $row) {
            
            $data = array(
                'class' => "btn btn-warning",
            );
            $editBtn = anchor('game/'.$row->id_game.'/edit', 'Edit', $data);
            ?>
            <tr>
                <td><?= $row->name ?></td>
                <td><a class="btn btn-warning" href="game/<?= $row->id_game?>/edit">Edit</a></td>
                <td><a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal<?=$idModal?>">Delete</a></td>
            </tr>
             <!-- The Modal -->
        <div class="modal" id="myModal<?=$idModal?>">
        <div class="modal-dialog">
            <div class="modal-content">

      <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Delete?</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

      <!-- Modal body -->
        <div class="modal-body">
            Are you sure you want to delete <strong><?=$row->name?></strong>? This action cannot be undone.
        </div>

      <!-- Modal footer -->
        <div class="modal-footer">
        <form method="post" action="<?= base_url("item/".$row->id_game."/delete") ?>">
            <input type="hidden" name="_method">
            <input type="hidden" name="id" value='"<?=$row->id_game?>"'>
            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
        </form>
        </div>

    </div>
  </div>
</div>
            <?php
            $idModal++;
        }
        ?>
        <a class="btn btn-success" href="item/add">Add Game</a>

   
        <?php
    ?>
</table>

<?php echo $pager->links(); ?>

<?=$this->endSection(); ?>