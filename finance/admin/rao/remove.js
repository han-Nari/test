let x = document.querySelector('.remove');
	x.addEventListener('click', ()=> {
		document.querySelector('.update, .data').remove("closed");
	});