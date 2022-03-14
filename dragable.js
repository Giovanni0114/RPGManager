function dragElement(elmnt) {
	var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
	console.log(elmnt.id + "header");
	if (document.getElementById(elmnt.id + "header")) {
	  // if present, the header is where you move the DIV from:
	  document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
	} else {
	  // otherwise, move the DIV from anywhere inside the DIV:
	  elmnt.onmousedown = dragMouseDown;
	}
      
	function dragMouseDown(event) {
	  event = event || window.event;
	  event.preventDefault();
	  // get the mouse cursor position at startup:
	  pos3 = event.clientX;
	  pos4 = event.clientY;
	  document.onmouseup = closeDragElement;
	  // call a function whenever the cursor moves:
	  document.onmousemove = elementDrag;
	}
      
	function elementDrag(event) {
	  event = event || window.event;
	  event.preventDefault();
	  // calculate the new cursor position:
	  pos1 = pos3 - event.clientX;
	  pos2 = pos4 - event.clientY;
	  pos3 = event.clientX;
	  pos4 = event.clientY;
	  // set the element's new position:
	  elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
	  elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
	}
      
	function closeDragElement() {
	  // stop moving when mouse button is released:
	  document.onmouseup = null;
	  document.onmousemove = null;
	}
      }

function createdragablediv(id, content){
	let div = document.createElement('div');
	span = document.createElement("div");


	div.setAttribute('id', id+'dragable');
	div.setAttribute('class', 'dragable');
	document.body.appendChild(div);
	span.setAttribute('id', id+'dragableheader')
	span.setAttribute('class', 'dragableheader')
	span.innerHTML = id;
	div.appendChild(span);
	div.innerHTML += content;


	div.oncontextmenu = function(e){
		div.remove();
		return false;
	}
	

}

