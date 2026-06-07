<?= $this->extend("layout/sablona"); ?>

<?= $this->section("titulek"); ?>
    <title>Add</title>
<?=$this->endSection();?>

<?=$this->section("content"); 
helper('form');?>

<div class="col-12">
    <?= form_open_multipart("item/create") ?>
    <form method="post" action="<?= base_url("item/create") ?>" class="mt-3">

        <div class="row mt-3">
            <div class="col-5">
                <div class="form-floating mb-3 mt-3">
                    <input type="name" class="form-control" id="name" placeholder="Game Name" name="name" required>
                    <label for="name">Game Name</label>
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

            </div>
            <div class="col-7">
                <div class="ms-2">
                    <div>
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept=".jpg, .png, .jpeg, .svg" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-3"> 
            <div class="form-floating my-3">
                <h5>Description</h5>
                <textarea id="text" name="text" class="p-5" value="text" rows="25" cols="50"></textarea>
            </div>
        </div>

        <button class="btn btn-success mt-3 mb-3" style="float: right;" type="submit"><i class="fa-solid fa-paper-plane"></i> Odeslat</button>
    </form>
</div>

<script>
    tinymce.init({
        license_key: "gpl",
        toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright | bullist numlist outdent indent | link image table | code',
        selector: 'textarea#text',
        plugins: 'a_tinymce_plugin',
        toolbar: 'template',
        a_plugin_option: true,
        a_configuration_option: 400
    });
</script>

<?=$this->endSection();?>
