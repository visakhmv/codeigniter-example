<body>
    <div class="container-fluid">
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Bootstrap</a>
        </nav>
        <div class="row">
            <div class="col-sm-2">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('bootstrap/register') ?>">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('bootstrap/display') ?>">Display</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('bootstrap/country') ?>">Country</a>
                    </li>
                    <?php
                    if($this->session->userdata('id')):
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('bootstrap/logout') ?>">Logout (<?= $this->session->userdata('name') ?>)</a>
                    </li>
                    <?php
                    else:
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('bootstrap/login') ?>">Login</a>
                    </li>
                    <?php
                    endif
                    ?>
                </ul>
            </div>
