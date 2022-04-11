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
	document.styleSheets[1]['cssRules'][3]['style']['color'] = "cornflowerblue"; /*a*/
	document.styleSheets[1]['cssRules'][4]['style']['color'] = "cornflowerblue"; /*h1,h2,h3,h4,h5,h6*/
	document.styleSheets[1]['cssRules'][5]['style']['background-color'] = "#efefef"; /*body*/
	document.styleSheets[1]['cssRules'][9]['style']['color'] = "cornflowerblue"; /*.star_note*/
	document.styleSheets[1]['cssRules'][16]['style']['color'] = "white"; /*.container-info*/
	document.styleSheets[1]['cssRules'][16]['style']['background-color'] = "#81a7ea"; /*.container-info*/
	document.styleSheets[1]['cssRules'][35]['style']['background-color'] = "cornflowerblue"; /*.btn*/
	document.styleSheets[1]['cssRules'][35]['style']['border'] = "1px cornflowerblue solid"; /*.btn*/
	document.styleSheets[1]['cssRules'][36]['style']['border'] = "1px royalblue solid"; /*.btn:hover*/
	document.styleSheets[1]['cssRules'][38]['style']['color'] = "cornflowerblue"; /*.form-section*/
	document.styleSheets[1]['cssRules'][40]['style']['color'] = "cornflowerblue"; /*label*/
	document.styleSheets[1]['cssRules'][42]['style']['border'] = "1px cornflowerblue solid"; /*select:hover*/
	document.styleSheets[1]['cssRules'][44]['style']['border'] = "1px cornflowerblue solid"; /*input:focus*/
	document.styleSheets[1]['cssRules'][45]['style']['border'] = "1px cornflowerblue solid"; /*input:hover*/
	document.styleSheets[1]['cssRules'][46]['style']['background-color'] = "cornflowerblue"; /*.form-label*/
	document.styleSheets[1]['cssRules'][46]['style']['border'] = "1px royaleblue solid"; /*.form-label*/
	document.styleSheets[1]['cssRules'][54]['style']['border'] = "1px cornflowerblue solid"; /*.textarea:hover*/
	document.styleSheets[1]['cssRules'][55]['style']['border'] = "1px cornflowerblue solid"; /*.textarea:focus*/
	document.styleSheets[1]['cssRules'][56]['style']['background-color'] = "white"; /*nav*/
	document.styleSheets[1]['cssRules'][57]['style']['color'] = "cornflowerblue"; /*nav a*/
	document.styleSheets[1]['cssRules'][58]['style']['color'] = "#026ef5"; /*nav a:hover*/
	document.styleSheets[1]['cssRules'][62]['style']['background-color'] = "white"; /*main*/
	document.styleSheets[1]['cssRules'][70]['style']['background-color'] = "#81a7ea"; /*.span-number*/
	document.styleSheets[1]['cssRules'][84]['style']['color'] = "cornflowerblue"; /*.p2*/
	document.styleSheets[1]['cssRules'][87]['style']['color'] = "cornflowerblue"; /*.show-recipe-ranked*/
	document.styleSheets[1]['cssRules'][92]['style']['color'] = "cornflowerblue"; /*.profil-section*/
	document.styleSheets[1]['cssRules'][93]['style']['color'] = "cornflowerblue"; /*.profil-section*/
	document.styleSheets[1]['cssRules'][107]['style']['color'] = "cornflowerblue"; /*.scroll-table*/
	document.styleSheets[1]['cssRules'][109]['style']['color'] = "royaleblue"; /*.scroll-table i:hover*/
	document.styleSheets[1]['cssRules'][115]['style']['background-color'] = "cornflowerblue"; /*.slider*/
	document.styleSheets[1]['cssRules'][116]['style']['left'] = "13px"; /*.slider::before*/
	document.styleSheets[1]['cssRules'][116]['style']['background-color'] = "white"; /*.slider::before*/
	document.styleSheets[1]['cssRules'][117]['style']['background-color'] = "cornflowerblue"; /*.slider::before*/

}

function changeToDark() {
	document.styleSheets[1]['cssRules'][3]['style']['color'] = "orange"; /*a*/
	document.styleSheets[1]['cssRules'][4]['style']['color'] = "orange"; /*h1,h2,h3,h4,h5,h6*/
	document.styleSheets[1]['cssRules'][5]['style']['background-color'] = "black"; /*body*/
	document.styleSheets[1]['cssRules'][9]['style']['color'] = "orange"; /*.star_note*/
	document.styleSheets[1]['cssRules'][16]['style']['color'] = "orange"; /*.container-info*/
	document.styleSheets[1]['cssRules'][16]['style']['background-color'] = "#1c1c1c"; /*.container-info*/
	document.styleSheets[1]['cssRules'][35]['style']['background-color'] = "orange"; /*.btn*/
	document.styleSheets[1]['cssRules'][35]['style']['border'] = "1px orangered solid"; /*.btn*/
	document.styleSheets[1]['cssRules'][36]['style']['border'] = "1px orangered solid"; /*.btn:hover*/
	document.styleSheets[1]['cssRules'][38]['style']['color'] = "orange"; /*.form-section*/
	document.styleSheets[1]['cssRules'][40]['style']['color'] = "#FF803E"; /*label*/
	document.styleSheets[1]['cssRules'][42]['style']['border'] = "1px orange solid"; /*select:hover*/
	document.styleSheets[1]['cssRules'][44]['style']['border'] = "1px orangered solid"; /*input:focus*/
	document.styleSheets[1]['cssRules'][45]['style']['border'] = "1px orange solid"; /*input:hover*/
	document.styleSheets[1]['cssRules'][46]['style']['background-color'] = "orange"; /*.form-label*/
	document.styleSheets[1]['cssRules'][46]['style']['border'] = "1px orangered solid"; /*.form-label*/
	document.styleSheets[1]['cssRules'][54]['style']['border'] = "1px orange solid"; /*.textarea:hover*/
	document.styleSheets[1]['cssRules'][55]['style']['border'] = "1px orange solid"; /*.textarea:focus*/
	document.styleSheets[1]['cssRules'][56]['style']['background-color'] = "#1c1c1c"; /*nav*/
	document.styleSheets[1]['cssRules'][57]['style']['color'] = "orange"; /*nav a*/
	document.styleSheets[1]['cssRules'][58]['style']['color'] = "orangered"; /*nav a:hover*/
	document.styleSheets[1]['cssRules'][62]['style']['background-color'] = "#1c1c1c"; /*main*/
	document.styleSheets[1]['cssRules'][70]['style']['background-color'] = "orangered"; /*.span-number*/
	document.styleSheets[1]['cssRules'][84]['style']['color'] = "orangered"; /*.p2*/
	document.styleSheets[1]['cssRules'][87]['style']['color'] = "orange"; /*.show-recipe-ranked*/
	document.styleSheets[1]['cssRules'][92]['style']['color'] = "orangered"; /*.profil-section*/
	document.styleSheets[1]['cssRules'][93]['style']['color'] = "orangered"; /*.profil-section span*/
	document.styleSheets[1]['cssRules'][107]['style']['color'] = "orange"; /*.scroll-table*/
	document.styleSheets[1]['cssRules'][109]['style']['color'] = "orangered"; /*.scroll-table i:hover*/
	document.styleSheets[1]['cssRules'][115]['style']['background-color'] = "orange"; /*.slider*/
	document.styleSheets[1]['cssRules'][116]['style']['left'] = "4px"; /*.slider::before*/
	document.styleSheets[1]['cssRules'][116]['style']['background-color'] = "#1c1c1c"; /*.slider::before*/
	document.styleSheets[1]['cssRules'][117]['style']['background-color'] = "orange"; /*.slider::before*/

}

document.addEventListener('DOMContentLoaded', function () { // Quand l'arbre HTML est entièrement chargé par le navigateur
	document.querySelector("#activateur_fonction").addEventListener("click", changeTheme);
});

// Info sur feuille de style
let style = document.styleSheets[1]['cssRules'];
console.log(style);