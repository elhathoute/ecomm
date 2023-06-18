console.log(',dfdfn,')
     document.querySelector('.image-div').addEventListener('click',(e)=>{
     document.querySelector('.file__img-input').click()
})
function display_edit_image(file){
            let allowed = ['jpg','jpeg','png'];
		    let ext = file.name.split(".").pop();
		    if(allowed.includes(ext.toLowerCase())){
                image_added=true
                //set image in background-img of div
               document.querySelector('.image-div').style.backgroundImage=`url(${URL.createObjectURL(file)})`
		    }else {
		        alert("Only the following image types are allowed:"+ allowed.toString(", "));
		    }
}

//hidden and ashow button 
document.querySelector('.add-button').addEventListener('click',()=>{
     document.querySelector('.overlay').classList.remove('active-showing')
     document.querySelector('.model_form').classList.remove('active-showing')
})
document.querySelector('.overlay').addEventListener('click',()=>{
     document.querySelector('.overlay').classList.add('active-showing')
     document.querySelector('.model_form').classList.add('active-showing')
})

document.querySelector('.cancel_button').addEventListener('click',(e)=>{
     e.preventDefault()
     //reset form from data 
     document.querySelector('.form-add').reset()
     document.querySelector('.overlay').classList.add('active-showing')
     document.querySelector('.model_form').classList.add('active-showing')
})
document.querySelector('.save_button').addEventListener('click',(e)=>{
     e.preventDefault()
     //reset form from data 
     document.querySelector('.form-add').reset()
     document.querySelector('.overlay').classList.add('active-showing')
     document.querySelector('.model_form').classList.add('active-showing')
})
