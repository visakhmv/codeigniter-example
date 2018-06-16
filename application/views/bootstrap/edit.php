<div class="col-sm-10">
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand">Edit</span>
    </nav>
    <div class="row">
        <div class="col-sm-6">
            <form class="card-body" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID</label>
                    <input readonly name="id" type="text" class="form-control" placeholder="Enter name" value="<?= $row['id'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Enter name" value="<?= $row['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="email" class="form-control" placeholder="Enter email" value="<?= $row['email'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone number</label>
                    <input name="phone" type="phone" class="form-control" placeholder="Enter phone number" value="<?= $row['phone'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>