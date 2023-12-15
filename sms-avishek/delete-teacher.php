<?php
include_once "db.php";

if(isset($_GET['teacher_id']) && $_GET['teacher_id']) {

    if (deleteData("teachers", $_GET['teacher_id'])) {
        set_message("teacher_add_success", 'success', "Teacher Delete Succefully!");
        header("Location: teacher.php");
    } else {
        set_message("teacher_add_fail", 'error', "Teacher Delete Failed!");
        header("Location: teacher.php");
    }
}