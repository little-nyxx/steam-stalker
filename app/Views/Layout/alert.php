<?php if (session()->has('success')): ?>
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert" style="background-color: #2e7d32; color: #fff;">
                <?= esc(session()->getFlashdata('success')) ?>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Zavřít"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->has('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert" style="background-color: #c62828; color: #fff;">
                <?= esc(session()->getFlashdata('error')) ?>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Zavřít"></button>
            </div>
        <?php endif; ?>

<?php
/*
function makeMessage($status, $type) {
        $result = new \stdClass();
        if($status) {
            $result->class = "success";
            $shortType = $type."success";
        } else {
            $result->class = "danger";
            $shortType = $type."danger";
        }
        $result->message = $this->config->errorMessage[$shortType];
        return $result;
}







/*

$alert = session()->getFlashdata('alert');
if (empty($alert) || !is_array($alert)) {
    return;
}
$type        = $alert['type'] ?? 'info';
$alertTitle       = $alert['alertTitle'] ?? null;
$message     = $alert['message'] ?? '';
$dismissible =  $alert['dismissible'] ?? true;

$allowedTypes = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];

if (!in_array($type, $allowedTypes, true)) {
    $type = 'info';
}
$classes = 'alert alert-' . esc($type);

if ($dismissible) {
    $classes .= ' alert-dismissible fade show';
}


if ($message){
    ?>
    <div class="<?= $classes ?>" role="alert">
        <?php
            if ($dismissible) {
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Zavřít"></button>
    <?php
            }
    if ($title) {
        echo "<strong>".esc($title)."</strong> ".esc($message);
     } else {
        echo esc($message);
     }
     echo "</div>";
}
*/
