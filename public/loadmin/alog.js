const context = document.querySelector('.context');
const lbtn = document.querySelector('.log-btn');



lbtn.addEventListener('click',()=>{
    context.classList.remove('active');
})





    


 

    function colorvalid(variable, status) {
        if (status === 'success') {
            variable.classList.add('success-border'); 
            variable.classList.remove('error-border');
        } else {
            variable.classList.add('error-border');
            variable.classList.remove('success-border');
            valid = false;
        }
    }

    
    if (name === '') {
        colorvalid(nameElem, 'error'); 
    } else {
        colorvalid(nameElem, 'success');
    }

    
  



