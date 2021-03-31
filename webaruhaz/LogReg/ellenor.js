window.addEventListener("load",init);

function init(){
	document.getElementById('mentes').addEventListener("click",ellenorzes);
}

function ellenorzes(e){
	let j1=document.getElementById('jelszo').value;
	let j2=document.getElementById('conf_jelszo').value;

	if(j1.trim()!=j2.trim()){
		e.preventDefault();
	    document.getElementById('msg').innerHTML="A két jelszó nem egyezik meg!";
	}else {
		alert("Ön siekresen megváltoztatta a jelszavát!");
	}
}