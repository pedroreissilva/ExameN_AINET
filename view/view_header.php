<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript">
        /*this function presents the login  popup*/
        function present_login_menu(div_id){
            var menu = document.getElementById(div_id);
            if(menu.style.display == "block"){
                menu.style.display = "none";
            }else{
                menu.style.display = "block";
            }
        }
    </script>

    <meta charset="UTF-8">
    <link rel = "stylesheet" type="text/css" href="style/style.css">
    <title>Home</title>
</head>
<body>
<div id = "main">
<div id = "header">
    <div id = "header_site_name">
        <p>DEI News</p>
    </div>
    <div id = "header_site_login">
        <a href = "javascript:void(0)" onclick="present_login_menu('login_menu_main_container')">Entrar</a>
    </div>
</div>




