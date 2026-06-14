<?= $this->extend('layout/sablona'); ?>

<?= $this->section("title"); ?>
    <title>Steam Database - Edit Game <?= $game->name ?></title>
<?=$this->endSection();?>

<?= $this->section('content'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><?=anchor("dashboard", "Dashboard") ?></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $game->name ?></li>
    </ol>
    </nav> 
<?php
    helper('form');
?>

<div class="col-12">
    <?= form_open_multipart("item/update/".$game->id_game) ?>
    <div class="row mt-3">
            <div class="col-5">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="name" placeholder="Game Name" name="name" required value="<?= $game->name ?>">
                    <label for="name">Game Name</label>
                </div>

                <div class="mt-3">
                <div class="mb-3">
                    <select class="form-select mb-3" id="developer" name="developer" required>
                        <option value="" disabled selected required>Select developer</option>
                        <?php if (!empty($developer)): ?>
                            <?php foreach ($developer as $developerr): ?>
                                <option value="<?= esc($developerr->id_developer) ?>" <?php if ($game->developer_id == $developerr->id_developer) echo 'selected'; ?>><?= esc($developerr->name_developer) ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>

                    <select class="form-select" id="publisher" name="publisher" required>
                        <option value="" disabled selected required>Select publisher</option>
                        <?php if (!empty($publisher)): ?>
                            <?php foreach ($publisher as $publisherr): ?>
                            <option value="<?= esc($publisherr->id_publisher) ?>" <?php if ($game->publisher_id == $publisherr->id_publisher) echo 'selected'; ?>><?= esc($publisherr->name_publisher) ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="release" class="form-label">Release Date</label>
                    <input type="date" class="form-control" id="release" name="release" required value="<?= date('Y-m-d', strtotime($game->release_date)) ?>">
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

                <div class="mt-3">
                    <h5>Genres</h5>
                    <select multiple="multiple" id="duallistbox_genres" class="duallistbox" name="duallistbox_genres[]">
                        <?php if (!empty($genre)): ?>
                            <?php foreach ($genre as $g): ?>
                                <option value="<?= esc($g->id_genre) ?>" <?php if (in_array($g->id_genre, array_column($game_genre, 'genre_id_genre'))) echo 'selected'; ?>><?= esc($g->name) ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                    <script style="display: none;">
                        var sound = $('select[name="duallistbox_genres[]"]').bootstrapDualListbox();
                        $("#demoform").submit(function() {
                        alert($('[name="duallistbox_genres[]"]').val());
                        return false;
                        });
                    </script>

                    <h5 class="mt-2">Tags</h5>
                    <select multiple="multiple" id="duallistbox_tags" class="duallistbox" name="duallistbox_tags[]">
                        <?php if (!empty($tag)): ?>
                            <?php foreach ($tag as $t): ?>
                                <option value="<?= esc($t->id_tag) ?>" <?php if (in_array($t->id_tag, array_column($game_tag, 'tag_id_tag'))) echo 'selected'; ?>><?= esc($t->name) ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                    <script style="display: none;">
                        var sound = $('select[name="duallistbox_tags[]"]').bootstrapDualListbox();
                        $("#demoform").submit(function() {
                        alert($('[name="duallistbox_tags[]"]').val());
                        return false;
                        });
                    </script>
            </div>


                <div class="mt-3">
                    <h5>Languages</h5>
                    <h6>Sound</h6>
                    <select multiple="multiple" id="duallistbox_lang_sound" class="duallistbox" name="duallistbox_lang_sound[]">
                        <?php if (!empty($language)): ?>
                            <?php foreach ($language as $lang): ?>
                                <option value="<?= esc($lang->id_language) ?>" <?php if (in_array($lang->id_language, array_column($game_language_sound, 'language_id_language'))) echo 'selected'; ?>><?= esc($lang->name) ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                    <script style="display: none;">
                        var sound = $('select[name="duallistbox_lang_sound[]"]').bootstrapDualListbox();
                        $("#demoform").submit(function() {
                        alert($('[name="duallistbox_lang_sound[]"]').val());
                        return false;
                        });
                    </script>

                    <h6 class="mt-2">Text</h6>
                    <select multiple="multiple" id="duallistbox_lang_text" class="duallistbox" name="duallistbox_lang_text[]">
                        <?php if (!empty($language)): ?>
                            <?php foreach ($language as $lang): ?>
                                <option value="<?= esc($lang->id_language) ?>" <?php if (in_array($lang->id_language, array_column($game_language_text, 'language_id_language'))) echo 'selected'; ?>><?= esc($lang->name) ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                    <script style="display: none;">
                        var sound = $('select[name="duallistbox_lang_text[]"]').bootstrapDualListbox();
                        $("#demoform").submit(function() {
                        alert($('[name="duallistbox_lang_text[]"]').val());
                        return false;
                        });
                    </script>
            </div>

            <div class="col-7">
                <div class="ms-2">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" class="form-control" id="photo" name="photo" accept=".jpg, .png, .jpeg, .svg">
                    <?php
                    if ($game->photo[0] == "-") {
                        $img = array(
                            "src" => base_url('img/main/'.$game->photo),
                            "class" => "w-100 mt-2",
                            "alt" => $game->name,
                        );
                        echo img($img);
                    } else { ?>
                        <img class="w-100 mt-2" src="<?= $game->photo ?>" alt="<?= $game->name ?>">
                    <?php } ?>
                </div>

                

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
<?= form_close() ?>
<div>

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
    


<?=$this->endSection(); ?>