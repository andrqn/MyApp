//Ожидаем нажатие кнопки логин и отправляем в обработчик signin.php

$("#login_btn").click(function (e) {
    e.preventDefault()
    let login = $("#login").val();
    let password = $("#password").val();
    if (login.indexOf(' ') > -1){
        $("#logError").text('В логине не должно быть пробелов');
        return false;
    }
    if(login===""){
        $("#logError").text('Логин не может быть пустым');
        return false;
    }
    $.ajax({
        type: "post",
        url: 'ajax/signin.php',
        dataType : "json",
        data : {'login':login ,'password': password },
        success : function (data) {
            if(data.status){
                document.location.href = 'profile.php'
            }
          else{
              if(data.error===1){
                  $("#errorMesLog").text('Такого логин не зарегистрирован');
                  return false;
              }

            else if(data.error===2){
                  $("#errorMesPass").text('Проверьте пароль');
                  return false;

              }

            }
        }
    });
});

//Ожидаем нажатие кнопки регистрация и отправляем в обработчик signup.php
$("#reg_btn").click(function (e) {
    e.preventDefault();

    let login = $("#login").val(),
        name = $("#name").val(),
        email = $("#email").val(),
        password = $("#password").val(),
        password_confirm = $("#password_conf").val(),
        err = 0;
    if(login === ""){
        $("#errorMesLog").text('Введите логин');
        err++;
        return false;
    }
    if (login.indexOf(' ') > -1){
        $("#errorMesLog").text('Логин не может содержать пробелы');
        return false;
    }

    if(login.length < 6 ){
        $("#errorMesLog").text('Логин не менее 6 символов');
        err++;
        return false;
    }
    if(name===""){
        $("#errorMesName").text('Введите имя');
        err++
        return false;
    }
    if (name.indexOf(' ') > -1){
        $("#errorMesName").text('В имени не должно быть пробелов');
        return false;
    }

    if(name.length > 2 ){
        $("#errorMesName").text('Имя не более 2 символов');
        err++;
        return false;
    }
    let namePat=/^[a-zA-Z]+$/;
    let resName = namePat.test(name);
    if (!resName) {
        $("#errorMesName").text('Имя должно содержать только символы');
        return false;
    }

    let emailPat=/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
    let res = emailPat.test(email);
    if(!res){
        $("#errorMesEmail").text('Введен неверный email');
        err++;
        return false;

    }
    if (password.length < 6){
        $("#errorMesPass").text('Пароль может быть не меньше 6 символов');
        return false;
    }

    let passPat=/^(?=.*\d)(?=.*[a-zA-Z])(?!.*\s).*$/;
    let resPass=passPat.test(password) ;

    if(!resPass){
        $("#errorMesPass").text('Пароль должен содержать буквы и цифры');
        return false;

    }
    if(password!==password_confirm){
        $("#errorMesConf").text('Пароли не совпадает');
        return false;
    }


        $.ajax({
            url: 'ajax/signup.php',
            type: 'POST',
            dataType: 'json',
            data: {
                'login':login,
                'name':name,
                'email':email,
                'password':password,
                'password_conf':password_confirm

            },
            success (data) {
                if (data.status) {
                    document.location.href = '/index.php';
                }
                else{
                    if(data.error===1){
                        $("#errorMesLog").text('Пользователь с таким логином уже зарегистрирован');
                        return false;

                    }
                    if (data.error===2){
                        $("#errorMesEmail").text('Пользователь с таким email уже зарегистрирован');
                        return false;
                    }

                }

            }


        });


})
















