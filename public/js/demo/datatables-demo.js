// Call the dataTables jQuery plugin
$(document).ready(function() {
  var t = $('#dataTable').DataTable( {

    "columnDefs": [ {
        "searchable": false,
        "orderable": false,
        "targets": 0
    } ],
    'scrollX' : true,
    "order": [[ 1, 'asc' ]]
  } );

  t.on( 'order.dt search.dt', function () {
    t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
} ).draw();



  var t2 = $('#dataTable1').DataTable( {
    dom: 'Bfrtip',
    buttons: ['copy', 'excel'],
        "columnDefs": [ {
        "searchable": false,
        "orderable": false,
        "targets": 0
    } ],
    'scrollX' : true,
    "order": [[ 1, 'asc' ]]
    } );
    t2.on( 'order.dt search.dt', function () {
      t2.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
          cell.innerHTML = i+1;
      } );
    } ).draw();

});


$(function () {
    
  var table = $('.data-table3').DataTable({
    dom: 'Bfrtip',

    buttons: [
      'copy', 'excel'
  ],
  
      processing: true,
      serverSide: true,
      ajax: "/getStudents",
      columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false},
          {data: 'student_profile_id', name: 'student_profile_id.name_chi'},
          {data: 'student_profile_id', name: 'student_profile_id.name_eng'},
          {data: 'year', name: 'year'},
        ]
      
  });
  
});

