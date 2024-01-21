const Close_eye = document.querySelector("#close-eye");
    const Open_eye = document.querySelector("#open-eye");
    const PasswordIn = document.querySelector("#password_input");


    Close_eye.addEventListener('click', function () {
    if (PasswordIn.type === 'password') {
        PasswordIn.type = 'text';
        Close_eye.style.display = 'none';
        Open_eye.style.display = 'block';
    } else {
        PasswordIn.type = 'password';
        Close_eye.style.display = 'block';
        Open_eye.style.display = 'none';
    }
    });

    Open_eye.addEventListener('click', function () {
    if (PasswordIn.type === 'text') {
        PasswordIn.type = 'password';
        Close_eye.style.display = 'block';
        Open_eye.style.display = 'none';
    }
});   