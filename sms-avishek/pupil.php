<?php include_once "includes/header.php" ?>

<div class="container">
    <div class="py-4">
        <div class="text-center h2">Pupils</div>
    </div>

    <div>
        <div>
            <?= get_message("pupil_add_success") ?>
            <?= get_message("pupil_add_fail") ?>
        </div>
        <div class="text-end mb-3"><a href="add-pupil.php" class="btn btn-primary">Add Pupil</a></div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Medical Info</th>
                    <th>Class</th>
                    <th>Gurdian</th>
                    <th>Admit Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $pupils = getAllData("pupils");
                    foreach($pupils as $key => $item) {
                ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['address'] ?></td>
                        <td><?= $item['medical_info'] ?></td>
                        <td><?= getClassName($item['class_id']) ?></td>
                        <td><?= getGurdianName($item['gurdian_id']) ?></td>
                        <td><?= date("d-M-Y", strtotime($item['admit_date'])) ?></td>
                        <td>
                            <div class="d-flex">
                                <a href="edit-pupil.php?pupil_id=<?= $item['id'] ?>" class="btn btn-info me-3">Edit</a>
                                <a href="delete-pupil.php?pupil_id=<?= $item['id'] ?>" class="btn btn-danger">Delete</a>
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