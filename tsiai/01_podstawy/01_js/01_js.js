let liczba1E = document.querySelector('#liczba1')
let liczba2E = document.querySelector('#liczba2')
let btnE = document.querySelector('button')
let wynikE = document.getElementById('wynik')

btnE.addEventListener('click', (event) => {
    // console.log('bachabilska')
    // console.log(liczba1E)
    // console.dir(liczba1E)
    let liczba1 = liczba1E.valueAsNumber
    let liczba2 = liczba2E.valueAsNumber
   
    wynikE.innerHTML = `suma liczb to: ${liczba1 + liczba2}, a iloczyn liczb to: ${liczba1 * liczba2}`
})

// ZADANIE 2

let h2E = document.querySelector('h2')
h2E.addEventListener('click', (event) => {
    h2E.innerHTML = `Marcel Kozlowski:)`
    h2E.style.color='red'
})

let krotkieE = document.getElementById('krotkie')
let srednieE = document.getElementById('srednie')
let poldlugieE = document.getElementById('poldlugie')
let dlugieE = document.getElementById('dlugie')
let wlosyBtnE = document.getElementById('wlosy')
let rezultatE = document.getElementById('rezultat')

wlosyBtnE.addEventListener('click', (event)=> {
    if(krotkieE.checked){
        rezultatE.innerHTML = `Cena strzyżenia: 25 zl`
    }
    else if(srednieE.checked){
        rezultatE.innerHTML = `Cena strzyżenia: 30 zl`
    }
    else if(poldlugieE.checked){
        rezultatE.innerHTML = `Cena strzyżenia: 40 zl`
    }
    else if(dlugieE.checked){
        rezultatE.innerHTML = `Cena strzyżenia: 50 zl`
    }
    else{
        rezultatE.innerHTML = `Wybierz dlugosc wlosow`
    }
})
