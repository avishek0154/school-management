<?php include_once "includes/header.php" ?>

<div class="container">
    <div class="py-4">
        <div class="text-center h2">Classes</div>
    </div>

    <div>
        <div>
            <?= get_message("class_add_success") ?>
            <?= get_message("class_add_fail") ?>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Teacher</th>
                    <th>Pupils</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $classs = getAllData("classes");
                    foreach($classs as $key => $item) {
                ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= getTeacherName($item['id']) ?></td>
                        <td><?= getPupilsName($item['id']) ?></td>
                    </tr>

                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

</div>

<?php include_once "includes/footer.php" ?>