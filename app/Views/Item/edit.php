<?= $this->extend('layout/sablona'); ?>

<?= $this->section('content'); ?>
<?php
$img = array(
    "src" => $game->photo,
    "class" => "p-3",
);
 ?>
<form  method="post" action="<?= base_url("item/update") ?>">
    <div class="row mt-3">
            <div class="col-5">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="name" placeholder="Game Name" name="name" required value="<?= $game->name ?>">
                    <label for="name">Game Name</label>
                </div>

                

                <div class="mb-3">
                    <label for="release" class="form-label">Release Date</label>
                    <input type="date" class="form-control" id="release" name="release" required value="<?= $game->release_date ?>">
                </div>

                <div>
                    <h5>OS Support</h5>
                    <input type="hidden" name="windows" value="0">
                    <div class="form-check form-switch">
                        <input value="<?= $game->windows ?>" name="windows" class="form-check-input" type="checkbox" id="windowsSwitch" <?php
    if($game->windows == 1) { echo "checked";}?>>
                        <label class="form-check-label" for="windowsSwitch">Windows</label>
                    </div>

                    <input type="hidden" name="mac" value="0">
                    <div class="form-check form-switch">
                        <input value="<?= $game->mac ?>" name="mac" class="form-check-input" type="checkbox" id="macSwitch" <?php
    if($game->mac == 1) { echo "checked";}?>>
                        <label class="form-check-label" for="macSwitch">Mac</label>
                    </div>

                    <input type="hidden" name="linux" value="0">
                    <div class="form-check form-switch">
                        <input value="<?= $game->linux ?>" name="linux" class="form-check-input" type="checkbox" id="linuxSwitch" <?php
    if($game->linux == 1) { echo "checked";}?>>
                        <label class="form-check-label" for="linuxSwitch">Linux</label>
                    </div>
                </div>

                

                
            </div>
            <div class="col-7">
                <!-- <div class="ms-2">
                    <div>
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept=".jpg, .png, .jpeg, .svg" required>
                    </div>
                </div> -->

                

                <div class="mt-3 ms-2">
                    <label for="age" class="form-label">Required Age</label>
                    <input type="number" class="form-control" id="age" name="age" required min="0" max="21" step="1" value="<?= $game->required_age ?>">
                </div>

                <div class="mt-3 ms-2">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" required min="0" step="0.01" required value="<?= $game->price ?>">
                </div>

                <div class="mt-3 ms-2">
                    <label for="achievements" class="form-label">Number of Achievements</label>
                    <input type="number" class="form-control" id="achievements" name="achievements" required min="0" max="100" step="1" value="<?= $game->achievements ?>">
                </div>




                <div class="form-floating mb-3 mt-3 ms-2">
                    <input type="text" class="form-control" id="website" placeholder="Website" name="website" value="<?= $game->website ?>">
                    <label for="website">Website</label>
                </div>

                <div class="form-floating mb-3 mt-3 ms-2">
                    <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?= $game->email ?>">
                    <label for="email">Email</label>
                </div>


            </div>
        </div>
        <div class="my-3"> 
            <div class="form-floating my-3">
                <h5>Description</h5>
                <textarea id="text" name="text" class="p-5" value="text" rows="25" cols="50"><?= $game->description ?></textarea>
            </div>
        </div>

        <button class="btn btn-success mt-3 mb-3" style="float: right;" type="submit">Submit</button>
    
</div>

<script>
    tinymce.init({
        license_key: "gpl",
        toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright | bullist numlist outdent indent | link image table | code',
        selector: 'textarea#text',
        plugins: 'a_tinymce_plugin',
        toolbar: 'template',
        promotion: false,
        a_plugin_option: true,
        a_configuration_option: 400
    });
</script>
    
    <button type="submit" class="btn btn-primary">Edit</button>
    <input type="hidden" name="id" value="<?= $game->id_game ?>">
    <input type="hidden" name="_method" value="PUT">
</form>

<?=$this->endSection(); ?>