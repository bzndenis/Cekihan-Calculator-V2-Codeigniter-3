<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Hasil Permainan</h3>
                </div>
                <div class="card-body">
                    <?php
                    $scores = $this->session->userdata('scores');
                    if($scores):
                        $min_score = min($scores);
                        $winners = array_keys($scores, $min_score);
                    ?>
                        <h4 class="text-center">Si Paling Erte:</h4>
                        <?php foreach($winners as $winner): ?>
                            <h2 class="text-center text-success"><?= is_array($winner) ? implode(', ', $winner) : $winner ?></h2>
                            <p class="text-center">Dengan skor: <?= is_array($scores[$winner]) ? $scores[$winner]['total'] : $scores[$winner] ?></p>
                        <?php endforeach; ?>

                        <h4 class="mt-4">Skor Akhir:</h4>
                        <table class="table text-white">
                            <thead>
                                <tr>
                                    <th>Pemain</th>
                                    <th>Skor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($scores as $player => $score): ?>
                                    <tr>
                                        <td><?= is_array($player) ? implode(', ', $player) : $player ?></td>
                                            <td>
                                                <?= is_array($score) ? $score['total'] : $score ?>
                                            <?php if($score == max($scores)): ?>
                                                <i class="fas fa-crown text-warning"></i>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>

                    <div class="text-center mt-3">
                        <form method="post" action="<?= base_url('game/reset_scores') ?>">
                            <button type="submit" name="play_again" class="btn btn-primary">Main Lagi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
