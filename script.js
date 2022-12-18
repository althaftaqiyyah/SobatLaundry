let btn = document.querySelector('#btn');
let sidebar = document.querySelector('.sidebar');
let srcbtn = document.querySelector('.bx-search');

btn.onclick = function(){
    sidebar.classList.toggle('active');
}
srcbtn.onclick = function(){
    sidebar.classList.toggle('active');
}