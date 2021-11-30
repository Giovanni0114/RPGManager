let a = document.getElementsByClassName('counting');
let b = document.getElementsByClassName('counting selected')[0].innerHTML;

let count = a[a.length - 1].innerHTML;




document.onkeydown = function(event){
	switch (event.keyCode){
		case 37: //left
			if(a != 1){
				window.location.assign(window.location.pathname.split('/')[2]+"?id="+String(b*1-1))
			}
				break;
				case 38: //up
				if(a != b){
					window.location.assign(window.location.pathname.split('/')[2]+"?id="+String(count))
				}
				break;
				case 39: //right
				if(a != 1){
					window.location.assign(window.location.pathname.split('/')[2]+"?id="+String(b*1+1))
				}
				break;
				case 40: //left
				
				if(a != 1){
					window.location.assign(window.location.pathname.split('/')[2]+"?id=1")
				}
				break;
		default:
			break;
	}
}