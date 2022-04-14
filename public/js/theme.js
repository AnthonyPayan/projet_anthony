function choice() {
	if (localStorage.getItem("theme") == "dark") {
		changeToDark();
	} else {
		changeToLight();
	}
}

choice();

function changeTheme() { //Detection du theme dans le localStorage.
	let getTheme = localStorage.theme; //Récupère la valeur "theme" dans le localStorage
	if (getTheme == "dark") {
		localStorage.theme = "light";
		changeToLight();
	} else {
		localStorage.theme = "dark";
		changeToDark();
	}
}

function changeToLight() {
	document.styleSheets[1]['cssRules'][5]['style']['background-color'] = "#efefef"; /*body*/

	document.styleSheets[1]['cssRules'][56]['style']['background-color'] = "white"; /*nav*/
	document.styleSheets[1]['cssRules'][62]['style']['background-color'] = "white"; /*main*/
	document.styleSheets[1]['cssRules'][116]['style']['left'] = "13px"; /*.slider::before*/
	document.styleSheets[1]['cssRules'][116]['style']['background-color'] = "white"; /*.slider::before*/
}

function changeToDark() {
	document.styleSheets[1]['cssRules'][5]['style']['background-color'] = "black"; /*body*/

	document.styleSheets[1]['cssRules'][56]['style']['background-color'] = "#1c1c1c"; /*nav*/
	document.styleSheets[1]['cssRules'][62]['style']['background-color'] = "#1c1c1c"; /*main*/
	document.styleSheets[1]['cssRules'][116]['style']['left'] = "4px"; /*.slider::before*/
	document.styleSheets[1]['cssRules'][116]['style']['background-color'] = "#1c1c1c"; /*.slider::before*/
}

document.addEventListener('DOMContentLoaded', function () { // Quand l'arbre HTML est entièrement chargé par le navigateur
	document.querySelector("#activateur_fonction").addEventListener("click", changeTheme);
});

// Info sur feuille de style
// let style = document.styleSheets[1]['cssRules'];
// console.log(style);