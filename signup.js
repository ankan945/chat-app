const form = document.querySelector(".signup form");
const continueBtn = form.querySelector(".button input");
const errorText = form.querySelector(".error-txt");

form.onsubmit = (event)=>{
     event.preventDefault();  //prevents automatic form submission
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST" , "signup.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
                let data = xhr.response;
                if(data == "ho")
                {
                    location.href= "users.php";
                }
                else{
                    errorText.textContent = data;
                        errorText.style.display = "block";
                }
            }
        }
    }

    let formData = new FormData(form);
    xhr.send(formData);
}