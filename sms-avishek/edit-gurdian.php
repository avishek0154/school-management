<?php include_once "includes/header.php" ?>

<div class="container">
    <div class="py-4">
        <div class="text-center h2">Edit Gurdian</div>
    </div>

    <?php
        $item = getOneData("gurdians", $_GET['gurdian_id'])
    ?>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="">
                <input type="hidden" name="table_id" value="<?= $_GET['gurdian_id'] ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $item['name'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?= $item['phone'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $item['email'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?= $item['address'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label">Pupil:</label>
                    <select name="pupil_id" id="pupil_id" class="form-control">
                        <option value="">- Select Pupil -</option>
                        <?php 
                            $pupils = getAllData("pupils");
                            foreach($pupils as $pupil) {
                                echo '<option '. ($pupil['id']==$item['pupil_id']?'selected':'') .' value="'. $pupil['id'] .'">'. $pupil['name'] .'</option>';
                            }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Edit Data</button>
            </form>
        </div>
    </div>

</div>

<?php include_once "includes/footer.php" ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['table_id'];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $pupil_id = $_POST["pupil_id"];

    // Insert data into the employees table
    $query = "UPDATE gurdians SET name='$name', phone='$phone', email='$email', pupil_id=$pupil_id, address='$address' WHERE id=$id";

    if ($conn->query($query) === TRUE) {
        set_message("gurdian_add_success", 'success', "Gurdian Update Succefully!");
        header("Location: gurdian.php");
    } else {
        set_message("gurdian_add_fail", 'error', "Gurdian Update Failed!");
        header("Location: gurdian.php");
    }

    $conn->close();
}
?>