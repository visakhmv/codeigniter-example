
    <hr>
    <table border=1>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>COURSE</th>
        </tr>
    <?php
        foreach ($rows as $row) :
    ?>
        <tr>
            <td><?= $row['student_id'] ?></td>
            <td><?= $row['student_name'] ?></td>
            <td><?= $row['course_name'] ?></td>
        </tr>
    <?php
        endforeach
    ?>
    </table>
</body>
</html>