document.addEventListener("DOMContentLoaded", () => {
    const myForm = document.querySelector('#myForm');
    const steps = document.querySelectorAll('.step-s');
    steps.forEach((step)=>{
        const computedStyle = window.getComputedStyle(step);
    });
  

    if (myForm) {
        resetForm(myForm);
    } else {
        console.error('Form with ID "myForm" not found.');
    }

    function validatePassword(pass) {
        const password = document.querySelector(`#${pass}`);
        const validate = document.querySelector('.submit');
        const passwordRegex =/^[^\s@]+@[^\s@]+\.[^\s@]+$/; ///^[a-zA-Z])(?=.*[0-9])(?=.*[!@#$%^&*-])(?=.{8,})$/;
          console.log(passwordRegex.test("Anth@gmail.com"));
        if (passwordRegex.test(password.value)) {
            password.classList.remove('invalid');
            password.classList.add('valid');
            validate.type = 'submit';
        } else {
            password.classList.remove('valid');
            password.classList.add('invalid');
            validate.type = 'button';
        }
    }
    
function validateEmail(mail) {
    const email = document.querySelector(`#${mail}`);
    const validate=document.querySelector('#validate');
    console.log(validate.value);
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (emailRegex.test(email.value)) {
       
        email.style.borderBottomColor = 'green';
        validate.type="submit";
    } else {
       
        email.style.borderBottomColor = 'red';
        validate.type="button";
    }
}
const checkboxes = document.querySelectorAll('.checkbox');

checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () => {
        if (checkbox.checked) {
            checkboxes.forEach(box => {
                if (box !== checkbox) {
                    box.checked = false;
                }
            });
        }
    });
});

function resetForm(form) {
    const elements = form.elements;
    for (let i = 0; i < elements.length; i++) {
        const element = elements[i];
        switch (element.type) {
            case 'text':
                element.value='';
                break;
            case 'email':  
                element.value ='';
            element.addEventListener('input',()=>{
                
                validateEmail(element.id);
            });
                
                break;
             case 'password':  
                element.value ='0';
               
                element.addEventListener('input',()=>{
                
                  //  validatePassword(element.id);
                });
                break;
            case 'textarea':
            case 'number':
            case 'date':
                element.value='';
                break;
            case 'tel':
                element.value = element.defaultValue;
                break;
            case 'checkbox':
            case 'radio':
                element.checked = element.defaultChecked;
                break;
            case 'select-one':
            case 'select-multiple':
                const options = element.options;
                for (let j = 0; j < options.length; j++) {
                    options[j].selected = options[j].defaultSelected;
                }
                break;
            default:
                break;
        }
    }
}

            function updateNext(step) {

                let next_step = document.querySelector(`.step-${step+1}`);
                let custep = document.querySelector(`.step-${step}`);
                let btn = document.querySelector(`.next-${step}`);
                btn.addEventListener('click', () => {


                    let step_r = document.querySelectorAll('.step-round');
                    for (let q = 0; q < step_r.length; q++) {
                        if (q + 1 == step) {
                            step_r[q].classList.remove('active-step');
                            step_r[q + 1].classList.add('active-step');

                        }
                    }

                    custep.classList.add('d-none');
                    next_step.classList.remove('d-none');
                })


            }

            function updatePrev(step) {

                let prev_step = document.querySelector(`.step-${step-1}`);
                let custep = document.querySelector(`.step-${step}`);
                let btn = document.querySelector(`.prev-${step}`);
                //console.log(btn);
                btn.addEventListener('click', () => {

                    let step_r = document.querySelectorAll('.step-round');
                    for (let q = 0; q < step_r.length; q++) {
                        if (q + 1 == step) {
                            step_r[q].classList.remove('active-step');
                            step_r[q - 1].classList.add('active-step');

                        }
                    }
                    custep.classList.add('d-none');
                    prev_step.classList.remove('d-none');
                })


            }
            //let steps = document.querySelectorAll('.step-s');
            let currentStep = 1;

            for (let i = 1; i <= steps.length; i++) {

                if (!steps[i - 1].classList.contains('d-none') && currentStep >= 1) {
                    currentStep = i;
                    updateNext(currentStep);
                    updatePrev(currentStep);


                } else {
                    currentStep = i;
                    updateNext(currentStep);
                    updatePrev(currentStep);
                }

            }
        }); 
