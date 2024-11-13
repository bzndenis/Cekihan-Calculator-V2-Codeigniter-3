<?php $this->load->view('game/datalist'); ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center text-white">Permainan Berlangsung</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-white">
                            <thead>
                                <tr>
                                    <th>Nama Pemain</th>
                                    <th>Skor Saat Ini</th>
                                    <th>Tambah Skor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $players = $this->session->userdata('players');
                                $scores = $this->session->userdata('scores');
                                if($players): 
                                    foreach($players as $player): 
                                ?>
                                <tr>
                                    <td><?= $player ?></td>
                                    <td><?= isset($scores[$player]['total']) ? $scores[$player]['total'] : 0 ?></td>
                                    <td>
                                        <form action="<?= base_url('game/add_score') ?>" method="POST" class="form-inline">
                                            <input type="hidden" name="player" value="<?= $player ?>">
                                            <input type="number" name="points" class="form-control form-control-sm" list="textminlist" 
                                                value="<?= isset($scores[$player]['last_points']) ? $scores[$player]['last_points'] : '' ?>" required
                                                onfocus="this.value=''">
                                            <button type="submit" class="btn btn-sm btn-primary ml-2">Hitung</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php 
                                    endforeach; 
                                endif; 
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="nav-bottom">
                        <a href="<?= base_url('game/result') ?>" class="btn btn-danger btn-lg btn-block">Akhiri Permainan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>