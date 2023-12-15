<?php include_once "includes/header.php" ?>

<div class="container">
    <div class="py-4">
        <div class="text-center h2">Edit Pupil</div>
    </div>

    <?php
        $item = getOneData("pupils", $_GET['pupil_id'])
    ?>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="">
                <input type="hidden" name="table_id" value="<?= $_GET['pupil_id'] ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $item['name'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?= $item['address'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label">Class:</label>
                    <select name="class_id" id="class" class="form-control" required>
                        <option value="">- Select Class -</option>
                        <?php 
                            $classes = getAllData("classes");
                            foreach($classes as $class) {
                                echo '<option '. ($class['id']==$item['class_id']?'selected':'') .' value="'. $class['id'] .'">'. $class['name'] .'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label">Gurdian:</label>
                    <select name="gurdian_id" id="gurdian_id" class="form-control" required>
                        <option value="">- Select Gurdian -</option>
                        <?php 
                            $gurdians = getAllData("gurdians");
                            foreach($gurdians as $gurdian) {
                                echo '<option '. ($gurdian['id']==$item['gurdian_id']?'selected':'') .' value="'. $gurdian['id'] .'">'. $gurdian['name'] .'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="medical_info" class="form-label">Medical Info:</label>
                    <input type="text" class="form-control" id="medical_info" name="medical_info" value="<?= $item['medical_info'] ?>" required>
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
    $address = $_POST["address"];
    $medical_info = $_POST["medical_info"];
    $class_id = $_POST["class_id"];
    $gurdian_id = $_POST["gurdian_id"];

    // Insert data into the employees table
    $query = "UPDATE pupils SET name='$name', address='$address', class_id=$class_id, gurdian_id=$gurdian_id, medical_info='$medical_info' WHERE id=$id";

    if ($conn->query($query) === TRUE) {
        set_message("pupil_add_success", 'success', "Pupil Update Succefully!");
        header("Location: pupil.php");
    } else {
        set_message("pupil_add_fail", 'error', "Pupil Update Failed!");
        header("Location: pupil.php");
    }

    $conn->close();
}
?>