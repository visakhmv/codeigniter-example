    <form action="" method="get">
        <input type="text" name="search" placeholder="Search" value="<?= $search ?>" >
        <button type="submit">Search</button>
    </form>
    <hr>
    <table border=1>
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
                <a href="<?= base_url('visakh/edit/').$row['id'] ?>">Edit</a> |
                <a href="<?= base_url('visakh/delete/').$row['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php
        endforeach
    ?>
    </table>
</body>
</html>