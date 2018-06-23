
    <form action="" method="post">
        <input type="text" name="name" placeholder="Name" ><br>
        <select name="course" >
        <?php
        foreach ($courses as $course) :
            ?>
            <option value="<?= $course['course_id'] ?>"><?= $course['course_name'] ?></option>
            <?php
        endforeach
        ?>
        </select><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>