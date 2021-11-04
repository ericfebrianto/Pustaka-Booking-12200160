<?= $this->extend('dasar_tampilan'); ?>
<?= $this->section('isiweb') ?>
<?php

use Config\Services;

$vd = $vd ?? Services::validation();
?>

<form method="POST" action="<?= base_url('/login') ?>">
 <div class="container col-md-3">
        <div class="card mt-5">
            <div class="card-header">
                <h3 class="card-title">Login</h3>
            </div>

            <div class="card-body">
                <?php if ($error) { ?>
                    <div class='alert alert-danger'>
                        <?= $error ?>
                    </div>
                <?php } ?>

                <div class="form-floating">
                    <input id="txtEmail" class="form-control" placeholder="Email" value="<?= $email ?? '' ?>" type="text" name="email" />
                    <label for="txtPass">Email</label>
               
                    <?php if ($vd->getError('email')) { ?>
                        <div class="alert alert-danger">
                            <?php
                            echo $vd->getError('email');
                            ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="form-floating">
                    <input id="txtPass" class="form-control" placeholder="Password" value="<?= $sandi ?? '' ?>" type="password" name="sandi" />
                    <label for="txtPass">Kata Sandi</label>
                    <?php if ($vd->getError('sandi')) { ?>
                        <div class="alert alert-danger">
                            <?php
                            echo $vd?->getError('sandi');
                            ?>
                        </div>
                    <?php } ?>
                </div>
                <button class="btn btn-primary mt-2">Login</button>
            </div>
        </div>
    </div>
</form>
<?= $this->endSection() ?>