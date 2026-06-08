<?php

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

