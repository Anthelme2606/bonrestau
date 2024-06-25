document.addEventListener('DOMContentLoaded', function() {
const body = document.querySelector('body'),
sidebar = body.querySelector('aside'),
toggle = body.querySelector(".toggle"),
searchBtn = body.querySelector(".search-box"),
modeSwitch = body.querySelector(".toggle-switch"),
modeText = body.querySelector(".mode-text");

    document.addEventListener('click',(eve)=>{
      
      if(!eve.target.closest('.sidebar') )
      sidebar.classList.add('close');
      })
  

     
      document.querySelectorAll('.side-link a').forEach(function(link) {
        const url = window.location.href;
    
        if (link.href === url) {
           // link.classList.add('active');
            link.parentElement.classList.add('active-sidebar'); 
        }
    });
    
       

toggle.addEventListener("click" , () =>{
sidebar.classList.toggle("close");
})


modeSwitch.addEventListener("click" , () =>{
body.classList.toggle("dark");

if(body.classList.contains("dark")){
  modeText.innerText = "Light mode";
}else{
  modeText.innerText = "Dark mode";
  
}
});
});