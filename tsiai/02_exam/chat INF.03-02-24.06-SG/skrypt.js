const sendE = document.getElementById('btnSend');
const randE = document.getElementById('btnRandom');
const messageE = document.getElementById('message');
const messageAreaE = document.querySelector('.chat');
const msgArray = ["Świetnie!",
"Kto gra główną rolę?",
"Lubisz filmy Tego reżysera?",
"Będę 10 minut wcześniej",
"Może kupimy sobie popcorn?",
"Ja wolę Colę",
"Zaproszę jeszcze Grześka Florydę",
"Tydzień temu też byłem w kinie na Diunie",
"Ja funduję bilety"];



sendE.addEventListener('click', (e)=>{
    console.log('test');
    let pE = document.createElement('p');
    pE.textContent = messageE.value;
    let imgE = document.createElement('img');
    imgE.src = 'Jolka.jpg';
    imgE.alt = 'Jolanta Nowak';
    let divE = document.createElement('div');
    divE.className = 'message jolanta';
    console.dir(divE)
    divE.appendChild(imgE);
    divE.appendChild(pE);
    messageAreaE.appendChild(divE);
})

randE.addEventListener('click', (e)=>{
    let random = Math.random()*9;
    random = Math.floor(random);
    console.log(msgArray[random]);
    let pE = document.createElement('p');
    pE.textContent = msgArray[random];
    let imgE = document.createElement('img');
    imgE.src = 'Krzysiek.jpg';
    imgE.alt = 'Krzysiek Łukasiński';
    let divE = document.createElement('div');
    divE.className = 'message krzysztof';
    divE.appendChild(imgE);
    divE.appendChild(pE);
    messageAreaE.appendChild(divE);
})




{/* <div class="message jolanta">
    <img src="Jolka.jpg" alt="Jolanta Nowak">
    <p>Cześć idziesz jutro do kina?</p>
</div> */}