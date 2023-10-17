const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button");

form.onsubmit = (e)=>{
    e.preventDefault();//preventing form from submiting
}

sendBtn.onclick = ()=>{
      // let's start Ajax
   let xhr = new XMLHttpRequest();//creating XML object
   xhr.open("POST", "php/insert-chat.php", true);
   xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                
            }
        }
   }
   // we have to send the form data through ajax to php
   let formData = new FormData(form);//creating new formDAta obj  
   xhr.send(formData);// sending the form data to php
}
