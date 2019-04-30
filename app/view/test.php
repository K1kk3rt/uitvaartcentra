<?php
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
        echo "<script type='text/javascript'>alert('inserted!');</script>";
    }
}
?>
<form method="post" action="" name="addcentra">
    <!-- Modal Header -->
    <div class="modal-header">
        <h4 class="modal-title">Uitvaartcetra toevoegen</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>

    <!-- Modal body -->
    <div class="modal-body form-group">
        <label class="mt-3" for="uitvaartcentrumInput">uitvaartcentrum</label>
        <input type="text" class="form-control" id="uitvaartcentrumInput" name="uitvaartcentrum">
        <div class="row">
            <div class="col-8">
                <label class="mt-3" for="straatInput">straat</label>
                <input type="text" class="form-control" id="straatInput" name="straat">
            </div>
            <div class="col-4">
                <label class="mt-3" for="huisnummerInput">huisnummer</label>
                <input type="text" class="form-control" id="huisnummerInput" name="huisnummer">
            </div>
        </div>
        <label class="mt-3" for="plaatsInput">plaats</label>
        <input type="text" class="form-control" id="plaatsInput" name="plaats">

        <label class="mt-3" for="bezorgingInput">bezorging</label>
        <div class="custom-control custom-radio" id="bezorgingInput">
            <input type="radio" id="customRadio1" name="bezorging" class="custom-control-input" name="bezorging">
            <label class="custom-control-label" for="customRadio1">Ja</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="customRadio2" name="bezorging" class="custom-control-input" name="bezorging" checked>
            <label class="custom-control-label" for="customRadio2">Nee</label>
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