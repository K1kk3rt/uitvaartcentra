<?php

$controller = new baseController();

$msg = "";

session_start();

//ON LOAD
//if session is existent, head to Account
if (isset($_SESSION['user'])) {
    header('Location: uitvaartcentra');
}

//ON LOGIN BUTTON CLICK
//Check if username and password fields are filled, and read their data
//ReadLoginData() reads and checks it for errors, feedback is provided in switch
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //validate user input
    $validate = new validation();
    $username = $validate->validate_input($_POST['username']);
    $password = $validate->validate_input($_POST['password']);

    $LoginController = new loginController($username, $password);
    $msg = $LoginController->ReadLoginData();
}


?>

<!DOCTYPE html>
<html>

<?php $controller->loadHead(); ?>

<body>

    <section class="text-center" style="margin: 200px;">
        <h1>Uitvaartcentra</h1>
        <p>BoeketCadeau.nl</p>
    </section>

    <!-- login form -->
    <section class="mx-auto" style="width: 200px;">
        <form action="./" method="post">
            <div class="form-group">
                <label class="text-center">Gebruikersnaam</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label class="text-center">Wachtwoord</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div>
                <p class="text-center"><?php echo($msg); ?></p>
            </div>
            <button type="submit" class="btn btn-primary float-right">Log in</button>
        </form>
    </section>


</body>

</html>