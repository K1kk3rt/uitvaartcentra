function displayEditModal(id) {
    var modal = $('#editModal');

    // now get the values from the table
    var uitvaartcentrum = $("button#" + id).closest('tr').find('td.uitvaartcentrum').html();
    var straat = $("button#" + id).closest('tr').find('td.straat').html();
    var huisnummer = $("button#" + id).closest('tr').find('td.huisnummer').html();
    var plaats = $("button#" + id).closest('tr').find('td.plaats').html();
    var bezorging = $("button#" + id).closest('tr').find('td.bezorging').html();
    var opmerking = $("button#" + id).closest('tr').find('td.opmerking').html();

    // and set them in the modal:
    $('.uitvaartcentrum', modal).val(uitvaartcentrum);
    $('.straat', modal).val(straat);
    $('.huisnummer', modal).val(huisnummer);
    $('.plaats', modal).val(plaats);
    if (bezorging == "ja") {
        $("#ja").prop("checked", true);
    }
    else {
        $("#nee").prop("checked", true);
    }
    $('.opmerking', modal).val(opmerking);

    //save id in cookie to access via php
    document.cookie = "centraid=" + id;

    // and finally show the modal
    $('#editModal').modal('toggle');

    return false;
}