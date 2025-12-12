const left = document.getElementById('left');
const right = document.getElementById('right');
const image = document.querySelector('main img');
const images = [
    'jeden.jpg','dwa.jpg','trzy.jpg','cztery.jpg','pięć.jpg','sześć.jpg'
];
let imageIndex = 0; 
left.addEventListener('click', (e)=>{
    if(imageIndex>0){
        imageIndex--;
    }
    image.src=images[imageIndex];
})
right.addEventListener('click', (e)=>{
    if(imageIndex<images.length-1){
        imageIndex++;
    }
    image.src=images[imageIndex];
})