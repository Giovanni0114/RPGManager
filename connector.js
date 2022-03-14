readTextFile("get_party.php", function (text) {
	data = JSON.parse(text)[0];
	console.log(data);
});