mods = [...document.getElementsByTagName("label")].filter((value)=>{
	return !isNaN(value.innerHTML)
});

vals = [...document.getElementsByClassName("stats")];

for(let i =0; i < 3; i++){
	vals[i].addEventListener("change", ()=>
	{
		if(vals[i].value <= 0) vals[i].value = 10;

		console.log();
		if ((vals[i].value - 10)/2<0){
			mods[i].innerHTML = Math.floor((vals[i].value - 10)/2);
		}
		else{
			mods[i].innerHTML = Math.floor((vals[i].value - 10)/2);
		}
	});
	if(vals[i].value <= 0) vals[i].value = 10;

		console.log();
		if ((vals[i].value - 10)/2<0){
			mods[i].innerHTML = Math.floor((vals[i].value - 10)/2);
		}
		else{
			mods[i].innerHTML = Math.floor((vals[i].value - 10)/2);
		}
}