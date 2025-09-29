<body class="d-flex flex-column bg-gradient-primary min-vh-100">
<nav class="navbar navbar-expand-lg navbar-light text-white">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">
            <?php if(false) : ?>
                <img src="https://cdn-icons-png.flaticon.com/512/2125/2125009.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
            <?php endif; ?>

            Pimp My Log!</a>
        <form class="t-data" method="post">

        </form>

        <input type="hidden" class="t-element" name="" value="">

        <div class="dropdown float-right" style="min-width: 250px; display: contents;">
            <div>
                <span data-bs-toggle="modal" data-bs-target="#exampleModal" class="m-1 qr-button" role="button"><i class="fas fa-qrcode m-1"></i>QR</span>
                <?php if(isset($_POST['user_t_id'])) : ?>

                    <span data-bs-toggle="modal" class=" m-1">👋🏼 <?= $_POST['name'];?>!</span>
                    <span role="button" data-bs-toggle="dropdown" >Menù</span>
                <?php endif; ?>


                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" data-bs-popper="none">
                    <b><li class="dropdown-header text-primary">Menù</li></b>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#auth-data"><?=$translations['header_menu_view_auth'];?></a></li>
                    <li><a class="dropdown-item text-danger logout-button"href="https://pimpmylog.it/logout">Logout</a></li>
                </ul>
            </div>


        </div>
        <div class="modal fade" id="auth-data" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary" id="exampleModalLabel"><?= $translations['header_auth_data'];?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="margin:10px;">
                            <div class="col-md-12">
                                <label for="t-token" class="form-label text-dark">Telegram Token</label>
                                <input type="text" class="form-control mb-2" id="t-token" disabled="" value="<?= $logged_user['telegram_token'];?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><?= $translations['header_condition_text_cancel'];?></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content qr-modal">
                    <div class="modal-body">
                        <div class="row" style="margin:10px;">

                        <?= $this->Html->image('t_qr.webp');?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
