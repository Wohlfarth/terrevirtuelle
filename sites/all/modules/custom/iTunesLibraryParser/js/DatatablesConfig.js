/*
CONFIGURATION FOR DATATABLES
FEATURES:
- Filter for Remote Location Columns
- Filter for string search
- Responsive display
- Custom placement of controls
*/


$(document).ready(function() {

  var status = [null, 'Registered', null, 'Attended'];
  var url = window.location.href;
  var ProductID = url.substr(url.lastIndexOf('/') + 1);
  var RemoteLocationID = 864;
  var now = new Date();
  // console.log(now.yyyymmdd());
  var dtOptions = {
        responsive: true           
    };
    
  var ResponsiveConfig = {
    details: {
      display: $.fn.dataTable.Responsive.display.modal( {
        'header': function ( row ) {
          var data = row.data();
          return 'Details for '+data[6]+' '+data[7];
        }
      }),
        'renderer': function ( api, rowIdx, columns ) {
          var data = $.map( columns, function ( col, i ) {
          // Properties available with object col: columnIndex, data, hidden, rowIndex, title
          // console.log(col.columnIndex);
          if(col.columnIndex > 4) {
            return '<tr><td>'+col.title+':'+'</td><td>'+col.data+'</td></tr>';
          }
        } ).join('');
        return $('<table/>').append( data );
        },
      }
    };


  // DATATABLES FOR ATTENDEE DISPLAY *******************************
  var AttendeeTable = $('#music').dataTable({
    // dom to place control elements on top
    //"dom": 'B<"top"i><"top"flp><"clear">', // https://datatables.net/reference/option/dom
    
   /* Use "dom": '<"top"i>rt<"bottom"flp><"clear">' to have Results of dom in:
    <div class="top">
      {information}
    </div>
    {processing}
    {table}
    <div class="bottom">
      {filter}
      {length}
      {pagination}
    </div>
    <div class="clear"></div>
*/
    "dom": '<"top"i>rt<"bottom"flp><"clear">',
    'searching': true,
    'ordering':  true,
    'bPaginate': true,
    'bFilter': true,
    'bProcessing': true,
    'bScrollInfinite': false,
    'bScrollCollapse': true,
    //'iDisplayLength':1000, // makes a long scrolling page
    'order': [[ 0, 'asc' ]],
    'fixedHeader': true,
    'colReorder': true,
    
    //'responsive': false,
    // DONT USE FOR NOWRESPONSIVE FEATURE ADDS PERFORMANCE ISSUES
    'responsive': true,
    //'responsive': ResponsiveConfig,
    // to enable/disable column sorting
    // 'aoColumnDefs' : [{
     //  'bSortable' : false,
     //  'aTargets' : [0, 2]
    // }],

  }); // end var AttendeeTable = $('#music').dataTable({




  // Remote Location Filter - dynamic, depending on Remote Location column
  // source: http://jsfiddle.net/codecanvas/9xcLjx11/3/
  $(function () {
    var tbl = $('#music');
    var dtbl = tbl.DataTable();
    $('th[data-role="LocationFilter"]', tbl).each(function (i) {
      SetupSelectFilter(this, i, dtbl);
    });
  });

  function SetupSelectFilter(obj, i, dt) {
    var colIndex = $(obj).parent().children().index($(obj));
    var colData = [];
    var select = $('<select id="RemoteLocations_filter"><option value="">All Artists</option></select>')
      .prependTo('#music_wrapper')
      .on('change', function () {
        var val = $(this).val().trim();
        dt.column(colIndex)
        .search(val?'^'+val+'$':val, true, false)
        .draw();
      });

    // counter to check if there is a Remote Location
    var ColumnContent = 0;
    dt.column(colIndex).nodes(colIndex).each(function (d, j) {
      var tempColData = d.hasAttribute("location")?d.getAttribute("location").trim():d.innerText.trim();
      if(colData.indexOf(tempColData) < 0) {
        // exclude empty values
        if(tempColData != '') {
          colData.push(tempColData);
          ColumnContent++
          // add Remote locations as option values
          select.append('<option value="' + tempColData + '">' + tempColData.substr(0,40) + '</option>');
        } 
      } 
    });



  }  // end function SetupSelectFilter(obj, i, dt) {

} ); // END $(document).ready(function() {

