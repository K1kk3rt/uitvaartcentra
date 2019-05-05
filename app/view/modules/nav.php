<?php
//ON LOGOUT BUTTON CLICK
//destroy session and head to login page
if (isset($_POST['logoutBtn'])) {
    $controller = new loginController();
    $controller->logout();
}

if (isset($_POST['addcentraBtn'])) {
    //validate user input
    $validate = new validation();
    $name = $validate->validate_input($_POST['uitvaartcentrum']);
    $street = $validate->validate_input($_POST['straat']);
    $houseNumber = $validate->validate_input($_POST['huisnummer']);
    $city = $validate->validate_input($_POST['plaats']);
    $can_deliver = $validate->validate_input($_POST['bezorging']);
    $comment = $validate->validate_input($_POST['opmerking']);

    $uitvaartcentraController = new uitvaartcentraController();
    if ($uitvaartcentraController->insertNewUitvaartcentra($name, $street, $houseNumber, $city, $can_deliver, $comment)) {
        header('Location: uitvaartcentra');
        exit();
    } else {
        $msg = "Er is iets mis gegaan, probeer het opnieuw.";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }
}

?>
<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-primary main-nav">
    <ul class="nav navbar-nav py-0">
        <li class="navbar-brand py-0">
            <a class="navbar-brand" href="#">uitvaartcentra.boeketcadeau.nl</a>
        </li>
    </ul>
    <ul class="nav navbar-nav mx-auto">
        <div class="form-inline" style="width: 600px;" id="searchForm">
            <input class="form-control mr-sm-2" style="width: 510px;" type="text" placeholder="zoek uitvaartcentrum/plaats" id="searchInput" name="searchInput" onkeyup="searchUitvaartcentra(event)">
            <button class=" btn btn-primary my-sm-0" type="submit" id="searchBtn" name="searchBtn">zoeken</button>
        </div>
    </ul>
    <ul class="nav">
        <li class="nav-item">
            <button class="btn btn-primary mr-2" type="submit" id="addBtn" name="addBtn" data-toggle="modal" data-target="#addModal">toevoegen</button>
        </li>
        <li class="nav-item">
            <form method="post" action=""><button class="btn btn-primary mr-2" type="submit" id="logoutBtn" name="logoutBtn">uitloggen</button></form>
        </li>
    </ul>
</nav>

<!-- The Modal -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="post" action="" name="addcentra">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Uitvaartcetra toevoegen</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body form-group">
                    <label class="mt-3" for="uitvaartcentrumInput">uitvaartcentrum</label>
                    <input type="text" class="form-control" id="uitvaartcentrumInput" name="uitvaartcentrum" required="true">
                    <div class="row">
                        <div class="col-8">
                            <label class="mt-3" for="straatInput">straat</label>
                            <input type="text" class="form-control" id="straatInput" name="straat" required="true">
                        </div>
                        <div class="col-4">
                            <label class="mt-3" for="huisnummerInput">huisnummer</label>
                            <input type="text" class="form-control" id="huisnummerInput" name="huisnummer" required="true">
                        </div>
                    </div>
                    <label class="mt-3" for="plaatsInput">plaats</label>
                    <input type="text" class="form-control" id="plaatsInput" name="plaats" required="true">
                    <label class="mt-3" for="bezorgingInput">bezorging</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="ja" name="bezorging" class="custom-control-input" value="ja">
                        <label class="custom-control-label" for="ja">Ja</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="nee" name="bezorging" class="custom-control-input" value="nee" checked>
                        <label class="custom-control-label" for="nee">Nee</label>
                    </div>
                    <label class="mt-3" for="opmerkingInput">opmerking</label>
                    <textarea type="text" class="form-control" id="opmerkingInput" style="height: 70px;" name="opmerking"></textarea>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" data-dismiss="modal">sluiten</button>
                    <button type="submit" class="btn btn-success" id="addcentraBtn" name="addcentraBtn">toevoegen</button>
                </div>
            </form>
        </div>
    </div>
</div>