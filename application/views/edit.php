    <form action="" method="post">
        <input disabled type="text" name="name" placeholer="ID" value="<?= $row['id'] ?>" ><br>
        <input type="text" name="name" placeholer="Name" value="<?= $row['name'] ?>" ><br>
        <input type="text" name="email" placeholer="Email" value="<?= $row['email'] ?>" ><br>
        <input type="text" name="phone" placeholer="Phone" value="<?= $row['phone'] ?>" ><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>