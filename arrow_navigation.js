let counters = document.getElementsByClassName('counting');
let current = document.getElementsByClassName('counting selected')[0].innerHTML;

let last = counters[counters.length - 1].innerHTML;




document.onkeydown = function(event){
	switch (event.keyCode){
		case 37: //left
			if (current == 1) window.location.assign(window.location.pathname.split('/')[2]+"?id="+String(last))
			else window.location.assign(window.location.pathname.split('/')[2]+"?id="+String(current*1-1))
		
		break;
		case 38: //up
			if(current != last){
			window.location.assign(window.location.pathname.split('/')[2]+"?id="+String(last))
			}
		break;
		
		case 39: //right
		if (last == current) window.location.assign(window.location.pathname.split('/')[2]+"?id=1")
		else{
			window.location.assign(window.location.pathname.split('/')[2]+"?id="+String(current*1+1))
		}
		break;

		case 40: //down
		if(current != 1){
			window.location.assign(window.location.pathname.split('/')[2]+"?id=1")
		}
		break;
		default:
		break;
	}
}