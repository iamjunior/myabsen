jQuery(function($) {
  //initiate dataTables plugin
  var myTable =
  $('#siswa-table')
  //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
  .DataTable( {
    bAutoWidth: false,
    "aoColumns": [
      { "bSortable": false }, null,null,null,null,null,
      { "bSortable": false }
    ],
    "aaSorting": [],

    select: {
      style: 'multi'
    }
    } );


    $(".select2").select2();

  myTable.buttons().container().appendTo( $('.tableTools-container') );

  //style the message box
  var defaultCopyAction = myTable.button(1).action();
  myTable.button(1).action(function (e, dt, button, config) {
    defaultCopyAction(e, dt, button, config);
    $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
  });


  var defaultColvisAction = myTable.button(0).action();
  myTable.button(0).action(function (e, dt, button, config) {

    defaultColvisAction(e, dt, button, config);


    if($('.dt-button-collection > .dropdown-menu').length == 0) {
      $('.dt-button-collection')
      .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
      .find('a').attr('href', '#').wrap("<li />")
    }
    $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
  });

  ////

  setTimeout(function() {
    $($('.tableTools-container')).find('a.dt-button').each(function() {
      var div = $(this).find(' > div').first();
      if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
      else $(this).tooltip({container: 'body', title: $(this).text()});
    });
  }, 500);





  myTable.on( 'select', function ( e, dt, type, index ) {
    if ( type === 'row' ) {
      $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
    }
  } );
  myTable.on( 'deselect', function ( e, dt, type, index ) {
    if ( type === 'row' ) {
      $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
    }
  } );




  /////////////////////////////////
  //table checkboxes
  $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

  //select/deselect all rows according to table header checkbox
  $('#siswa-table > thead > tr > th input[type=checkbox], #siswa-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
    var th_checked = this.checked;//checkbox inside "TH" table header

    $('#siswa-table').find('tbody > tr').each(function(){
      var row = this;
      if(th_checked) myTable.row(row).select();
      else  myTable.row(row).deselect();
    });
  });

  //select/deselect a row when the checkbox is checked/unchecked
  $('#siswa-table').on('click', 'td input[type=checkbox]' , function(){
    var row = $(this).closest('tr').get(0);
    if(this.checked) myTable.row(row).deselect();
    else myTable.row(row).select();
  });



  $(document).on('click', '#siswa-table .dropdown-toggle', function(e) {
    e.stopImmediatePropagation();
    e.stopPropagation();
    e.preventDefault();
  });



  //And for the first simple table, which doesn't have TableTools or dataTables
  //select/deselect all rows according to table header checkbox
  var active_class = 'active';
  $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
    var th_checked = this.checked;//checkbox inside "TH" table header

    $(this).closest('table').find('tbody > tr').each(function(){
      var row = this;
      if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
      else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
    });
  });

  //select/deselect a row when the checkbox is checked/unchecked
  $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
    var $row = $(this).closest('tr');
    if($row.is('.detail-row ')) return;
    if(this.checked) $row.addClass(active_class);
    else $row.removeClass(active_class);
  });



  /********************************/
  //add tooltip for small view action buttons in dropdown menu
  $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

  //tooltip placement on right or left
  function tooltip_placement(context, source) {
    var $source = $(source);
    var $parent = $source.closest('table')
    var off1 = $parent.offset();
    var w1 = $parent.width();

    var off2 = $source.offset();
    //var w2 = $source.width();

    if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
    return 'left';
  }




  /***************/
  $('.show-details-btn').on('click', function(e) {
    e.preventDefault();
    $(this).closest('tr').next().toggleClass('open');
    $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
  });
  /***************/

  //edit data siswa
  $('#edit-datasiswa').on('show.bs.modal', function (event) {
                  var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                  var modal          = $(this)

                  // Isi nilai pada field
                  modal.find('#kode').attr("value",div.data('kode'));
                  modal.find('#nama').attr("value",div.data('nama'));
  });

  $('#delete-datasiswa').on('show.bs.modal', function (event) {
                  var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                  var modal          = $(this)

                  // Isi nilai pada field
                  modal.find('#kode').attr("value",div.data('kode'));
  });

  //data mask telfon
  $('.input-mask-phone').mask('9999-9999-9999');

})
