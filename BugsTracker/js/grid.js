  
  require(['dojox/grid/DataGrid',"dojo/store/JsonRest", "dojo/data/ObjectStore"],
    function(DataGrid,JsonRest,ObjectStore){

   //var store = new dojo.store.JsonRest({target:"store_all_bugs.php"});
var store = new JsonRest({
    target: "store_all_bugs.php"
  });
  
	function formatDate(displayId) {
		return '<a href="delete_bug.php?id='+displayId+'">DEL</a>';
	}
	
	function formatDate_details(displayId) {
		return '<a href="details.php?id='+displayId+'">Info</a>';
	}
	
	function format_status(status) {
		if(status==2)
			return "Open";
		else if(status==3)
			return "Pending";
		else if(status==4)
			return "Resolved";
		else if(status==5)
			return "Closed";
		else
			return "Unknown";
	}
    /*set up layout*/
    var layout = [[
      {'name': 'ID', 'field': 'display_id', 'width': '30px'},
      {'name': 'Subject', 'field': 'subject', 'width': '100px'},
      {'name': 'Description', 'field': 'description', 'width': '200px'},
	  {'name': 'Status', 'field': 'status', 'width': '50px', formatter: format_status},
	  {'name': 'Delete', 'field': 'display_id', 'width': '50px', formatter: formatDate},
	  {'name': 'Details', 'field': 'display_id', 'width': '50px', formatter: formatDate_details},
    ]];

    /*create a new grid*/
    var grid = new DataGrid({
        id: 'grid',
        //store: store,
         store: dataStore = new ObjectStore({objectStore: store}),
         autoHeight:true,
         autoWidth: true,
        structure: layout,
        rowSelector: '20px'});

        /*append the new grid to the div*/
        grid.placeAt("gridDiv");

        /*Call startup() to render the grid*/
        grid.startup();
    });
	