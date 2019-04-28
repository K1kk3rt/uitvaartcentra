function displayDeleteModal(id) {
    var modal = $('#deleteModal');

    // now get the values from the table
    var uitvaartcentrum = $("button#" + id).closest('tr').find('td.uitvaartcentrum').html();
    var plaats = $("button#" + id).closest('tr').find('td.plaats').html();

    // and set them in the modal:
    $(".uitvaartcentrumdel").text(uitvaartcentrum);
    $(".plaatsdel").text(plaats);

    //save id in cookie to access via php
    document.cookie = "centraid=" + id;

    // and finally show the modal
    $('#deleteModal').modal('toggle');

    return false;
}