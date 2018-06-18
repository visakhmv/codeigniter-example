<div class="col-sm-10">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('bootstrap/country') ?>">Countries</a></li>
            <li class="breadcrumb-item active" aria-current="page">Country Details</li>
        </ol>
    </nav>
    <p class="h3">Country</p>
    <div class="row card-body">
        <dt class="col-sm-3">Code</dt class="col-sm-3">
        <dd class="col-sm-9"><?= $row['Code'] ?></dd class="col-sm-9">
        <dt class="col-sm-3">Name</dt class="col-sm-3">
        <dd class="col-sm-9"><?= $row['Name'] ?></dd class="col-sm-9">
        <dt class="col-sm-3">Continent</dt class="col-sm-3">
        <dd class="col-sm-9"><?= $row['Continent'] ?></dd class="col-sm-9">
        <dt class="col-sm-3">Region</dt class="col-sm-3">
        <dd class="col-sm-9"><?= $row['Region'] ?></dd class="col-sm-9">
        <dt class="col-sm-3">Surface Area</dt class="col-sm-3">
        <dd class="col-sm-9"><?= $row['SurfaceArea'] ?></dd class="col-sm-9">
        <dt class="col-sm-3">Population</dt class="col-sm-3">
        <dd class="col-sm-9"><?= $row['Population'] ?></dd class="col-sm-9">
        <dt class="col-sm-3">Life Expectancy</dt class="col-sm-3">
        <dd class="col-sm-9"><?= $row['LifeExpectancy'] ?></dd class="col-sm-9">
        <dt class="col-sm-3">Local Name</dt class="col-sm-3">
        <dd class="col-sm-9"><?= $row['LocalName'] ?></dd class="col-sm-9">
        <dt class="col-sm-3">Languages</dt class="col-sm-3">
        <dd class="col-sm-9">
        <?php
            foreach ($languages as $language) :
        ?>
            <?= $language['Language'] ?>(<?= $language['Percentage'] ?>%)<?= ($language['IsOfficial']=='T')?'<span class="badge badge-primary">Official</span>':'' ?>, 
        <?php
            endforeach
        ?>
        </dd class="col-sm-9">
    </div>
    <p class="h3">Cities</p>
    <div class="card-body">
        <table class="table" id="details_table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>District</th>
                    <th>Population</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($cities as $city) :
            ?>
                <tr>
                    <td><?= $city['Name'] ?></td>
                    <td><?= $city['District'] ?></td>
                    <td><?= $city['Population'] ?></td>
                </tr>
            <?php
                endforeach
            ?>
            </tbody>
        </table>
    </div>
</div>
<link href="<?= base_url('assets/css/jquery.dataTables.min.css')?>" rel="stylesheet" />
<script src="<?= base_url('assets/js/jquery.dataTables.min.js')?>"></script>
<script>
$(document).ready(function(){
    $('#details_table').DataTable();
});
</script>