let activePage = window.location.pathname;
let navLinks = document.querySelectorAll('a');

navLinks.forEach(item => {
    if(item.href.includes(`${activePage}`)) {
        item.classList.add('active');
    }
});

let navBtn = document.querySelector('.bar');
let sideBar = document.querySelector('nav');
let ul = document.querySelector('ul');
let changeIcon = document.querySelector('.fa-bars');
let main = document.querySelector('main');

navBtn.addEventListener('click', () => {
    main.classList.toggle('slide');
});

let closed = document.querySelector('.closed');
    closed.addEventListener('click', ()=> {
    main.classList.remove('slide');
});



let dropdown = document.querySelector('.menu');
let dropdownMenu = document.querySelector('.dropdown-menu');
let caret = document.querySelector('.right');

dropdown.addEventListener('click', () => {
	dropdownMenu.classList.toggle('show');
	caret.classList.toggle('show');
});

let dropdown_1 = document.querySelector('.menu_one');
let dropdownMenu_1 = document.querySelector('.dropdown-menu_one');
let caret_1 = document.querySelector('#right');

dropdown_1.addEventListener('click', () => {
	dropdownMenu_1.classList.toggle('show');
	caret_1.classList.toggle('show');
});

let dropdown_2 = document.querySelector('.menu_two');
let dropdownMenu_2 = document.querySelector('.dropdown-menu_two');
let caret_2 = document.querySelector('#right_two');

dropdown_2.addEventListener('click', () => {
	dropdownMenu_2.classList.toggle('show');
	caret_2.classList.toggle('show');
});

// let dropdown_3 = document.querySelector('.menu_three');
// let dropdownMenu_3 = document.querySelector('.dropdown-menu_three');
// let caret_3 = document.querySelector('#right_three');

// dropdown_3.addEventListener('click', () => {
//     dropdownMenu_3.classList.toggle('show');
//     caret_3.classList.toggle('show');
// });


let down = document.querySelector('.down');
let drp_menu = document.querySelector('.drp_menu');

down.addEventListener('click', () => {
	drp_menu.classList.toggle('out');
});

document.onclick = function(e) {
	if(down !== e.target && drp_menu !== e.target) {
		drp_menu.classList.remove('out');
	}
}

function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();

// let changeTheme = document.querySelector('.white');
// let main = document.querySelector('main');

// changeTheme.addEventListener('click', ()=> {
// 	main.classList.toggle('changeColor');
// 	nav.classList.toggle('changeColor');
// });

// const active = document.querySelectorAll('li');
// active.forEach(item => {
// 	item.addEventListener('click', ()=> {
// 		active.forEach(item => {
// 			item.classList.remove('active');
// 		});
// 			item.classList.add('active');
// 	});
// });
