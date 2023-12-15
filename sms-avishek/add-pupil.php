<?php include_once "includes/header.php" ?>

<div class="container">
    <div class="py-4">
        <div class="text-center h2">Add Pupil</div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label">Class:</label>
                    <select name="class_id" id="class" class="form-control" required>
                        <option value="">- Select Class -</option>
                        <?php 
                            $classes = getAllData("classes");
                            foreach($classes as $class) {
                                echo '<option value="'. $class['id'] .'">'. $class['name'] .'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label">Gurdian:</label>
                    <select name="gurdian_id" id="gurdian_id" class="form-control">
                        <option value="">- Select Gurdian -</option>
                        <?php 
                            $items = getAllData("gurdians");
                            foreach($items as $item) {
                                echo '<option value="'. $item['id'] .'">'. $item['name'] .'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="medical_info" class="form-label">Medical Info:</label>
                    <input type="text" class="form-control" id="medical_info" name="medical_info" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Data</button>
            </form>
        </div>
    </div>

</div>

<?php include_once "includes/footer.php" ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $name = $_POST["name"];
    $address = $_POST["address"];
    $class_id = $_POST["class_id"];
    $medical_info = $_POST["medical_info"];
    $gurdian_id = $_POST["gurdian_id"];

    // Insert data into the employees table
    $query = "INSERT INTO pupils (name, address, class_id, gurdian_id, medical_info) VALUES ('$name', '$address', $class_id, $gurdian_id, '$medical_info')";

    if ($conn->query($query) === TRUE) {
        set_message("pupil_add_success", 'success', "Pupil Added Succefully!");
        header("Location: pupil.php");
    } else {
        set_message("pupil_add_fail", 'error', "Pupil Added Failed!");
        header("Location: pupil.php");
    }

    $conn->close();
}
?>