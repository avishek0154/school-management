<?php include_once "includes/header.php" ?>

<div class="container">
    <div class="py-4">
        <div class="text-center h2">Add Teacher</div>
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
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="education" class="form-label">Education:</label>
                    <input type="text" class="form-control" id="education" name="education" required>
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
                    <label for="salary" class="form-label">Salary:</label>
                    <input type="number" class="form-control" id="salary" name="salary" required>
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
    $address = $_POST["address"];
    $education = $_POST["education"];
    $salary = $_POST["salary"];
    $class_id = $_POST["class_id"];

    // Insert data into the employees table
    $query = "INSERT INTO teachers (name, phone, address, education, salary, class_id) VALUES ('$name', '$phone', '$address', '$education', $salary, $class_id)";

    if ($conn->query($query) === TRUE) {
        set_message("teacher_add_success", 'success', "Teacher Added Succefully!");
        header("Location: teacher.php");
    } else {
        set_message("teacher_add_fail", 'error', "Teacher Added Failed!");
        header("Location: teacher.php");
    }

    $conn->close();
}
?>