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
        <span class="navbar-brand">Country</span>
        <form class="form-inline float-right">
            <input name="search" id="search" class="form-control mr-sm-2" type="search" placeholder="Search" value="<?= $search ?>">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </nav>
    <nav class="card-body">        
        <ul class="pagination justify-content-end">
            <?= $pagination ?>
        </ul>
    </nav>  
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <tr>
                    <th>CODE</th>
                    <th>NAME</th>
                    <th>CONTINENT</th>
                    <th>REGION</th>
                    <th>POPULATION</th>
                    <th>ACTION</th>
                </tr>
            <?php
                foreach ($rows as $row) :
                ?>
                <tr>
                    <td><?= $row['code'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['continent'] ?></td>
                    <td><?= $row['region'] ?></td>
                    <td><?= $row['population'] ?></td>
                    <td>
                        <a class="btn btn-info" href="<?= base_url('bootstrap/county_details/').$row['code'] ?>">Details</a> 
                    </td>
                </tr>
                <?php
                endforeach
            ?>
            </table>
        </div>
    </div>
    <nav class="card-body">        
        <ul class="pagination justify-content-end">
            <?= $pagination ?>
        </ul>
    </nav>  
</div>
<link rel="stylesheet" href="<?= base_url('assets/css/jquery-ui.css') ?>">
<script src="<?= base_url('assets/js/jquery-ui.js') ?>"></script>
<script>
  $( function() {
    $( "#search" ).autocomplete({
      source: "<?= base_url('bootstrap/county_search_ajax') ?>"
    });
  } );
  </script>