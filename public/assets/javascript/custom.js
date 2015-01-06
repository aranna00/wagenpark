/**
 * Created by aran on 06/01/2015.
 */
$(document).ready(function() {
    $('#users').dataTable({
        paging:true,
        "aoCoulumns":
            [
                null,
                null,
                null,
                null,
                {"bSortable":false}
            ],
        autoWidth:false
    });
});
