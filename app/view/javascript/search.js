function searchUitvaartcentra() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("uitvaartcentraTable");
    tr = table.getElementsByTagName("tr");
    th = table.getElementsByTagName("th");

    for (i = 1; i < tr.length; i++) {
        tr[i].classList.add("collapse");
        for (j = 0; j < th.length; j++) {

            td = tr[i].getElementsByTagName("td")[j];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].classList.remove("collapse");
                    break;
                } else {}
            }
        }
    }
}