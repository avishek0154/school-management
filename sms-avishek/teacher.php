<?php include_once "includes/header.php" ?>

<div class="container">
    <div class="py-4">
        <div class="text-center h2">Teachers</div>
    </div>

    <div>
        <div>
            <?= get_message("teacher_add_success") ?>
            <?= get_message("teacher_add_fail") ?>
        </div>
        <div class="text-end mb-3"><a href="add-teacher.php" class="btn btn-primary">Add Teacher</a></div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Education</th>
                    <th>Class</th>
                    <th>Salary</th>
                    <th>Join Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $teachers = getAllData("teachers");
                    foreach($teachers as $key => $item) {
                ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['phone'] ?></td>
                        <td><?= $item['address'] ?></td>
                        <td><?= $item['education'] ?></td>
                        <td><?= getClassName($item['class_id']) ?></td>
                        <td><?= $item['salary'] ?></td>
                        <td><?= date("d-M-Y", strtotime($item['joining_date'])) ?></td>
                        <td>
                            <div class="d-flex">
                                <a href="edit-teacher.php?teacher_id=<?= $item['id'] ?>" class="btn btn-info me-3">Edit</a>
                                <a href="delete-teacher.php?teacher_id=<?= $item['id'] ?>" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>

                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

</div>

<?php include_once "includes/footer.php" ?>