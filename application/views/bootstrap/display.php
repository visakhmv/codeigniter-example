<div class="col-sm-10">
    <?php
    if($msg):
    ?>
    <div class="alert alert-success">
        <?= $msg ?>
    </div>
    <?php
    endif
    ?>
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand">Display</span>
        <form class="form-inline float-right">
            <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" value="<?= $search ?>">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </nav>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            <?php
                foreach ($rows as $row) :
            ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td>
                        <a class="btn btn-primary" href="<?= base_url('bootstrap/edit/').$row['id'] ?>">Edit</a> 
                        <a onclick="return confirm('Are you sure?');" class="btn btn-warning" href="<?= base_url('bootstrap/delete/').$row['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php
                endforeach
            ?>
            </table>
        </div>
    </div>
</div>