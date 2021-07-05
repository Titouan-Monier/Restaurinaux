
var isDarkModeActivated = false;


function triggerNightMode() {
	if (isDarkModeActivated) {
		isDarkModeActivated = false;
		// enlever la classe dark de la balise body
		var bodys = document.getElementsByTagName('body');
		var body = bodys[0];
		body.classList.remove("dark")

	} else {
		isDarkModeActivated = true;
		//ajouter la classe dark à la balise body
		var bodys = document.getElementsByTagName('body');
		var body = bodys[0];
		body.classList.add("dark")
	}
}
class restau {
	constructor (name,stars,nbravis,img){
		this.name = newName;
		this.stars = newStars;
		this.nbravis = newNbravis;
		this.img = newImg;
		
	}
	
	
}

 



/*init()

function init () {
	var allStars = document.querySelectorAll (".fa-star");
 	console.log ("allStars",allStars);

	allStars.forEach ( (star) => {
		star.addEventListener ("click",getRating);
		star.addEventListener ("mouseover", addCSS);
		star.addEventListener ("mouseleave", removeCSS)

	});

}

function getRating(e) {
	console.log(e.target.dataset, e.target.nodeName, e.target.nodeType);
}

function addCSS (e, css="checked"){
	const overedStar = e.target;
	overedStar.classList.add(css);
	const previousSiblings = getPreviousSiblings (overedStar);
	console.log ("previousSiblings",previousSiblings);
	previousSiblings.forEach((elem) => elem.classList.add(css));

}

function removeCSS(e, css= "checked") {
	e.target.classList.remove(css);
}
function getPreviousSiblings (elem) {
	console.log ("elem.previousSibling", elem.previousSiblings);
	let siblings =[];
	const spanNodeType = 1;
	while ((elem = elem.previousSiblings)) {
		if (elem.nodeType === spanNodeType) {
			siblings = [elem, ...siblings];
		}
	}
	return siblings;
}
*/