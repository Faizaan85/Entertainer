function format( d )
{
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Restaurant Id:</td>'+
            '<td>'+d.restaurants[0].restaurant.id+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Restaurant Name:</td>'+
            '<td>'+d.restaurants[0].restaurant.name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Restaurant URL:</td>'+
            '<td><a href="'+d.restaurants[0].restaurant.url+'">Zomato</a></td>'+
        '</tr>'+
        '<tr>'+
            '<td>Restaurant Rating: </td>'+
            '<td>'+d.restaurants[0].restaurant.user_rating.aggregate_rating+'</td>'+
        '</tr>'+
    '</table>';
}

$(document).ready(function()
{
	var table = $('#table_result').DataTable(
	{
		ajax:
		{
			url: $base_url+'merchants/search?year=2018&category=food&count=20',
			dataSrc:'data'
		},
		columns:
		[
			{
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
			{data: 'id'},
			{data: 'year'},
			{data: 'name'},
			{data: 'category'},
			{
				data: 'misc',
				render: function(data,type, row, meta)
				{
					return '<button type="button" class="rest_name" value="'+row.name+'">Open</a>';
				}
			}
		]
	});

	$('#table_result').on('click', 'td.details-control', function ()
	{
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 		// console.log(row.data().name);
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            var restName = row.data().name;
            console.log(restName);
            $.ajax(
            {
            	url:"https://developers.zomato.com/api/v2.1/search",
            	type:"GET",
            	data:
            	{
            		entity_id: 51,
            		entity_type: "city",
            		q: restName,
            		count: 1
            	},
            	headers:{'user-key':'55399a5e2cb611edf80ce16f7484551d'},
            })
            .done(function(data) {
            	row.child( format(data) ).show();
            	tr.addClass('shown');
            	// console.log(data);
            })
            .fail(function() {
            	console.log("error");
            	tr.addClass('show');
            })
            .always(function() {
            	console.log("complete");
            });

        }
    });
	$('#expand_all').on('click',function()
	{
		$('td.details-control').click();
	});










	$('#table_result').on('click','.rest_name',function()
	{
		var restName = row.data().name;
		console.log(restName);
		$.ajax(
		{
			url:"https://developers.zomato.com/api/v2.1/search",
    		type:"GET",
    		data:
    		{
    			entity_id: 51,
    			entity_type: "city",
    			q: restName,
    			count: 1
    		},
    		headers:{'user-key':'55399a5e2cb611edf80ce16f7484551d'},
		})
		.done(function(data) {
			console.log(data);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	});
});
