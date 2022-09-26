var content=document.querySelector('#hamburger-content');
var sidebarbody=document.querySelector('#hamburger-sidebar-body');
var button = document.querySelector('#hamburger-button');
var overlay= document.querySelector('#hamburger-overlay');
var activatedClass='hamburger-activated';

sidebarbody.innerHTML=content.innerHTML;

button.addEventListener('click', function(e){
	e.preventDefault();
	this.parentNode.classList.add(activatedClass);
});
button.addEventListener('keydown', function(e){
	if (this.parentNode.classList.contains(activatedClass)) {
		if (e.repeat===false && e.which===27) 
		this.parentNode.classList.remove(activatedClass);
	}
});
overlay.addEventListener('click', function(e){
	e.preventDefault();
	this.parentNode.classList.remove(activatedClass);
});