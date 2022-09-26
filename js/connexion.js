let userName=document.getElementById("txtusername");
let passWord=document.getElementById("txtpassword");
let form=document.querySelector("form");
function valider(){
	if (userName.value.trim()=="") {
		let parent=userName.parentElement;
		let message=parent.querySelector("small");
		message.style.visibility="visible";
		message=innerText="remplir ce champs";
	}else{
		let parent=userName.parentElement;
		let message=parent.querySelector("small");
		message.style.visibility="hidden";
		message=innerText="";
	}
}
document.querySelector("button")
.addEventListener("click",(event)=>{
	event.preventDefault();
	valider();
});