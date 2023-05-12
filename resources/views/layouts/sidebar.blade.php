<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>

<body style="margin:0px">
    <header class="flex space-between" style="padding:15px; background-color:white; box-shadow: 1px 12px 9px -8px rgba(0,0,0,0.24);
-webkit-box-shadow: 1px 12px 9px -8px rgba(0,0,0,0.24);
-moz-box-shadow: 1px 12px 9px -8px rgba(0,0,0,0.24);  background-color:#00995D;">
        <img style="width:100px;height:30px;" src="" alt="Logo">
       <form action="/logout" method="post">
            @csrf
           
            <img src="./img/logout.png" alt="sair" style="width:35px">
            <input type="submit">
       </form>
    </header>

    <div>
        <div style="display: flex;">
            <nav id="menu-nav" style="margin:0px 0px; position: absolute; background-color:white; height: 100vh; width:200px; display:none; -webkit-box-shadow: 5px 1px 5px -1px rgba(0,0,0,0.17);
-moz-box-shadow: 5px 1px 5px -1px rgba(0,0,0,0.17);
box-shadow: 5px 1px 5px -1px rgba(0,0,0,0.17);   top: 0;
  left: 0;

  height: 100%; background-color:#00995D; color:white">
                <ul style="list-style: none;">
                    <li>
                        <h4 style="font-weight: normal;">Menu Principal</h4>
                    </li>
                    <li>
                        <h4 style="font-weight: normal;">Meus Dados</h4>
                    </li>
                </ul>
            </nav>

            <div style="display:flex; align-content:center; background-color:white; height:50px; width:100%; align-items:center;" >
                <button id="menu-button" onclick="showMenu()" style="height: max-content; margin-left:10px;">Menu</button>
                <h4 style="margin:0px; margin-left:5px;">INFORMAÇÕES ATUALIZADAS ATÉ MAR/23</h4>
            </div>
        </div>

        <section style="margin:10px 10px">
            @yield('conteudo')
        </section>
    </div>

    <style>
        .flex {
            display: flex;
        }

        .space-between {
            justify-content: space-between;
        }
    </style>

    <script>
        // seleciona o botão que mostra/oculta o menu
        var menuButton = document.getElementById("menu-button");
        // seleciona o menu
        var menuNav = document.getElementById("menu-nav");
        // seleciona a barra de navegação
        var navbar = document.getElementById("navbar");
        // adiciona um evento de clique ao documento
        document.addEventListener("click", function(event) {
            // verifica se o clique foi fora do menu
            if (event.target != menuNav && event.target != menuButton) {
                // oculta o menu e a barra de navegação
                menuNav.style.display = "none";
                navbar.style.display = "none";
            }
        });

        function showMenu() {
            var menuNav = document.getElementById("menu-nav");
            if (menuNav.style.display == "block") {
                menuNav.style.display = "none";
            } else {
                menuNav.style.display = "block";
            }
        }
    </script>
</body>

</html>