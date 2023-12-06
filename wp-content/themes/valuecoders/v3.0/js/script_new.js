let accordinList = document.querySelectorAll('.accordin-list');
accordinList.forEach(accordinLists => accordinLists.addEventListener('click',(e)=>{
  
  for (i = 0; i < accordinList.length; i++) {
    
    accordinList[i].className = accordinList[i].className.replace(" active", "");
    accordinList[i].className = accordinList[i].className.replace(" rotate", "");
}
  e.currentTarget.className += " active"
  e.currentTarget.className += " rotate"
}))

let header = document.querySelector('.header-two');

window.onscroll = () =>{
  if( document.documentElement.scrollTop > 20){
    header.classList.add('headerBg');
  }
  else{
    header.classList.remove('headerBg');
  }
}