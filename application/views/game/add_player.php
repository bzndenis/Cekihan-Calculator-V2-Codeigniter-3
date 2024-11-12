<div class="container mb-5 pb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-center mb-5 mt-4">
                <h1 class="display-4 font-weight-bold">Cekihan GASS</h1>
                <p class="lead">Mulai permainan dengan menambahkan pemain</p>
            </div>
            
            <div class="card">
                <div class="card-body p-4">
                    <?php echo form_open('game/add_player', ['class' => 'mb-4']); ?>
                        <div class="form-group">
                            <input type="text" name="player_name" class="form-control form-control-lg" placeholder="Nama Pemain" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            <i class="fas fa-plus-circle mr-2"></i> Tambah Pemain
                        </button>
                    <?php echo form_close(); ?>
                    
                    <div class="mt-4">
                        <h4 class="mb-3">Daftar Pemain</h4>
                        <div class="list-group">
                            <?php 
                            $players = $this->session->userdata('players');
                            if($players): 
                                foreach($players as $index => $player): 
                            ?>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="h5 mb-0"><?= $player ?></span>
                                    <a href="<?= site_url('game/delete_player/'.$index) ?>" class="btn btn-danger btn-sm rounded-circle">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </div>
                            <?php 
                                endforeach; 
                            endif; 
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if(!empty($players)): ?>
                <div class="nav-bottom">
                    <a href="<?= site_url('game/play') ?>" class="btn btn-primary btn-lg btn-block">
                        Mulai Bermain
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>