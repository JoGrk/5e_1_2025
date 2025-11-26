let firstD = document.querySelector("div.first")
let secondD = document.querySelector("div.second")
let thirdD = document.querySelector("div.third")
let firstM = document.querySelector("section.first")
let secondM = document.querySelector("section.second")
let thirdM = document.querySelector("section.third")

console.log(firstD)

function zeroing(){

    firstD.style.backgroundColor= '#FFAEA5'
    secondD.style.backgroundColor= '#FFAEA5'
    thirdD.style.backgroundColor= '#FFAEA5'
    firstM.style.display='none'
    secondM.style.display='none'
    thirdM.style.display='none'
}



firstD.addEventListener('click',e=>{
    zeroing()
    firstD.style.backgroundColor='MistyRose'
    firstM.style.display='block'
})

secondD.addEventListener('click',e=>{
    zeroing()
    secondD.style.backgroundColor='MistyRose'
    secondM.style.display='block'
})

thirdD.addEventListener('click',e=>{
    zeroing()
    thirdD.style.backgroundColor='MistyRose'
    thirdM.style.display='block'
})
