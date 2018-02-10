$.post("", function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
    });

$.ajax({
	url: 'http://192.168.1.125/Codeig/index.php/Welcome/save_merchants',
	type: 'POST',
	dataType: 'json',
	data: arr
})
.done(function() {
	console.log("success");
})
.fail(function(xhr) {
	console.log("error"+ xhr.responseText );
})
.always(function() {
	console.log("complete");
});
