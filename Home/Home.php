
<?php
session_start();
?>
<!-- ---------------------------------------------------------------------------- -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIVO </title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="/Divo project/images/divo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .arrow {
            position: absolute;
            top: 45%;
            width: 6%;
            height: 12%;
            background: transparent;
            border: none;
            border-radius: 100%;
            filter: brightness(50%);
        }

        .img-btn {
            width: 80%;
            height: 80%;
        }

        .radio-btns {
            width: 15%;
            height: 10%;
            position: absolute;
            bottom: -3%;
            left: 47%;
        }

        .radio-btn {
            accent-color: black;
            background-color: white;
        }
    </style>
    <script>
        var i = 0;

        function ichange() {
            switch (i) {
                case 0:
                    i = 1;
                    break;
                case 1:
                    i = 2;
                    break;
                case 2:
                    i = 3;
                    break;
                case 3:
                    i = 0;
                    break;
                default:
                    i = 0;
                    break;
            }
        }

        function playnew() {
            if (i === 0) {
                document.getElementById('player').src = 'rtx1.mp4';
                document.getElementById('rad0').checked = 'checked';
            }
            else if (i === 1) {
                document.getElementById('player').src = 'rtx2.mp4';
                document.getElementById('rad1').checked = 'checked';
            }
            else if (i === 2) {
                document.getElementById('player').src = 'pro1.mp4';
                document.getElementById('rad2').checked = 'checked';
            }
            else if (i === 3) {
                document.getElementById('player').src = 'serv.mp4';
                document.getElementById('rad3').checked = 'checked';
            }
        }
        function playnew2() {
            ichange();
            setTimeout(playnew, 1000);
        }
        function prevvid() {
            switch (i) {
                case 3:
                    i = 2;
                    playnew();
                    break;
                case 2:
                    i = 1;
                    playnew();
                    break;
                case 1:
                    i = 0;
                    playnew();
                    break;
                case 0:
                    i = 3;
                    playnew();
                    break;
                default:
                    playnew();
                    break;
            }
        }
        function nextvid() {
            switch (i) {
                case 3:
                    i = 0;
                    playnew();
                    break;
                case 2:
                    i = 3;
                    playnew();
                    break;
                case 1:
                    i = 2;
                    playnew();
                    break;
                case 0:
                    i = 1;
                    playnew();
                    break;
                default:
                    playnew();
                    break;
            }}

            function switchvid(val) {
                switch (parseInt(val)) {
                    case 3:
                        i = 3;
                        playnew();
                        break;
                    case 2:
                        i = 2;
                        playnew();
                        break;
                    case 1:
                        i = 1;
                        playnew();
                        break;
                    case 0:
                        i = 0;
                        playnew();
                        break;
                    default:
                        playnew();
                        break;
                }
            }
    </script>

</head>

<body>
    <header class="header">
        <nav class="navbar">
            <a href="/DIVO project/Home/Home.php">Home</a>
            <a href="/DIVO project/Services/Services.html">Services</a>
            <a href="/DIVO project/Store_Updated/shopping cart/products.php">Stores</a>
            <a href="/DIVO project/About/About.html">About</a>
        </nav>
        <form action="#" class="search-bar">
            <input type="text" placeholder="Search...">
            <button type="submit"><i class='bx bx-search'></i></button>
        </form>
        <?php if(!isset($_SESSION["user_id"])): ?>
        <a class="user" style="" href="/DIVO project/sign/login1.php"><img style="width: 40px;" src="/DIVO project/images/user_black.png"></i></a>
        <?php endif;?>
        <?php if(isset($_SESSION["user_id"])): ?>
        <a class="user" style="position:relative; left:12%;" href=""><img style="width: 40px;" src="/DIVO project/images/user_black.png"></i></a>
        <?php endif;?>
        <?php if(isset($_SESSION["user_id"])): ?>
        <a class="user1" href="\Divo project/sign/logout.php" style="text-decoration: none; color:white;font-size:16px;transform: translateY(0);
    opacity: 1; border-radius:3px; padding :3px; margin:0; color:black;">Log out</a>
    <?php endif;?>
    </header>



    <div class="container">
        <div class="cont">
            <div class="animation">
                <video id="player" src="rtx1.mp4" onended="playnew2()"
                    onmouseover="pause()" onmouseout="play()" class="video-player" autoplay muted
                    style="width: 100%;height: 100%; border-radius: 20px;">
                </video>
            </div>
            <button onclick="prevvid()" class="arrow" style=" left: 3%;">
                <img class="img-btn" src="/DIVO project/images/left.png">
            </button>
            <button id="right-arrow" class="arrow" onclick="nextvid()" style="right: 3%;">
                <img class="img-btn" src="/DIVO project/images/right.png">
            </button>
            <div class="radio-btns">
                <input class="radio-btn" id="rad0" type="radio" name="vid" value="0" onclick="switchvid(value)" checked="checked">
                <input class="radio-btn" id="rad1" type="radio" name="vid" value="1" onclick="switchvid(value)">
                <input class="radio-btn" id="rad2" type="radio" name="vid" value="2" onclick="switchvid(value)">
                <input class="radio-btn" id="rad3" type="radio" name="vid" value="3" onclick="switchvid(value)">
            </div>
            <div> <a href="back.jpg"></a></div>
        </div>
    </div>
    <script>
    </script>
</body>

</html>