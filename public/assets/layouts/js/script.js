document.addEventListener('DOMContentLoaded',()=>{
  var svg_sidebar=document.querySelector('.svg-sidebar');
  
  svg_sidebar.addEventListener('click',()=>{
var sidebar=document.querySelector('.sidebar');
//sidebar.classList.add('open');
if(sidebar.classList.contains('isClose')){
  sidebar.classList.remove('isClose')
  sidebar.classList.add('isOpen')
}
else{
  sidebar.classList.remove('isOpen');
  sidebar.classList.add('isClose');
}

  });
});