<?= $this->extend("layout/sablona"); ?>

<?= $this->section("titulek"); ?>
    <title>Add</title>
<?=$this->endSection();?>

<?=$this->section("content"); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><?=anchor("dashboard", "Dashboard") ?></li>
        <li class="breadcrumb-item active" aria-current="page">Add Game</li>
    </ol>
    </nav> 
<?php
    helper('form');?>

<div class="col-12">
    <?= form_open_multipart("item/create") ?>
        <div class="row mt-3">
            <div class="col-5">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="name" placeholder="Game Name" name="name" required>
                    <label for="name">Game Name</label>
                </div>

                <div class="mt-3">
                <div class="mb-3">
                    <select class="form-select mb-3" id="developer" name="developer" required>
                        <option value="" disabled selected required>Select developer</option>
                        <?php if (!empty($developer)): ?>
                            <?php foreach ($developer as $developerr): ?>
                                <option value="<?= esc($developerr->id_developer) ?>"><?= esc($developerr->name_developer) ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>

                    <select class="form-select" id="publisher" name="publisher" required>
                        <option value="" disabled selected required>Select publisher</option>
                        <?php if (!empty($publisher)): ?>
                            <?php foreach ($publisher as $publisherr): ?>
                            <option value="<?= esc($publisherr->id_publisher) ?>"><?= esc($publisherr->name_publisher) ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="release" class="form-label">Release Date</label>
                    <input type="date" class="form-control" id="release" name="release" required>
                </div>

                <div>
                    <h5>OS Support</h5>
                    <input type="hidden" name="windows" value="0">
                    <div class="form-check form-switch">
                        <input value="1" name="windows" class="form-check-input" type="checkbox" id="windowsSwitch">
                        <label class="form-check-label" for="windowsSwitch">Windows</label>
                    </div>

                    <input type="hidden" name="mac" value="0">
                    <div class="form-check form-switch">
                        <input value="1" name="mac" class="form-check-input" type="checkbox" id="macSwitch">
                        <label class="form-check-label" for="macSwitch">Mac</label>
                    </div>

                    <input type="hidden" name="linux" value="0">
                    <div class="form-check form-switch">
                        <input value="1" name="linux" class="form-check-input" type="checkbox" id="linuxSwitch">
                        <label class="form-check-label" for="linuxSwitch">Linux</label>
                    </div>
                </div>

                <div class="mt-3">
                    <select class="form-select mb-3" id="genre" name="genre_id" required>
                        <option value="" disabled selected required>Select genre</option>
                        <?php if (!empty($genre)): ?>
                            <?php foreach ($genre as $genree): ?>
                                <option value="<?= esc($genree->id_genre) ?>"><?= esc($genree->name) ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                </div>

                <div class="mt-3">
                    <select class="form-select mb-3" id="tag" name="tag_id" required>
                        <option value="" disabled selected required>Select tag</option>
                        <?php if (!empty($tag)): ?>
                            <?php foreach ($tag as $tagg): ?>
                                <option value="<?= esc($tagg->id_tag) ?>"><?= esc($tagg->name) ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                </div>

                <div class="mt-3">
                    <select class="form-select mb-3" id="language_text" name="language_id_text" required>
                        <option value="" disabled selected required>Select Language for Text</option>
                        <?php if (!empty($language)): ?>
                            <?php foreach ($language as $lang): ?>
                                <option value="<?= esc($lang->id_language) ?>"><?= esc($lang->name) ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                </div>

                <div class="mt-3">
                    <pre class="prettyprint">
                    var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox();</pre> <!-- Nefunkční idk proč už :C -->
                        <select multiple="multiple" id="duallistbox_demo1" class="duallistbox" name="duallistbox_demo1[]">
                        <?php if (!empty($language)): ?>
                            <?php foreach ($language as $lang): ?>
                                <option value="<?= esc($lang->id_language) ?>"><?= esc($lang->name) ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                        </select>
                        <br>
                    <script>
                        var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox();
                        $("#demoform").submit(function() {
                        alert($('[name="duallistbox_demo1[]"]').val());
                        return false;
                        });
                    </script>





                    <!-- Bootstrap Dual Listbox for selecting sound languages -->
                    <label for="language_sound" class="form-label">Select Languages for Sound</label>
                    <select multiple class="form-select duallistbox mb-3" id="language_sound" name="language_id_sound[]" required>
                        <?php if (!empty($language)): ?>
                            <?php foreach ($language as $lang): ?>
                                <option value="<?= esc($lang->id_language) ?>"><?= esc($lang->name) ?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                </div>
            </div>
            <div class="col-7">
                <div class="ms-2">
                    <div>
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept=".jpg, .png, .jpeg, .svg" required>
                    </div>
                </div>

                

                <div class="mt-3 ms-2">
                    <label for="age" class="form-label">Required Age</label>
                    <input type="number" class="form-control" id="age" name="age" required min="0" max="21" step="1">
                </div>

                <div class="mt-3 ms-2">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" required min="0" step="0.01" required>
                </div>

                <div class="mt-3 ms-2">
                    <label for="achievements" class="form-label">Number of Achievements</label>
                    <input type="number" class="form-control" id="achievements" name="achievements" required min="0" max="100" step="1" required>
                </div>




                <div class="form-floating mb-3 mt-3 ms-2">
                    <input type="text" class="form-control" id="website" placeholder="Website" name="website" required>
                    <label for="website">Website</label>
                </div>

                <div class="form-floating mb-3 mt-3 ms-2">
                    <input type="text" class="form-control" id="email" placeholder="Email" name="email" required>
                    <label for="email">Email</label>
                </div>


            </div>
        </div>
        <div class="my-3"> 
            <div class="form-floating my-3">
                <h5>Description</h5>
                <textarea id="text" name="text" class="p-5" value="text" rows="25" cols="50"></textarea>
            </div>
        </div>

        <button class="btn btn-success mt-3 mb-3" style="float: right;" type="submit">Submit</button>
    <?= form_close() ?>
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

<?=$this->endSection();?>
