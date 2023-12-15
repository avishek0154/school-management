<?php
ob_start();
session_start();
$hostname = "localhost";
$username = "root";
$password = "";
$database = "school_management";

// Create a MySQLi connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getAllData($tableName, $column = false, $value = false)
{
    global $conn;
    if($column && $value) {
        $query = "SELECT * FROM $tableName WHERE $column=$value";
    } else {
        $query = "SELECT * FROM $tableName";        
    }

    $result = $conn->query($query);

    if ($result) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    } else {
        return false;
    }
}

function getOneData($tableName, $id, $column="id")
{
    global $conn;
    $query = "SELECT * FROM $tableName WHERE $column=$id";
    $result = $conn->query($query);

    if ($result) {
        $data = $result->fetch_assoc();
        return $data;
    } else {
        return false;
    }
}

function deleteData($tableName, $id)
{
    global $conn;
    $query = "DELETE FROM $tableName WHERE id=$id";
    $result = $conn->query($query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

function set_message($key, $type, $msg)
{
    $_SESSION[$key] = ['type' => $type, 'message' => $msg];
}

function get_message($key)
{
    if (isset($_SESSION[$key])) {
        $message = $_SESSION[$key];

        if ($message['type'] == "error") {
            $class = 'alert-danger';
        } elseif ($message['type'] == "success") {
            $class = 'alert-success';
        } else {
            $class = 'alert-primary';
        }

        $msg = '<div class="alert ' . $class . ' alert-dismissible fade show" role="alert"><strong>' . $message['message'] . '</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';

        unset($_SESSION[$key]);
        return $msg;
    } else {
        return null;
    }
}

function getClassName($id) {
    $class = getOneData('classes', $id);
    return $class['name'] ?? "";
}

function getTeacherName($class_id) {
    $teacher = getOneData('teachers', $class_id, "class_id");
    return $teacher['name'] ?? "";
}

function getGurdianName($id) {
    $item = getOneData('gurdians', $id,);
    return $item['name'] ?? "";
}

function getPupilName($id) {
    $item = getOneData('pupils', $id,);
    return $item['name'] ?? "";
}

function getPupilsName($class_id) {
    $pupils = getAllData('pupils', "class_id", $class_id);
    $data = [];
    if($pupils) {
        foreach($pupils as $pupil) {
            array_push($data, $pupil['name']);
        }
    }

    return implode(", ", $data);
}