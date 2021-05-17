let counter = document.querySelector('h1');
let count = 1;

setInterval(()=>{

	counter.innerText = count;
	count++;

	if(count > 5) location.replace('C:/xampp/htdocs/Project php/Home.php')
},1000)