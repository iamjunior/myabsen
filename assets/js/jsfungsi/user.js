jQuery(function($) {
  //initiate dataTables plugin
  var myTable =
  $('#user-table')
  //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
  .DataTable( {
    bAutoWidth: false,
    "aoColumns": [
      { "bSortable": false }, null,null,
      { "bSortable": false }
    ],
    "aaSorting": [],

    select: {
      style: 'multi'
    }
    } );

  $("#example1").DataTable();
  //edit data barang
  $('#edit-datauser').on('show.bs.modal', function (event) {
                  var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                  var modal          = $(this)

                  // Isi nilai pada field
                  modal.find('#id').attr("value",div.data('id'));
                  modal.find('#kode').attr("value",div.data('kode'));
                  modal.find('#nama').attr("value",div.data('nama'));
  });

  $('#edit-datapwd').on('show.bs.modal', function (event) {
                  var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                  var modal          = $(this)

                  // Isi nilai pada field
                  modal.find('#id').attr("value",div.data('id'));
  });

  $('#delete-datauser').on('show.bs.modal', function (event) {
                  var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                  var modal          = $(this)

                  // Isi nilai pada field
                  modal.find('#kode').attr("value",div.data('kode'));
  });

})
