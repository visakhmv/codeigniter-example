<body>
    <div class="container-fluid">
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Bootstrap</a>
        </nav>
        <div class="row">
            <div class="col-md-2">
                <div class="list-group list-group-flush">
                    <a href="<?= base_url('bootstrap/register') ?>" class="list-group-item list-group-item-action">
                        Register
                    </a>
                    <a href="<?= base_url('bootstrap/display') ?>" class="list-group-item list-group-item-action">
                        Display
                    </a>
                    <a href="<?= base_url('bootstrap/country') ?>" class="list-group-item list-group-item-action">
                        Country
                    </a>
                    <?php
                    if($this->session->userdata('id')):
                    ?>
                    <a href="<?= base_url('bootstrap/logout') ?>" class="list-group-item list-group-item-action">
                        Logout (<?= $this->session->userdata('name') ?>)
                    </a>
                    <?php
                    else:
                    ?>
                    <a href="<?= base_url('bootstrap/login') ?>" class="list-group-item list-group-item-action">
                        Login
                    </a>
                    <?php
                    endif
                    ?>
                </div>
            </div>
