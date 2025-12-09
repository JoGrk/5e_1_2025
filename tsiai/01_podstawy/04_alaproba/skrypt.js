const oneImgE = document.querySelector('nav img');
const allImgE = document.querySelectorAll('nav img');
const mainOneImgE = document.querySelector('main img')
const mainAllImgE = document.querySelectorAll('main img');
const asideAllSpanE = document.querySelectorAll('aside span');



// oneImgE.addEventListener('click', (e)=>{
//     oneImgE.classList.toggle('border');
//     if(oneImgE.classList.contains('border')){
//         mainOneImgE.src=oneImgE.src;
//     }else{
//         mainOneImgE.src = "";
//     }

// })

allImgE.forEach((imgE,idx) => {
    imgE.addEventListener('click', (e)=>{
        imgE.classList.toggle('border');
        console.log(idx)
        if(imgE.classList.contains('border')){
        mainAllImgE[idx].src=imgE.src;
        asideAllSpanE[idx].style.display="inline";
    }else{
        mainAllImgE[idx].src = "";
        asideAllSpanE[idx].style.display="none";
    }
    })
});

