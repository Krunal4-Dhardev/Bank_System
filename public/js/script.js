function disp(event)
{
  
    const number = Number(event.value);
    if (!number) return false;

    if (number > 50000) {
        document.getElementById("pancheck").classList.remove('d-none');
        document.getElementById("pancarddisp").required = true;
        return false;
    } 
    document.getElementById("pancheck").classList.add('d-none')
}

function despositcheck(event)   
{
    const number=Number(event.value);

    if(number < 5000)
    {
        alert("Minimum You have to deposit 5000 ");
        document.getElementById("deposit").focus();
        return false;
    }
}
function check()
{
    const captcha=document.getElementById("captchacode").value;
    const captchuser=document.getElementById("captchauser").value;
    if(captcha == captchuser)
    {
        return true;
    }
    else
    {
        document.getElementById("captchauser").focus();
        return false;
    }
}

function getRandomString(length) {
    alert(length);
    var randomChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var result = '';
    for ( var i = 0; i < length; i++ ) {
        result += randomChars.charAt(Math.floor(Math.random() * randomChars.length));
    }
    alert(result);
    document.getElementById("captchacode").value=" "+result;
}
