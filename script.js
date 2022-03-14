// TODO Merge connection function into one
// ! THIS FILE IS A KIND OF GARBAGE
// But I love this garbage 


var http_request = false;
var curShown = undefined;
var data = undefined;


function readTextFile(file, callback) {
	var rawFile = new XMLHttpRequest();
	rawFile.overrideMimeType("application/json");
	rawFile.open("GET", file, true);
	rawFile.onreadystatechange = function () {
		if (rawFile.readyState === 4 && rawFile.status == "200") {
			callback(rawFile.responseText);
		}
	}
	rawFile.send(null);
}


readTextFile("data.json", function (text) {
	data = JSON.parse(text)[0];
	console.log(data);
});

function show(url) {
	if (!curShown) {
		curShown = url;
		makeRequest(url);
	}
	else {
		if (url == curShown) document.getElementById("result").innerHTML = '';
		else makeRequest(url);

		curShown = undefined;
	}
}
function makeRequest(url) {
	http_request = new XMLHttpRequest();
	http_request.onreadystatechange = function () { alertContents(http_request); };
	http_request.open('GET', url, true);
	http_request.send(null);
}

function alertContents(http_request) {

	if (http_request.readyState == 4) {
		if (http_request.status == 200) {
			document.getElementById("result").innerHTML = http_request.responseText;
			console.log(http_request.JSON);
			// console.log(http_request.responseText);
		} else {
			alert('Wystąpił problem z zapytaniem.');
		}
	}
	btns = document.querySelectorAll('td');

	for (let i = 0; i < btns.length; i++) {
		btns[i].addEventListener("mouseover", () => {
			var d = data[btns[i].innerText.toLowerCase().replace(' ', '_')];
			if (d != undefined) {
				if (d.length > 45)
					d = d.slice(0, 45) + "...";

				btns[i].style.cssText = "cursor: pointer;";
			}


			document.getElementById("result").style.cssText
				= "--description: '" + (d == undefined ? "" : d) + "';";

			// document.getElementById("result").style.cssText 
			//	= "--description: url('img/eq/"+(btns[i].innerHTML).replace(' ', '_')+".png');";
			// console.log("--description:"+btns[i].innerHTML+";");
		})

		btns[i].onclick = function () {
			var d = data[btns[i].innerText.toLowerCase().replace(' ', '_')];

			if (d) {
				document.getElementById(btns[i].innerText + "dragable")?.remove();

				createdragablediv(btns[i].innerText, d)

				dragElement(document.getElementById(btns[i].innerText + "dragable"));
			}
		}
	}
}
