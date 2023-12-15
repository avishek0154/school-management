<?php
include_once "db.php";

if(isset($_GET['pupil_id']) && $_GET['pupil_id']) {

    if (deleteData("pupils", $_GET['pupil_id'])) {
        set_message("pupil_add_success", 'success', "Pupil Delete Succefully!");
        header("Location: pupil.php");
    } else {
        set_message("pupil_add_fail", 'error', "Pupil Delete Failed!");
        header("Location: pupil.php");
    }
}