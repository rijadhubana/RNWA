<!DOCTYPE html>

<html>
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP MVC</title>
    <style>
        :root{
    --primary-color: rgb(247, 247, 244);
    --hover-color: rgba(212,172,12,0.95);
    --navigation-color: rgb(212, 212, 204);
    --background-color: rgb(252, 252, 252);
  }
        #mainDiv
        {
            width: 95vw;
            height: 95vh;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background-color: var(--background-color);
        }
        #lijeviDiv
        {
            width:20%;
            height: 100%;
            background-color: var(--primary-color);
            border-right-color: var(--navigation-color);
            border-right-style: solid;
            border-right-width: 3px;
            float:left;
        }
        #logoDiv
        {
            height: 15%;
        }
        #navDiv
        {
            height:84%;
        }
        #desniDiv
        {
            background-color: var(--background-color);
            width: 79%;
            height: 100%;
            float:right;
        }
        #desniHeaderDiv
        {
            height:15%;
        }
        #desniMainDiv
        {
            height:82%;
        }
        #desniFooterDiv
        {
            height:3%;
        }
        #imdbLogo
        {
            height:90%;
            width: auto;
            padding: 5px;
            float:left;
        }
        #logoDiv h3
        {
            float:right;
            height:90%;
            width:40%;
            margin-right: 5%;
            word-wrap: break-word;
        }
        .navList
        {
            border-top-color: var(--navigation-color);
            border-top-style: solid;
            border-top-width: 3px;
            border-bottom-color: var(--navigation-color);
            border-bottom-style: solid;
            border-bottom-width: 2px;
            width:100%;
            height:14%;
            list-style-type: none;
            margin-left: 0%;
            transition: 300ms;

        }
        .navList:hover
        {
            background-color: var(--hover-color);
            transition: 300ms;
            cursor: pointer;
        }
        .navListSlikaPravougaonik
        {
            width:40%;
            vertical-align: middle;
            padding-top:3%;
            padding-left:3%;
            float:left;
        }
        .navListSlikaKvadrat
        {
            height:85%;
            vertical-align: middle;
            padding-top:3%;
            margin-left:10%;
            float:left;
        }
        .navList p
        {
            word-wrap: normal;
            height: 100%;
            float:right;
            width:50%;
            margin-top: 0%;
            margin-bottom: 0%;
            font-size: 1rem;
        }
        html
        {
            background-color: var(--background-color);
        }
        #desniFooterDiv
        {
            text-align: center;
        }
        #desniFooterDiv h5
        {
            margin:0%;
        }
        #desniHeaderDiv h3
        {
            width: 80%;
            word-wrap: normal;
            margin-left: 3%;
            margin-top:10%;
        }
        .bodyDijelovi
        {
            width:98%;
            padding:1%;
        }
        #tabela
        {
            width:100%;
            border-style: solid;
            border-color: black;
            border-width: 1px;
            text-align: center;
        }
        
        #headerNaslov
        {
            width:20%;
            float:left;
        }
        #headerButtoni
        {
            width:80%;
            float:right;
            margin-top:1%;
        }
        #desniHeaderDiv button
        {
            float:right;
            width:12rem;
            height:2.5rem;
            background-color: var(--primary-color);
            transition: 200ms;
        }
        #desniHeaderDiv button:hover
        {
            background-color: var(--hover-color);
            transition: 300ms;
            cursor: pointer;
        }
        #novaTabela, #novaTabela th, #novaTabela td
        {
            width:100%;
            border-style: solid;
            border-color: black;
            border-width: 1px;
        }
        #novaTabela
        {
            border-collapse:collapse;

        }
        #novaTabela tr:nth-child(even){background-color: #f2f2f2;}
        #novaTabela th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: var(--hover-color);
            color: white;
            }
        @media only screen and (max-width: 600px) {
        #mainDiv{
            width: 95vw;
            height: 95vh;
        }
        #lijeviDiv,#desniDiv, #logoDiv, #navDiv
        {
            width:100%;
        }
        #lijeviDiv
        {
            height:60%;
            border:none;
        }
        #logoDiv
        {
            background: var(--background-color);
            height:30%;
        }
        #navDiv
        {
            height:69%;
        }
        .navList
        { 
            height:32%
        }
        #logoDiv,#navDiv
        {
            clear:none;
        }
        #tabela
        {
            height: auto;
            width: auto;
            font-size: 11px;
        }
        .bodyDijelovi
        {
            text-align: justify;
        }
        
        #imdbLogo
        {
         height: 12vh;
         margin-left:15%;
        }
        .navListSlikaPravougaonik
        {
            width:15vh;
            margin-left: 5%;
        }
        .navListSlikaKvadrat
        {
            height:8vh;
            margin-left:15%;
        }
        #headerButtoni,#headerNaslov
        {
            width:100%;
            text-align:center;
        }
        .bodyDijelovi
        {
            width:98%;
        }
        #headerNaslov h3 
        {
            margin-left: auto;
            width:90%;
            margin-right: auto;
        }
        #headerButtoni button
        {
            width:100%;
            margin-bottom: 5%;
        }
        #desniHeaderDiv,#desniMainDiv,#desniFooterDiv
        {
            width:100%;
        }
        #desniFooterDiv h5
        {
            display: none;
        }
        }
    </style>
    <?php require_once('routes.php'); ?>
    <script>
        function zahtjev() {
            var str = document.getElementById("inputText").value;
            if (str.length == 0) { 
                document.getElementById("resultDiv").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("resultDiv").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "nameSearch.php?s=" + str, true);
                xmlhttp.send();
            }
        }
        </script>
</head>

<body>
    <div id="mainDiv">
        <div id="lijeviDiv">
            <div id="logoDiv">
                <a href="index.html"><img id="imdbLogo" src="imdb logo.png"></a>
                <h3> Internet Movie Database</h3>
            </div>
            <div id="navDiv">
                    <li class="navList" onclick="location.href='http\://fsr.sum.ba/naslovnica/'">
                        <img class="navListSlikaPravougaonik" src="unnamed.png"> <p style="font-size: 0.8rem;">Fakultet strojarstva, računarstva i elektrotehnike Mostar</p>
                    </li>
                    <li class="navList" style="border-top:hidden" onclick="location.href='https\://www.sum.ba/'">
                        <img class="navListSlikaKvadrat" src="sum.png"> <p>Sveučilište u Mostaru</p>
                    </li>
                    <li class="navList" style="border-top:hidden" onclick="location.href='https\://github.com/rijadhubana/RNWA'">
                        <img class="navListSlikaKvadrat" src="github.png"> <p>Github repozitorij</p>
                    </li>

            </div>
        </div>
        <div id="desniDiv">
            <div id="desniHeaderDiv">
                <div id="headerNaslov">
                    <h3>PHP MVC</h3>
                </div>
                <div id="headerButtoni">
                    <button> Login </button> </br> </br> </br>
                    <button> Register </button>
                </div>
                
            </div>
            <div id="desniMainDiv">
                <br/>
            <table id="novaTabela">
                        <thead>
                            <tr>
                                <th> Broj </th>
                                <th>Naziv controllera</th>
                            </tr>
                        </thead>
                       <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="?controller=artiste&action=index">1 - Artiste</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="?controller=artisteband&action=index">2 - ArtisteBand</a></td>
                                </tr>
                       </tbody>
                    </table>
                <h5>Copyright © Rijad Hubana, Marin Jurišić 2021.</h5>
            </div>
        </div>
    </div>

</body>

</html>