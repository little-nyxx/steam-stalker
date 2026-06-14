<?= $this->extend("layout/sablona"); ?>

<?= $this->section("title"); ?>
    <title>Steam Database Stats</title>
<?=$this->endSection();?>

<?=$this->section("content"); ?>
<h1 class="text-center">Game Price Statistics</h1>
<div class="row justify-content-center mb-4">
    <div class="col-lg-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Overall summary</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Total games: <strong><?= esc($summary->total_games) ?></strong></li>
                    <li class="list-group-item">Average price: <strong>$<?= esc($summary->average_price) ?></strong></li>
                    <li class="list-group-item">Minimum price: <strong>$<?= esc($summary->min_price) ?></strong></li>
                    <li class="list-group-item">Maximum price: <strong>$<?= esc($summary->max_price) ?></strong></li>
                    <li class="list-group-item">Sum of prices: <strong>$<?= esc($summary->total_price) ?></strong></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title">Average prices by developer</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Developer</th>
                                <th class="text-end">Games</th>
                                <th class="text-end">Average price</th>
                                <th class="text-end">Min price</th>
                                <th class="text-end">Max price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($developerStats as $stats): ?>
                                <tr>
                                    <td><?= esc($stats->developer_name) ?></td>
                                    <td class="text-end"><?= esc($stats->game_count) ?></td>
                                    <td class="text-end">$<?= esc($stats->average_price) ?></td>
                                    <td class="text-end">$<?= esc($stats->min_price) ?></td>
                                    <td class="text-end">$<?= esc($stats->max_price) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?=$this->endSection();?>
