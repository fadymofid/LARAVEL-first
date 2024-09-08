////////////////////////save product/////////////////
console.log(document.URL.split('products')[1]);
let inputs = document.querySelectorAll('form .simulated');
for(let input of inputs){
    input.onkeyup=function(){

let input_name=event.target.getAttribute('name');
        let written_el =document.querySelector('.simulation .info span[related_to="'+input_name+'"]');
        written_el.innerHTML=event.target.value;
    }
}


//simulate image
let simulation_images=document.querySelector('.simulation .images');
document.querySelector('form input[type="file"]').onchange=function(){
   simulation_images.innerHTML=''
    for(let file of event.target.files){
       let img=document.createElement('img');
       img.src=URL.createObjectURL(file);
       simulation_images.appendChild(img);
   }
}



///////////////////////////////////////////////////////////////////////////////////////////////



