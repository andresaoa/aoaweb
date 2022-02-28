<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.0/css/font-awesome.min.css"
        integrity="sha512-I8lSB676wT2jGSNnvIhbYGqHMiZOc0+cl18soJSWPvJCkGm8xnTcXZafn2xTf1woMXz1AY3Z1Vd/qAPvjXB4Kw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Nunito';
            background: #f7fafc;
        }

        @media only screen and (max-width: 600px) {
            .col-sm-0 {
                display: none;
            }

        }

        @media only screen and (max-width: 768px) {
            .col-sm-0 {
                display: none;
            }

        }


        #app-cover {
            color: #fff7f7;
            background: #fff7f7;
        }




        #player {
            position: relative;
            height: 100%;
            z-index: 3;
        }

        #player-track {
            position: absolute;
            top: 0;
            right: 15px;
            left: 15px;
            padding: 13px 22px 10px 184px;
            background-color: #fff7f7;
            border-radius: 15px 15px 0 0;
            transition: 0.3s ease top;
            z-index: 1;
        }

        #player-track.active {
            top: -92px;
        }

        #album-name {
            color: #54576f;
            font-size: 17px;
            font-weight: bold;
        }

        #track-name {
            color: #acaebd;
            font-size: 13px;
            margin: 2px 0 13px 0;
        }

        #track-time {
            height: 12px;
            margin-bottom: 3px;
            overflow: hidden;
        }

        #current-time {
            float: left;
        }

        #track-length {
            float: right;
        }

        #current-time,
        #track-length {
            color: transparent;
            font-size: 11px;
            background-color: #ffe8ee;
            border-radius: 10px;
            transition: 0.3s ease all;
        }

        #track-time.active #current-time,
        #track-time.active #track-length {
            color: #f86d92;
            background-color: transparent;
        }

        #s-area,
        #seek-bar {
            position: relative;
            height: 4px;
            border-radius: 4px;
        }

        #s-area {
            background-color: #ffe8ee;
            cursor: pointer;
        }

        #ins-time {
            position: absolute;
            top: -29px;
            color: #fff;
            font-size: 12px;
            white-space: pre;
            padding: 5px 6px;
            border-radius: 4px;
            display: none;
        }

        #s-hover {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            opacity: 0.2;
            z-index: 2;
        }

        #ins-time,
        #s-hover {
            background-color: #3b3d50;
        }

        #seek-bar {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 0;
            background-color: #fd6d94;
            transition: 0.2s ease width;
            z-index: 1;
        }

        #player-content {
            position: relative;
            height: 100%;
            background-color: #fff;
            box-shadow: 0 30px 80px #656565;
            border-radius: 15px;
            z-index: 2;
        }

        #album-art {
            position: absolute;
            top: -40px;
            width: 115px;
            height: 115px;
            margin-left: 40px;
            transform: rotateZ(0);
            transition: 0.3s ease all;
            box-shadow: 0 0 0 10px #fff;
            border-radius: 50%;
            overflow: hidden;
        }

        #album-art.active {
            top: -60px;
            box-shadow: 0 0 0 4px #fff7f7, 0 30px 50px -15px #afb7c1;
        }

        #album-art:before {
            content: "";
            position: absolute;
            top: 50%;
            right: 0;
            left: 0;
            width: 20px;
            height: 20px;
            margin: -10px auto 0 auto;
            background-color: #d6dee7;
            border-radius: 50%;
            box-shadow: inset 0 0 0 2px #fff;
            z-index: 2;
        }

        #album-art img {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            z-index: -1;
        }

        #album-art img.active {
            opacity: 1;
            z-index: 1;
        }

        #album-art.active img.active {
            z-index: 1;
            animation: rotateAlbumArt 3s linear 0s infinite forwards;
        }

        @keyframes rotateAlbumArt {
            0% {
                transform: rotateZ(0);
            }

            100% {
                transform: rotateZ(360deg);
            }
        }

        #buffer-box {
            position: absolute;
            top: 50%;
            right: 0;
            left: 0;
            height: 13px;
            color: #1f1f1f;
            font-size: 13px;
            font-family: Helvetica;
            text-align: center;
            font-weight: bold;
            line-height: 1;
            padding: 6px;
            margin: -12px auto 0 auto;
            background-color: rgba(255, 255, 255, 0.19);
            opacity: 0;
            z-index: 2;
        }

        #album-art img,
        #buffer-box {
            transition: 0.1s linear all;
        }

        #album-art.buffering img {
            opacity: 0.25;
        }

        #album-art.buffering img.active {
            opacity: 0.8;
            filter: blur(2px);
            -webkit-filter: blur(2px);
        }

        #album-art.buffering #buffer-box {
            opacity: 1;
        }

        #player-controls {
            width: 250px;
            height: 100%;
            margin: 0 5px 0 141px;
            float: right;
            overflow: hidden;
        }

        .control {
            width: 33.333%;
            float: left;
            padding: 12px 0;
        }

        .button {
            width: 26px;
            height: 26px;
            padding: 25px;
            background-color: #fff;
            border-radius: 6px;
            cursor: pointer;
        }

        .button i {
            display: block;
            color: #d6dee7;
            font-size: 26px;
            text-align: center;
            line-height: 1;
        }

        .button,
        .button i {
            transition: 0.2s ease all;
        }

        .button:hover {
            background-color: #d6d6de;
        }

        .button:hover i {
            color: #fff;
        }

    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            {{-- parte izquierda --}}
            <div class="col-sm-0 col-md-1 " style="min-height:100vh;background:url('');background-repeat: no-repeat;
            background-attachment: fixed;"></div>
            {{-- parte media --}}
            <div class="col-sm-12 col-md-10" style="min-height:180vh;background:;padding:0;">

                @foreach ($item_navs as $nav)
                    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light px-2">
                        <a class="navbar-brand" href="#"><img
                                src="https://getbootstrap.com/docs/4.6/assets/brand/bootstrap-solid.svg" width="30"
                                height="30" alt=""> {{$nav->text_logo}}</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav ">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">{{ $nav->item1 }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">{{ $nav->item2 }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">{{ $nav->item3 }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">{{ $nav->item4 }}</a>
                                </li>
                                {{-- si esta autenticado --}}
                                @auth
                                    <li class="nav-item dropdown ">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                            role="button" data-toggle="dropdown" aria-expanded="false">
                                            {{ $nav->dashboard }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-lg-right"
                                            aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item"
                                                href="{{ route('dashboard') }}">{{ $nav->profile }}</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">{{ $nav->logout }}</a>
                                        </div>
                                    </li>
                                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                        @csrf
                                    </form>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ $nav->login }}</a>
                                    </li>
                                @endauth
                @endforeach
                </ul>
            </div>
            </nav>
            {{-- slider --}}
            <header>
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(15).webp"
                                alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(16).webp"
                                alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(17).webp"
                                alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </header>
            {{-- texto --}}
            <marquee style="background-color: #{{$marquee->color}};" class="my-2">Este texto se mueve de derecha a
                izquierda Este texto se mueve de derecha a izquierda</marquee>
            {{-- top 20 --}}

            {{-- reproductor --}}
            <div id="app-cover" style="position: fixed;
                  left: 250;
                  bottom: 0;
                  width: 80%;
                  z-index:3;
                  color: white;
                  text-align: center;">
                <div id="bg-artwork"></div>
                <div id="bg-layer"></div>
                <div id="player">
                    <div id="player-track">
                        <div id="album-name"></div>
                        <div id="track-name"></div>
                        <div id="track-time">
                            <div id="current-time"></div>
                            <div id="track-length"></div>
                        </div>
                        <div id="s-area">
                            <div id="ins-time"></div>
                            <div id="s-hover"></div>
                            <div id="seek-bar"></div>
                        </div>
                    </div>
                    <div id="player-content">
                        <div id="album-art">
                            <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_1.jpg"
                                class="active" id="_1">
                            <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_2.jpg"
                                id="_2">
                            <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_3.jpg"
                                id="_3">
                            <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_4.jpg"
                                id="_4">
                            <img src="https://raw.githubusercontent.com/himalayasingh/music-player-1/master/img/_5.jpg"
                                id="_5">
                            <div id="buffer-box">Cargando ...</div>
                        </div>
                        <div id="player-controls">
                            <div class="control">
                                <div class="button" id="play-previous">
                                    <i class="fas fa-backward"></i>
                                </div>
                            </div>
                            <div class="control">
                                <div class="button" id="play-pause-button">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="control">
                                <div class="button" id="play-next">
                                    <i class="fas fa-forward"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--  --}}
        </div>
        {{-- parte derecha --}}
        <div class="col-sm-0 col-md-1" style="min-height:100vh;background:white;"></div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script>
        $(function() {
            var playerTrack = $("#player-track"),
                bgArtwork = $("#bg-artwork"),
                bgArtworkUrl,
                albumName = $("#album-name"),
                trackName = $("#track-name"),
                albumArt = $("#album-art"),
                sArea = $("#s-area"),
                seekBar = $("#seek-bar"),
                trackTime = $("#track-time"),
                insTime = $("#ins-time"),
                sHover = $("#s-hover"),
                playPauseButton = $("#play-pause-button"),
                i = playPauseButton.find("i"),
                tProgress = $("#current-time"),
                tTime = $("#track-length"),
                seekT,
                seekLoc,
                seekBarPos,
                cM,
                ctMinutes,
                ctSeconds,
                curMinutes,
                curSeconds,
                durMinutes,
                durSeconds,
                playProgress,
                bTime,
                nTime = 0,
                buffInterval = null,
                tFlag = false,
                albums = [
                    "Dawn",
                    "Me & You",
                    "Electro Boy",
                    "Home",
                    "Proxy (Original Mix)"
                ],
                trackNames = [
                    "Skylike - Dawn",
                    "Alex Skrindo - Me & You",
                    "Kaaze - Electro Boy",
                    "Jordan Schor - Home",
                    "Martin Garrix - Proxy"
                ],
                albumArtworks = ["_1", "_2", "_3", "_4", "_5"],
                trackUrl = [
                    "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/2.mp3",
                    "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/1.mp3",
                    "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/3.mp3",
                    "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/4.mp3",
                    "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/5.mp3"
                ],
                playPreviousTrackButton = $("#play-previous"),
                playNextTrackButton = $("#play-next"),
                currIndex = -1;

            function playPause() {
                setTimeout(function() {
                    if (audio.paused) {
                        playerTrack.addClass("active");
                        albumArt.addClass("active");
                        checkBuffering();
                        i.attr("class", "fas fa-pause");
                        audio.play();
                    } else {
                        playerTrack.removeClass("active");
                        albumArt.removeClass("active");
                        clearInterval(buffInterval);
                        albumArt.removeClass("buffering");
                        i.attr("class", "fas fa-play");
                        audio.pause();
                    }
                }, 300);
            }

            function showHover(event) {
                seekBarPos = sArea.offset();
                seekT = event.clientX - seekBarPos.left;
                seekLoc = audio.duration * (seekT / sArea.outerWidth());

                sHover.width(seekT);

                cM = seekLoc / 60;

                ctMinutes = Math.floor(cM);
                ctSeconds = Math.floor(seekLoc - ctMinutes * 60);

                if (ctMinutes < 0 || ctSeconds < 0) return;

                if (ctMinutes < 0 || ctSeconds < 0) return;

                if (ctMinutes < 10) ctMinutes = "0" + ctMinutes;
                if (ctSeconds < 10) ctSeconds = "0" + ctSeconds;

                if (isNaN(ctMinutes) || isNaN(ctSeconds)) insTime.text("--:--");
                else insTime.text(ctMinutes + ":" + ctSeconds);

                insTime.css({
                    left: seekT,
                    "margin-left": "-21px"
                }).fadeIn(0);
            }

            function hideHover() {
                sHover.width(0);
                insTime.text("00:00").css({
                    left: "0px",
                    "margin-left": "0px"
                }).fadeOut(0);
            }

            function playFromClickedPos() {
                audio.currentTime = seekLoc;
                seekBar.width(seekT);
                hideHover();
            }

            function updateCurrTime() {
                nTime = new Date();
                nTime = nTime.getTime();

                if (!tFlag) {
                    tFlag = true;
                    trackTime.addClass("active");
                }

                curMinutes = Math.floor(audio.currentTime / 60);
                curSeconds = Math.floor(audio.currentTime - curMinutes * 60);

                durMinutes = Math.floor(audio.duration / 60);
                durSeconds = Math.floor(audio.duration - durMinutes * 60);

                playProgress = (audio.currentTime / audio.duration) * 100;

                if (curMinutes < 10) curMinutes = "0" + curMinutes;
                if (curSeconds < 10) curSeconds = "0" + curSeconds;

                if (durMinutes < 10) durMinutes = "0" + durMinutes;
                if (durSeconds < 10) durSeconds = "0" + durSeconds;

                if (isNaN(curMinutes) || isNaN(curSeconds)) tProgress.text("00:00");
                else tProgress.text(curMinutes + ":" + curSeconds);

                if (isNaN(durMinutes) || isNaN(durSeconds)) tTime.text("00:00");
                else tTime.text(durMinutes + ":" + durSeconds);

                if (
                    isNaN(curMinutes) ||
                    isNaN(curSeconds) ||
                    isNaN(durMinutes) ||
                    isNaN(durSeconds)
                )
                    trackTime.removeClass("active");
                else trackTime.addClass("active");

                seekBar.width(playProgress + "%");

                if (playProgress == 100) {
                    i.attr("class", "fa fa-play");
                    seekBar.width(0);
                    tProgress.text("00:00");
                    albumArt.removeClass("buffering").removeClass("active");
                    clearInterval(buffInterval);
                }
            }

            function checkBuffering() {
                clearInterval(buffInterval);
                buffInterval = setInterval(function() {
                    if (nTime == 0 || bTime - nTime > 1000) albumArt.addClass("buffering");
                    else albumArt.removeClass("buffering");

                    bTime = new Date();
                    bTime = bTime.getTime();
                }, 100);
            }

            function selectTrack(flag) {
                if (flag == 0 || flag == 1) ++currIndex;
                else --currIndex;

                if (currIndex > -1 && currIndex < albumArtworks.length) {
                    if (flag == 0) i.attr("class", "fa fa-play");
                    else {
                        albumArt.removeClass("buffering");
                        i.attr("class", "fa fa-pause");
                    }

                    seekBar.width(0);
                    trackTime.removeClass("active");
                    tProgress.text("00:00");
                    tTime.text("00:00");

                    currAlbum = albums[currIndex];
                    currTrackName = trackNames[currIndex];
                    currArtwork = albumArtworks[currIndex];

                    audio.src = trackUrl[currIndex];

                    nTime = 0;
                    bTime = new Date();
                    bTime = bTime.getTime();

                    if (flag != 0) {
                        audio.play();
                        playerTrack.addClass("active");
                        albumArt.addClass("active");

                        clearInterval(buffInterval);
                        checkBuffering();
                    }

                    albumName.text(currAlbum);
                    trackName.text(currTrackName);
                    albumArt.find("img.active").removeClass("active");
                    $("#" + currArtwork).addClass("active");

                    bgArtworkUrl = $("#" + currArtwork).attr("src");

                    bgArtwork.css({
                        "background-image": "url(" + bgArtworkUrl + ")"
                    });
                } else {
                    if (flag == 0 || flag == 1) --currIndex;
                    else ++currIndex;
                }
            }

            function initPlayer() {
                audio = new Audio();

                selectTrack(0);

                audio.loop = false;

                playPauseButton.on("click", playPause);

                sArea.mousemove(function(event) {
                    showHover(event);
                });

                sArea.mouseout(hideHover);

                sArea.on("click", playFromClickedPos);

                $(audio).on("timeupdate", updateCurrTime);

                playPreviousTrackButton.on("click", function() {
                    selectTrack(-1);
                });
                playNextTrackButton.on("click", function() {
                    selectTrack(1);
                });
            }

            initPlayer();
        });
    </script>
</body>

</html>
