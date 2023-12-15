<?php include_once "includes/header.php" ?>

<div class="container">
    <div class="py-4">
        <div class="text-center h2">Add Gurdian</div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label">Pupil:</label>
                    <select name="pupil_id" id="pupil_id" class="form-control">
                        <option value="">- Select Pupil -</option>
                        <?php 
                            $items = getAllData("pupils");
                            foreach($items as $item) {
                                echo '<option value="'. $item['id'] .'">'. $item['name'] .'</option>';
                            }
                        ?>
                    </select>
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
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $pupil_id = $_POST["pupil_id"];

    // Insert data into the employees table
    $query = "INSERT INTO gurdians (name, phone, email, pupil_id, address) VALUES ('$name', '$phone', '$email', $pupil_id, '$address')";

    if ($conn->query($query) === TRUE) {
        set_message("gurdian_add_success", 'success', "Gurdian Added Succefully!");
        header("Location: gurdian.php");
    } else {
        set_message("gurdian_add_fail", 'error', "Gurdian Added Failed!");
        header("Location: gurdian.php");
    }

    $conn->close();
}
?>