<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery.min.js"></script>
    <script src="app_landing.js"></script>

    <!-- ajax.phpden donen json basarılı ya da basarısız ise donen htmlerin stili-->
    <style>
    #basarili {
        padding: 10px;
        background: green;
        color: #fff;
        display: none; /*Htmlde gizli olması icin gerekli*/
    }
    #hata {
        padding: 10px;
        background: red;
        color: #fff;
        display: none;
    }
    #create_account {
        display: none;
    }
    </style>
    
</head>
<body>

<div id="basarili"></div> <!--ajax.phpden dönen json basarılı ise atanan html -->
<div id="hata"></div>

<!-- Formu olusturmaya başlıyorum -->
<form action="" method="post" id="landing-page-form" onsubmit="return false">

    <!-- Ad-Soyadı almaya yarayan input -->
    Username: <br>
    <input type="text" placeholder="Your user name" name="username_l" id="username_l"> <br><br>

    Password: <br>
    <input type="text" placeholder="Your Password" name="password_l" id="password_l"> <br><br>

    <button type="submit" id="sign-up">Sign Up</button>
    <button type="submit" id="create_account" display ="none">Create An Account</button>

</form>
</body>
</html>