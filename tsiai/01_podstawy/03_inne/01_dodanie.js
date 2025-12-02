const formE = document.querySelector('form');
const taskE = document.querySelector('#task');
const ulE = document.querySelector('ul');
const sendE = document.getElementById('send')
const resetE = document.getElementById('reset')
formE.addEventListener('submit',(e) => {
    e.preventDefault();
    let task = taskE.value;
    if(task.length>2){
        let liE = document.createElement('li');
    liE.textContent = task
    taskE.value = "";
    ulE.appendChild(liE);
    }
     if(!task==""){
        taskE.value = "";
     }
});