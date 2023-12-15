<?php include_once "includes/header.php" ?>

<div class="container">
    <div class="py-4">
        <div class="text-center h2">Gurdians</div>
    </div>

    <div>
        <div>
            <?= get_message("gurdian_add_success") ?>
            <?= get_message("gurdian_add_fail") ?>
        </div>
        <div class="text-end mb-3"><a href="add-gurdian.php" class="btn btn-primary">Add Gurdian</a></div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Pupil</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $gurdians = getAllData("gurdians");
                    foreach($gurdians as $key => $item) {
                ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['phone'] ?></td>
                        <td><?= $item['email'] ?></td>
                        <td><?= $item['address'] ?></td>
                        <td><?= getPupilName($item['pupil_id']) ?></td>
                        <td>
                            <div class="d-flex">
                                <a href="edit-gurdian.php?gurdian_id=<?= $item['id'] ?>" class="btn btn-info me-3">Edit</a>
                                <a href="delete-gurdian.php?gurdian_id=<?= $item['id'] ?>" class="btn btn-danger">Delete</a>
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