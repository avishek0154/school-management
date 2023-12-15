<?php
include_once "db.php";

if(isset($_GET['gurdian_id']) && $_GET['gurdian_id']) {

    if (deleteData("gurdians", $_GET['gurdian_id'])) {
        set_message("gurdian_add_success", 'success', "Gurdian Delete Succefully!");
        header("Location: gurdian.php");
    } else {
        set_message("gurdian_add_fail", 'error', "Gurdian Delete Failed!");
        header("Location: gurdian.php");
    }
}