const context = document.querySelector('.context');
const rbtn = document.querySelector('.reg-btn');
const lbtn = document.querySelector('.log-btn');

rbtn.addEventListener('click',()=>{
    context.classList.add('active');
})


lbtn.addEventListener('click',()=>{
    context.classList.remove('active');
})


const registerform = document.getElementById("form-register");

registerform.addEventListener("submit", function (check) {
    let valid = true;

    
    const nameElem = document.getElementById('user');
    const birthElem = document.getElementById('birth');
    const passElem = document.getElementById('password');
    const mobileElem = document.getElementById('mobile');
    const emailElem = document.getElementById('email');
    const cpassElem = document.getElementById('cpass');

    
    const name = nameElem.value.trim();
    const birth = birthElem.value.trim();
    const password = passElem.value;
    const cpassword = cpassElem.value;
    const telephone = mobileElem.value;

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

    
    const birthday = new Date(birth);
    const today = new Date();
    let age = today.getFullYear() - birthday.getFullYear();

    if (birth === '' || age < 18) { 
        colorvalid(birthElem, 'error');
    } else {
        colorvalid(birthElem, 'success');
    }

    const mobilepattern = /^[0-9]+$/;
    
    if(mobilepattern.test(telephone) && telephone.length === 10){
        colorvalid(mobileElem, 'success');
    }
    else{
        colorvalid(mobileElem, 'error');
    }

    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
    if(passwordPattern.test(password) && password.length === 8){
        colorvalid(passElem, 'success');
    }
    else{
        colorvalid(passElem, 'error');
    }



    if ( password !== cpassword) {
        
        colorvalid(cpassElem, 'error');
    } else {
        
        colorvalid(cpassElem, 'success');
    }

    
    if (!valid) {
        check.preventDefault();
    }
});


