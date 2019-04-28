<?php

$controller = new baseController();
$table = new uitvaartcentraTable();
$uitvaartcentra = new uitvaartcentraController();
$centras = $uitvaartcentra->getUitvaartcentras();

session_start();

//Check is session exists, aka if user is logged in
if (!isset($_SESSION["user"])) {
    header("location: ./");
}


if (isset($_POST['editcentraBtn'])) {
    if (isset($_SESSION["user"])) {
        //validate user input
        $validate = new validation();
        $name = $validate->validate_input($_POST['uitvaartcentrum']);
        $street = $validate->validate_input($_POST['straat']);
        $houseNumber = $validate->validate_input($_POST['huisnummer']);
        $city = $validate->validate_input($_POST['plaats']);
        $can_deliver = $validate->validate_input($_POST['bezorging']);
        $comment = $validate->validate_input($_POST['opmerking']);

        $id = $_COOKIE['centraid'];
        unset($_COOKIE['centraid']);

        if (isset($id)) {
            $uitvaartcentraController = new uitvaartcentraController();
            if ($uitvaartcentraController->editUitvaartcentra($id, $name, $street, $houseNumber, $city, $can_deliver, $comment)) {
                header('Location: uitvaartcentra');
                exit();
            } else {
                $msg = "Er is iets mis gegaan, probeer het opnieuw.";
                echo "<script type='text/javascript'>alert('$msg');</script>";
                header("Location: " . $_SERVER['REQUEST_URI']);
                exit();
            }
        }
    }
}

if (isset($_POST['deletecentraBtn'])) {
    if (isset($_SESSION["user"])) {

        $id = $_COOKIE['centraid'];
        unset($_COOKIE['centraid']);

        if (isset($id)) {
            $uitvaartcentraController = new uitvaartcentraController();
            if ($uitvaartcentraController->deleteUitvaartcentra($id)) {
                header('Location: uitvaartcentra');
                exit();
            } else {
                $msg = "Er is iets mis gegaan, probeer het opnieuw.";
                echo "<script type='text/javascript'>alert('$msg');</script>";
                header("Location: " . $_SERVER['REQUEST_URI']);
                exit();
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>

<?php $controller->loadHead(); ?>

<body>
    <?php $controller->loadNav();
    echo $table->loadTable($centras);
    ?>

</body>

</html>