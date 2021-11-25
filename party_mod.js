function add(){
	let p_id = document.getElementById('hid').value;
	let c_id = document.getElementById('123').value;

	if(p_id > 0 && c_id >0)
		url('add_party_character.php?p_id='+String(p_id)+"&c_id="+String(c_id));
}

function makeRequest(url) {
	
	http_request = new XMLHttpRequest();
	
	    http_request.onreadystatechange = function() { alertContents(http_request); };
	    http_request.open('GET', url, true);
	    http_request.send(null);
	    
}
    
function alertContents(http_request) {
		
	if (http_request.readyState == 4) {
		if (http_request.status == 200) {
			console.log(http_request.responseText);
			window.location.reload();
		} 
	else {
		alert('Wystąpił problem z zapytaniem.');
	}
	}
}