function add(){
	let p_id = document.getElementById('hid').value;
	let c_id = document.getElementById('123').value;

	console.log(p_id);
	console.log(c_id);

	if(p_id > 0 && c_id > 0){

		console.log('add_party_character.php?p_id='+String(p_id)+"&c_id="+String(c_id));
		makeRequest('add_party_character.php?p_id='+String(p_id)+"&c_id="+String(c_id));
		
	}
}

function del(c_id){
	let p_id = document.getElementById('hid').value;
	// let c_id = document.getElementById('123').value;

	console.log(p_id);
	console.log(c_id);

	if(p_id > 0 && c_id > 0){

		console.log('delete_party_character.php?p_id='+String(p_id)+"&c_id="+String(c_id));
		makeRequest('delete_party_character.php?p_id='+String(p_id)+"&c_id="+String(c_id));
		
	}
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
			// window.location.reload();
		} 
	else {
		alert('Wystąpił problem z zapytaniem.');
	}
	}
}