let dataSet = [
    [ "Tiger Nixon", "System Architect", "Edinburgh", "5421", "../../page-error-404.html", "$320,800" ],
    [ "Garrett Winters", "Accountant", "Tokyo", "8422", "../../page-error-404.html", "$170,750" ],
    [ "Ashton Cox", "Junior Technical Author", "San Francisco", "1562", "../../page-error-404.html", "$86,000" ],
    [ "Cedric Kelly", "Senior Javascript Developer", "Edinburgh", "6224", "../../page-error-404.html", "$433,060" ],
    [ "Airi Satou", "Accountant", "Tokyo", "5407", "../../page-error-404.html", "$162,700" ],
    [ "Brielle Williamson", "Integration Specialist", "New York", "4804", "../../page-error-404.html", "$372,000" ],
    [ "Herrod Chandler", "Sales Assistant", "San Francisco", "9608", "../../page-error-404.html", "$137,500" ],
    [ "Rhona Davidson", "Integration Specialist", "Tokyo", "6200", "../../page-error-404.html", "$327,900" ],
    [ "Colleen Hurst", "Javascript Developer", "San Francisco", "2360", "../../page-error-404.html", "$205,500" ],
    [ "Sonya Frost", "Software Engineer", "Edinburgh", "1667", "../../page-error-404.html", "$103,600" ],
    [ "Jena Gaines", "Office Manager", "London", "3814", "../../page-error-404.html", "$90,560" ],
    [ "Quinn Flynn", "Support Lead", "Edinburgh", "9497", "../../page-error-404.html", "$342,000" ],
    [ "Charde Marshall", "Regional Director", "San Francisco", "6741", "../../page-error-404.html", "$470,600" ],
    [ "Haley Kennedy", "Senior Marketing Designer", "London", "3597", "../../page-error-404.html", "$313,500" ],
    [ "Tatyana Fitzpatrick", "Regional Director", "London", "1965", "../../page-error-404.html", "$385,750" ],
    [ "Michael Silva", "Marketing Designer", "London", "1581", "../../page-error-404.html", "$198,500" ],
    [ "Paul Byrd", "Chief Financial Officer (CFO)", "New York", "3059", "../../page-error-404.html", "$725,000" ],
    [ "Gloria Little", "Systems Administrator", "New York", "1721", "../../page-error-404.html", "$237,500" ],
    [ "Bradley Greer", "Software Engineer", "London", "2558", "../../page-error-404.html", "$132,000" ],
    [ "Dai Rios", "Personnel Lead", "Edinburgh", "2290", "../../page-error-404.html", "$217,500" ],
    [ "Jenette Caldwell", "Development Lead", "New York", "1937", "../../page-error-404.html", "$345,000" ],
    [ "Yuri Berry", "Chief Marketing Officer (CMO)", "New York", "6154", "../../page-error-404.html", "$675,000" ],
    [ "Caesar Vance", "Pre-Sales Support", "New York", "8330", "../../page-error-404.html", "$106,450" ],
    [ "Doris Wilder", "Sales Assistant", "Sidney", "3023", "../../page-error-404.html", "$85,600" ],
    [ "Angelica Ramos", "Chief Executive Officer (CEO)", "London", "5797", "../../page-error-404.html", "$1,200,000" ],
    [ "Gavin Joyce", "Developer", "Edinburgh", "8822", "../../page-error-404.html", "$92,575" ],
    [ "Jennifer Chang", "Regional Director", "Singapore", "9239", "../../page-error-404.html", "$357,650" ],
    [ "Brenden Wagner", "Software Engineer", "San Francisco", "1314", "../../page-error-404.html", "$206,850" ],
    [ "Fiona Green", "Chief Operating Officer (COO)", "San Francisco", "2947", "../../page-error-404.html", "$850,000" ],
    [ "Shou Itou", "Regional Marketing", "Tokyo", "8899", "../../page-error-404.html", "$163,000" ],
    [ "Michelle House", "Integration Specialist", "Sidney", "2769", "../../page-error-404.html", "$95,400" ],
    [ "Suki Burks", "Developer", "London", "6832", "../../page-error-404.html", "$114,500" ],
    [ "Prescott Bartlett", "Technical Author", "London", "3606", "../../page-error-404.html", "$145,000" ],
    [ "Gavin Cortez", "Team Leader", "San Francisco", "2860", "../../page-error-404.html", "$235,500" ],
    [ "Martena Mccray", "Post-Sales support", "Edinburgh", "8240", "../../page-error-404.html", "$324,050" ],
    [ "Unity Butler", "Marketing Designer", "San Francisco", "5384", "../../page-error-404.html", "$85,675" ]
];




(function($) {
    "use strict"
    //example 1
    var table = $('#example').DataTable({
        createdRow: function ( row, data, index ) {
           $(row).addClass('selected')
        } 
    });
      
    table.on('click', 'tbody tr', function() {
    var $row = table.row(this).nodes().to$();
    var hasClass = $row.hasClass('selected');
    if (hasClass) {
        $row.removeClass('selected')
    } else {
        $row.addClass('selected')
    }
    })
    
    table.rows().every(function() {
    this.nodes().to$().removeClass('selected')
    });



    //example 2
    var table2 = $('#example2').DataTable( {
        createdRow: function ( row, data, index ) {
            $(row).addClass('selected')
        },

        "scrollY":        "42vh",
        "scrollCollapse": true,
        "paging":         false
    });
	var table = $('#responsiveTable').DataTable( {
        responsive: true
    });

    table2.on('click', 'tbody tr', function() {
        var $row = table2.row(this).nodes().to$();
        var hasClass = $row.hasClass('selected');
        if (hasClass) {
            $row.removeClass('selected')
        } else {
            $row.addClass('selected')
        }
    })
        
    table2.rows().every(function() {
        this.nodes().to$().removeClass('selected')
    });
	
	// dataTable1
	var table = $('#dataTable1').DataTable({
		searching: false,
		paging:true,
		select: false,         
		lengthChange:false 
	});
	// dataTable2
	var table = $('#dataTable2').DataTable({
		searching: false,
		paging:true,
		select: false,         
		lengthChange:false 
	});
	// dataTable3
	var table = $('#dataTable3').DataTable({
		searching: false,
		paging:true,
		select: false,         
		lengthChange:false 
	});
	// dataTable4
	var table = $('#dataTable4').DataTable({
		searching: false,
		paging:true,
		select: false,         
		lengthChange:false 
	});

	// table row
	var table = $('#dataTable1, #dataTable2, #dataTable3, #dataTable4, #example3, #example4, #example5').DataTable();
	$('#example tbody').on('click', 'tr', function () {
		var data = table.row( this ).data();
	});
   
	jQuery('.dataTables_wrapper select').selectpicker();
	
})(jQuery);