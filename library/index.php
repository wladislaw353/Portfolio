<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="system/slick/slick.css">
    <link rel="stylesheet" href="system/slick/slick-theme.css">
    <link rel="stylesheet" href="system/main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap&subset=cyrillic-ext" rel="stylesheet">
    <meta name="robots" content="noindex, nofollow">
    <title>WonderWeb Library</title>
    <?php if(isset($_GET['consultant'])) { ?>
        <script src="//code-eu1.jivosite.com/widget/e8omcsgfUi" async></script>
    <?php } ?>
</head>
<body>
    <div class="logo">
        <img src="system/logo.png" alt="">
    </div>
    <?php if($_GET['pass'] == '345') { ?>
        <div class="flex-container">
            <form action="javascript:void(null)" method="POST" id="messengers">
                <h4>Виджет мессенджеров</h4>
                <input autocomplete="off" type="text" required name="color" placeholder="Цвет кнопок">
                <input autocomplete="off" type="text" name="phone" placeholder="Номер телефона без +38">
                <input autocomplete="off" type="text" name="telegram" placeholder="Никнейм Telegram без @">
                <input autocomplete="off" type="text" name="facebook" placeholder="Адрес страницы facebook без домена">
                <input autocomplete="off" type="text" name="viber" placeholder="Номер телефона Viber без +38">
                <input autocomplete="off" type="text" name="whatsapp" placeholder="Номер телефона WhatsApp без +38">
                <button type="submit">Получить код</button>
            </form>
            <form action="javascript:void(null)" method="POST" id="sender">
                <h4>Ajax отправщик форм</h4>
                <input autocomplete="off" type="text" required name="id" placeholder="id формы" value="formx">
                <input autocomplete="off" type="text" required name="file" placeholder="Название файла отправщика без .php" value="send">
                <button type="submit">Получить код</button>
            </form>
        </div>
        <div class="copy-wrapper">
            <button id="copy">Копировать код</button>
        </div>
        <code id="box"></code>
    <?php } ?>

    <?php if(isset($_GET['test'])) { ?>
    
        <?php 
            function status($url) {
                $status = get_headers($url);
                if($status[0] == 'HTTP/1.1 403 Forbidden') return '#51d82f';
                else return '#d82f2f';
            }
        ?>

        <h3>Тестовые сервера</h3>
        <div class="servers">
            <div class="item">
                <span style="background:<?=status('https://test.wonder-web.com.ua/');?>"></span>
                <a href="https://test.wonder-web.com.ua/">Test 1</a>
            </div>
            <?php for($i=2; $i<11; $i++) { ?>
                <div class="item">
                    <span style="background:<?=status("https://test$i.wonder-web.com.ua/");?>"></span>
                    <a href="https://test<?=$i;?>.wonder-web.com.ua/">Test <?=$i;?></a>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if(isset($_GET['map'])) { ?>
        <h3>Пример интерактивной карты Google</h3>
        <iframe style="border:0;width: 100%;max-width: 1000px;margin: 0 auto;display: block;height: 500px;margin-top: 30px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18484.350339995635!2d30.723487006173297!3d46.47415058317211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c631efde3b550b%3A0x63136c7abc2eca1b!2sWonder%20Web!5e0!3m2!1sru!2sua!4v1577187258316!5m2!1sru!2sua" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    <?php } ?>
    <?php if(isset($_GET['mobile'])) { ?>
        <h3>Пример мобильной версии сайта</h3>
        <iframe style="user-select:none;width: 100%; max-width: 375px; margin: 30px auto; display: block; height: 750px; background: url(system/mask.png) no-repeat; background-size: contain; padding: 45px 19px 22px 24px; border-radius: 0 0 55px 55px; overflow: hidden; box-sizing: border-box;" src="https://wonder-web.com.ua/ru/" frameborder="0"></iframe>
            <?php } ?>
    <?php if(isset($_GET['slider'])) { ?>
        <h3>Пример слайдера</h3>
        <div class="slider">
            <img src="system/slider/1.jpg" alt="">
            <img src="system/slider/2.jpg" alt="">
            <img src="system/slider/3.jpg" alt="">
            <img src="system/slider/4.jpg" alt="">
            <img src="system/slider/5.jpg" alt="">
        </div>
    <?php } ?>
    <?php if(isset($_GET['consultant'])) { ?>
        <h3>Пример чат-бот консультанта, фиксированного в углу сайта</h3>
    <?php } ?>
    <?php if(isset($_GET['calc'])) { ?>
        <h3>Пример калькулятора<br>Расчет стоимости заказа по пользовательским параметрам</h3>
        <img src="system/calc.png" alt="" style=" display: block; margin: 30px auto; border-radius: 15px; ">
    <?php } ?>
    <?php if(isset($_GET['filter'])) { ?>
        <h3>Пример фильтра в интернет-магазине</h3>
        <img src="system/filter.png" alt="" style=" display: block; margin: 30px auto; border-radius: 15px; ">
    <?php } ?>
    <?php if(isset($_GET['call'])) { ?>
        <h3>Пример кнопки мессенджеров, фиксированной в углу сайта</h3>
        <!-- Виджет мессенджеров -->
        <style>.messengersq .links.active a:after{position:absolute;top:18px;background:#fff;padding:4px 10px;border-radius:50px;font-size:14px}.messengersq .links.active a:nth-child(1):hover:after{color:#d72f2f;left:-70px;content:'Phone'}.messengersq .links.active a:nth-child(2):hover:after{color:#2a9fda;left:-88px;content:'Telegram'}.messengersq .links.active a:nth-child(3):hover:after{color:#007ff8;left:-91px;content:'Facebook'}.messengersq .links.active a:nth-child(4):hover:after,.messengersq .links.active a:nth-child(5):hover:after{color:#784f99;left:-63px;content:'Viber'}.messengersq .links.active a:nth-child(6):hover:after{color:#27a219;left:-95px;content:'WhatsApp'}.btnq,.messengersq .links a,.messengersq .pulse:after{background:#d72f2f;box-shadow:-1px 2px 3px 0 #2b2b2b4f}.messengersq .pulse:after{box-shadow:none}.messengersq .btnq>div svg{display:none}.messengersq .btnq>div svg.active{display:block}.messengersq{right:30px}.messengersq .links.active~.btnq:after{visibility:hidden!important}.messengersq .links.active~.btnq>div{display:none}.messengersq .links.active~.btnq{display:flex;align-items:center;justify-content:center;width:45px;height:45px;transform:rotate(90deg)!important;opacity:.8}.messengersq .links.active a:nth-child(2):hover{background:#2a9fda}.messengersq .links.active a:nth-child(3):hover{background:#007ff8}.messengersq .links.active a:nth-child(4):hover,.messengersq .links.active a:nth-child(4):hover{background:#784f99}.messengersq .links.active a:nth-child(6):hover{background:#27a219}.messengersq .links.active~.btnq svg:nth-child(1){display:block}.messengersq .links.active~.btnq svg:nth-child(2){display:none}.messengersq .links.active a svg{transition:all .3s ease}.messengersq .links.active a:hover svg{transform:scale(.9)}.messengersq .btnq svg:nth-child(1){display:none}.messengersq .pulse{position:relative;overflow:unset!important}@keyframes scale{0%{transform:translate(-50%,-50%) scale(0);opacity:1}100%{transform:translate(-50%,-50%) scale(1.7);opacity:0}}.messengersq .pulse:after{top:50%;left:50%;transform:translate(-50%,-50%);height:100%;width:100%;border-radius:100%;animation:scale 2s linear infinite;content:"";position:absolute;z-index:-1}.messengersq .pulse-call path:nth-child(2),.messengersq .pulse-call path:nth-child(3){opacity:0}.messengersq .pulse-call path:nth-child(2).active,.messengersq .pulse-call path:nth-child(3).active{opacity:1}.messengersq .btnq,.messengersq .links a{width:60px;height:60px;overflow:hidden;padding:15px;border-radius:100%;box-sizing:border-box;height:60px;margin-bottom:5px;transition:all .3s ease}.messengersq{display:flex;flex-direction:column;align-items:center;position:fixed;bottom:60px;z-index:9998}.messengersq .btnq{cursor:pointer;position:relative;z-index:998;transition:all .3s ease}.messengersq .btnq:hover{transform:scale(1.1)}.messengersq .links{display:flex;height:0;margin-bottom:-25px;overflow:hidden;flex-direction:column;transition:all .3s ease}.messengersq .links a{position:relative;overflow:unset;transition:all .3s cubic-bezier(.31,1.04,.43,1.1)}.messengersq .links.active a{transform:translate(0)!important}.messengersq .links.active{margin-bottom:0;height:100%;overflow:visible}#viber-mobile{display:none}@media(max-width:768px){.messengersq{right:15px}#viber{display:none}#viber-mobile{display:block}}</style><div class="messengersq"> <div class="links"> <a style="transform:translateY(325px);" id="phone" href="tel:0666590487"> <svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 480.56 480.56" style="enable-background:new 0 0 480.56 480.56;" xml:space="preserve" width="30px" height="30px"> <g> <g> <path d="M365.354,317.9c-15.7-15.5-35.3-15.5-50.9,0c-11.9,11.8-23.8,23.6-35.5,35.6c-3.2,3.3-5.9,4-9.8,1.8 c-7.7-4.2-15.9-7.6-23.3-12.2c-34.5-21.7-63.4-49.6-89-81c-12.7-15.6-24-32.3-31.9-51.1c-1.6-3.8-1.3-6.3,1.8-9.4 c11.9-11.5,23.5-23.3,35.2-35.1c16.3-16.4,16.3-35.6-0.1-52.1c-9.3-9.4-18.6-18.6-27.9-28c-9.6-9.6-19.1-19.3-28.8-28.8 c-15.7-15.3-35.3-15.3-50.9,0.1c-12,11.8-23.5,23.9-35.7,35.5c-11.3,10.7-17,23.8-18.2,39.1c-1.9,24.9,4.2,48.4,12.8,71.3 c17.6,47.4,44.4,89.5,76.9,128.1c43.9,52.2,96.3,93.5,157.6,123.3c27.6,13.4,56.2,23.7,87.3,25.4c21.4,1.2,40-4.2,54.9-20.9 c10.2-11.4,21.7-21.8,32.5-32.7c16-16.2,16.1-35.8,0.2-51.8C403.554,355.9,384.454,336.9,365.354,317.9z" fill="#FFFFFF"/> <path d="M346.254,238.2l36.9-6.3c-5.8-33.9-21.8-64.6-46.1-89c-25.7-25.7-58.2-41.9-94-46.9l-5.2,37.1 c27.7,3.9,52.9,16.4,72.8,36.3C329.454,188.2,341.754,212,346.254,238.2z" fill="#FFFFFF"/> <path d="M403.954,77.8c-42.6-42.6-96.5-69.5-156-77.8l-5.2,37.1c51.4,7.2,98,30.5,134.8,67.2c34.9,34.9,57.8,79,66.1,127.5 l36.9-6.3C470.854,169.3,444.354,118.3,403.954,77.8z" fill="#FFFFFF"/> </g> </g> </svg> </a> <a style="transform:translateY(260px);" id="telegram" href="tg://resolve?domain=WonderWebStudio_bot"> <svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 300 300" style="enable-background:new 0 0 300 300;" xml:space="preserve" width="30px" height="30px"> <g id="XMLID_496_"> <path id="XMLID_497_" d="M5.299,144.645l69.126,25.8l26.756,86.047c1.712,5.511,8.451,7.548,12.924,3.891l38.532-31.412 c4.039-3.291,9.792-3.455,14.013-0.391l69.498,50.457c4.785,3.478,11.564,0.856,12.764-4.926L299.823,29.22 c1.31-6.316-4.896-11.585-10.91-9.259L5.218,129.402C-1.783,132.102-1.722,142.014,5.299,144.645z M96.869,156.711l135.098-83.207 c2.428-1.491,4.926,1.792,2.841,3.726L123.313,180.87c-3.919,3.648-6.447,8.53-7.163,13.829l-3.798,28.146 c-0.503,3.758-5.782,4.131-6.819,0.494l-14.607-51.325C89.253,166.16,91.691,159.907,96.869,156.711z" fill="#FFFFFF"/> </g> </svg> </a> <a style="transform:translateY(195px);" id="facebook" href="https://m.me/WonderWebAgency"> <svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="30px" height="30px"> <g> <g> <path d="M256,0C114.624,0,0,106.112,0,237.024c0,74.592,37.216,141.12,95.392,184.576V512l87.168-47.84 c23.264,6.432,47.904,9.92,73.44,9.92c141.376,0,256-106.112,256-237.024S397.376,0,256,0z M281.44,319.2l-65.184-69.536 L89.056,319.2l139.936-148.544l66.784,69.536l125.6-69.536L281.44,319.2z" fill="#FFFFFF"/> </g> </g> </svg> </a> <a style="transform:translateY(130px);" id="viber" href="viber://chat?number=380666590487"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="-1 0 360 360" style="enable-background:new 0 0 455.731 455.731;width: 60px;height: 47px;margin-top: -14px;margin-left: -20px;fill: #fff;" xml:space="preserve"> <g> <path d="M296.076,105.381c-45.26-8.61-91.16-8.61-136.43,0c-19.8,4.41-44.71,28.28-49.58,47.48c-8.1,37.15-8.1,74.81,0,111.96 c4.87,19.2,29.78,43.07,49.58,47.48c0.005,0.001,0.01,0.002,0.015,0.003c0.882,0.173,1.525,0.937,1.525,1.836v54.422 c0,2.72,3.32,4.06,5.21,2.09l25.85-26.53c0,0,20.599-21.146,24.303-24.948c0.362-0.372,0.862-0.573,1.38-0.559 c26.099,0.723,52.226-1.385,78.147-6.313c19.8-4.41,44.72-28.28,49.58-47.48c8.11-37.15,8.11-74.81,0-111.96 C340.795,133.661,315.886,109.791,296.076,105.381z M296.766,267.592c-3.96,8.408-9.722,15.403-18.034,19.868 c-2.345,1.26-5.148,1.667-7.795,2.482c-3.044-0.924-5.945-1.545-8.639-2.663c-27.916-11.582-53.608-26.524-73.959-49.429 c-11.573-13.025-20.632-27.73-28.288-43.292c-3.631-7.38-6.691-15.049-9.81-22.668c-2.845-6.948,1.345-14.126,5.756-19.361 c4.139-4.913,9.465-8.673,15.233-11.444c4.502-2.163,8.943-0.916,12.231,2.9c7.108,8.25,13.637,16.922,18.924,26.485 c3.251,5.882,2.359,13.072-3.533,17.075c-1.432,0.973-2.737,2.115-4.071,3.214c-1.17,0.963-2.271,1.936-3.073,3.24 c-1.466,2.385-1.536,5.2-0.592,7.794c7.266,19.968,19.513,35.495,39.611,43.858c3.217,1.338,6.446,2.896,10.151,2.464 c6.205-0.725,8.214-7.531,12.562-11.087c4.25-3.475,9.681-3.521,14.259-0.624c4.579,2.898,9.018,6.009,13.43,9.153 c4.331,3.086,8.643,6.105,12.638,9.623C297.606,258.562,298.929,263,296.766,267.592z M260.722,202.523 c-1.733,0.031-1.052-0.003-0.393-0.022c-2.793-0.098-4.312-1.742-4.612-4.415c-0.219-1.953-0.392-3.932-0.858-5.832 c-0.918-3.742-2.907-7.21-6.054-9.503c-1.486-1.083-3.17-1.873-4.934-2.381c-2.241-0.647-4.568-0.469-6.804-1.017 c-2.428-0.594-3.771-2.561-3.39-4.839c0.347-2.073,2.364-3.691,4.629-3.527c14.157,1.022,24.275,8.341,25.719,25.008 c0.102,1.176,0.222,2.418-0.039,3.543c-0.424,1.829-1.731,2.781-3.052,2.954C261.042,202.494,261.021,202.503,260.722,202.523z M251.919,164.404c-4.344-2.127-9.042-3.449-13.804-4.237c-2.081-0.344-4.184-0.553-6.275-0.844 c-2.534-0.352-3.886-1.967-3.767-4.464c0.112-2.34,1.822-4.023,4.372-3.879c8.38,0.476,16.474,2.287,23.924,6.232 c15.15,8.023,23.804,20.687,26.33,37.597c0.115,0.766,0.298,1.525,0.356,2.294c0.144,1.898,0.233,3.799,0.379,6.302 c-0.06,0.456-0.092,1.528-0.358,2.538c-0.969,3.666-6.527,4.125-7.807,0.425c-0.379-1.098-0.436-2.347-0.438-3.529 c-0.013-7.734-1.694-15.46-5.594-22.189C265.228,173.736,259.102,167.922,251.919,164.404z M298.731,216.665 c-2.927,0.035-4.244-2.414-4.434-5.039c-0.376-5.196-0.636-10.415-1.353-15.568c-3.78-27.201-25.47-49.705-52.544-54.534 c-4.074-0.727-8.245-0.918-12.371-1.351c-2.609-0.274-6.026-0.432-6.604-3.675c-0.485-2.719,1.81-4.884,4.399-5.023 c0.704-0.038,1.412-0.006,2.119-0.003c35.065,0.983,2.14,0.076,0.094,0.005c36.472,1.063,66.417,25.283,72.839,61.351 c1.095,6.151,1.485,12.44,1.972,18.683C303.052,214.136,301.565,216.631,298.731,216.665z" style=""></path> <path d="M0,0v455.731h455.731V0H0z M371.996,270.781l-0.09,0.36c-7.28,29.43-40.1,61.01-70.24,67.58l-0.34,0.07 c-24.37,4.65-48.92,6.97-73.46,6.97c-7.223,0-14.446-0.225-21.665-0.629l-33.285,34.599c-8.24,8.58-22.73,2.74-22.73-9.15v-32.852 c-29.015-8.286-59.391-38.414-66.37-66.589l-0.08-0.36c-9-41.1-9-82.78,0-123.88l0.08-0.36c7.29-29.43,40.11-61.01,70.24-67.58 l0.35-0.07c48.74-9.3,98.17-9.3,146.92,0l0.34,0.07c30.14,6.57,62.96,38.15,70.24,67.58l0.09,0.36 C380.996,188.001,380.996,229.681,371.996,270.781z" style="fill: transparent;"></path> </g> </svg> </a> <a style="transform:translateY(130px);" id="viber-mobile" href="viber://add?number=380666590487"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="-1 0 360 360" style="enable-background:new 0 0 455.731 455.731;width: 60px;height: 47px;margin-top: -14px;margin-left: -20px;fill: #fff;" xml:space="preserve"> <g> <path d="M296.076,105.381c-45.26-8.61-91.16-8.61-136.43,0c-19.8,4.41-44.71,28.28-49.58,47.48c-8.1,37.15-8.1,74.81,0,111.96 c4.87,19.2,29.78,43.07,49.58,47.48c0.005,0.001,0.01,0.002,0.015,0.003c0.882,0.173,1.525,0.937,1.525,1.836v54.422 c0,2.72,3.32,4.06,5.21,2.09l25.85-26.53c0,0,20.599-21.146,24.303-24.948c0.362-0.372,0.862-0.573,1.38-0.559 c26.099,0.723,52.226-1.385,78.147-6.313c19.8-4.41,44.72-28.28,49.58-47.48c8.11-37.15,8.11-74.81,0-111.96 C340.795,133.661,315.886,109.791,296.076,105.381z M296.766,267.592c-3.96,8.408-9.722,15.403-18.034,19.868 c-2.345,1.26-5.148,1.667-7.795,2.482c-3.044-0.924-5.945-1.545-8.639-2.663c-27.916-11.582-53.608-26.524-73.959-49.429 c-11.573-13.025-20.632-27.73-28.288-43.292c-3.631-7.38-6.691-15.049-9.81-22.668c-2.845-6.948,1.345-14.126,5.756-19.361 c4.139-4.913,9.465-8.673,15.233-11.444c4.502-2.163,8.943-0.916,12.231,2.9c7.108,8.25,13.637,16.922,18.924,26.485 c3.251,5.882,2.359,13.072-3.533,17.075c-1.432,0.973-2.737,2.115-4.071,3.214c-1.17,0.963-2.271,1.936-3.073,3.24 c-1.466,2.385-1.536,5.2-0.592,7.794c7.266,19.968,19.513,35.495,39.611,43.858c3.217,1.338,6.446,2.896,10.151,2.464 c6.205-0.725,8.214-7.531,12.562-11.087c4.25-3.475,9.681-3.521,14.259-0.624c4.579,2.898,9.018,6.009,13.43,9.153 c4.331,3.086,8.643,6.105,12.638,9.623C297.606,258.562,298.929,263,296.766,267.592z M260.722,202.523 c-1.733,0.031-1.052-0.003-0.393-0.022c-2.793-0.098-4.312-1.742-4.612-4.415c-0.219-1.953-0.392-3.932-0.858-5.832 c-0.918-3.742-2.907-7.21-6.054-9.503c-1.486-1.083-3.17-1.873-4.934-2.381c-2.241-0.647-4.568-0.469-6.804-1.017 c-2.428-0.594-3.771-2.561-3.39-4.839c0.347-2.073,2.364-3.691,4.629-3.527c14.157,1.022,24.275,8.341,25.719,25.008 c0.102,1.176,0.222,2.418-0.039,3.543c-0.424,1.829-1.731,2.781-3.052,2.954C261.042,202.494,261.021,202.503,260.722,202.523z M251.919,164.404c-4.344-2.127-9.042-3.449-13.804-4.237c-2.081-0.344-4.184-0.553-6.275-0.844 c-2.534-0.352-3.886-1.967-3.767-4.464c0.112-2.34,1.822-4.023,4.372-3.879c8.38,0.476,16.474,2.287,23.924,6.232 c15.15,8.023,23.804,20.687,26.33,37.597c0.115,0.766,0.298,1.525,0.356,2.294c0.144,1.898,0.233,3.799,0.379,6.302 c-0.06,0.456-0.092,1.528-0.358,2.538c-0.969,3.666-6.527,4.125-7.807,0.425c-0.379-1.098-0.436-2.347-0.438-3.529 c-0.013-7.734-1.694-15.46-5.594-22.189C265.228,173.736,259.102,167.922,251.919,164.404z M298.731,216.665 c-2.927,0.035-4.244-2.414-4.434-5.039c-0.376-5.196-0.636-10.415-1.353-15.568c-3.78-27.201-25.47-49.705-52.544-54.534 c-4.074-0.727-8.245-0.918-12.371-1.351c-2.609-0.274-6.026-0.432-6.604-3.675c-0.485-2.719,1.81-4.884,4.399-5.023 c0.704-0.038,1.412-0.006,2.119-0.003c35.065,0.983,2.14,0.076,0.094,0.005c36.472,1.063,66.417,25.283,72.839,61.351 c1.095,6.151,1.485,12.44,1.972,18.683C303.052,214.136,301.565,216.631,298.731,216.665z" style=""></path> <path d="M0,0v455.731h455.731V0H0z M371.996,270.781l-0.09,0.36c-7.28,29.43-40.1,61.01-70.24,67.58l-0.34,0.07 c-24.37,4.65-48.92,6.97-73.46,6.97c-7.223,0-14.446-0.225-21.665-0.629l-33.285,34.599c-8.24,8.58-22.73,2.74-22.73-9.15v-32.852 c-29.015-8.286-59.391-38.414-66.37-66.589l-0.08-0.36c-9-41.1-9-82.78,0-123.88l0.08-0.36c7.29-29.43,40.11-61.01,70.24-67.58 l0.35-0.07c48.74-9.3,98.17-9.3,146.92,0l0.34,0.07c30.14,6.57,62.96,38.15,70.24,67.58l0.09,0.36 C380.996,188.001,380.996,229.681,371.996,270.781z" style="fill: transparent;"></path> </g> </svg> </a> <a style="transform:translateY(65px);" id="whatsup" href="https://wa.me/380666590487"> <svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="30px" height="30px"> <g> <g> <path d="M256.064,0h-0.128C114.784,0,0,114.816,0,256c0,56,18.048,107.904,48.736,150.048l-31.904,95.104l98.4-31.456 C155.712,496.512,204,512,256.064,512C397.216,512,512,397.152,512,256S397.216,0,256.064,0z M405.024,361.504 c-6.176,17.44-30.688,31.904-50.24,36.128c-13.376,2.848-30.848,5.12-89.664-19.264C189.888,347.2,141.44,270.752,137.664,265.792 c-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624,26.176-62.304c6.176-6.304,16.384-9.184,26.176-9.184 c3.168,0,6.016,0.16,8.576,0.288c7.52,0.32,11.296,0.768,16.256,12.64c6.176,14.88,21.216,51.616,23.008,55.392 c1.824,3.776,3.648,8.896,1.088,13.856c-2.4,5.12-4.512,7.392-8.288,11.744c-3.776,4.352-7.36,7.68-11.136,12.352 c-3.456,4.064-7.36,8.416-3.008,15.936c4.352,7.36,19.392,31.904,41.536,51.616c28.576,25.44,51.744,33.568,60.032,37.024 c6.176,2.56,13.536,1.952,18.048-2.848c5.728-6.176,12.8-16.416,20-26.496c5.12-7.232,11.584-8.128,18.368-5.568 c6.912,2.4,43.488,20.48,51.008,24.224c7.52,3.776,12.48,5.568,14.304,8.736C411.2,329.152,411.2,344.032,405.024,361.504z" fill="#FFFFFF"/> </g> </g> </svg> </a> </div><div class="btnq pulse"> <svg class="pulse-call-close" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 47.971 47.971" style="enable-background:new 0 0 47.971 47.971;width: 20px;" xml:space="preserve"> <g> <path d="M28.228,23.986L47.092,5.122c1.172-1.171,1.172-3.071,0-4.242c-1.172-1.172-3.07-1.172-4.242,0L23.986,19.744L5.121,0.88 c-1.172-1.172-3.07-1.172-4.242,0c-1.172,1.171-1.172,3.071,0,4.242l18.865,18.864L0.879,42.85c-1.172,1.171-1.172,3.071,0,4.242 C1.465,47.677,2.233,47.97,3,47.97s1.535-0.293,2.121-0.879l18.865-18.864L42.85,47.091c0.586,0.586,1.354,0.879,2.121,0.879 s1.535-0.293,2.121-0.879c1.172-1.171,1.172-3.071,0-4.242L28.228,23.986z" style=" fill: #fff; "></path> </g> </svg> <div> <svg class="pulse-call active" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 480.56 480.56" style="enable-background:new 0 0 480.56 480.56;" xml:space="preserve" width="30px" height="30px"> <g> <g> <path d="M365.354,317.9c-15.7-15.5-35.3-15.5-50.9,0c-11.9,11.8-23.8,23.6-35.5,35.6c-3.2,3.3-5.9,4-9.8,1.8 c-7.7-4.2-15.9-7.6-23.3-12.2c-34.5-21.7-63.4-49.6-89-81c-12.7-15.6-24-32.3-31.9-51.1c-1.6-3.8-1.3-6.3,1.8-9.4 c11.9-11.5,23.5-23.3,35.2-35.1c16.3-16.4,16.3-35.6-0.1-52.1c-9.3-9.4-18.6-18.6-27.9-28c-9.6-9.6-19.1-19.3-28.8-28.8 c-15.7-15.3-35.3-15.3-50.9,0.1c-12,11.8-23.5,23.9-35.7,35.5c-11.3,10.7-17,23.8-18.2,39.1c-1.9,24.9,4.2,48.4,12.8,71.3 c17.6,47.4,44.4,89.5,76.9,128.1c43.9,52.2,96.3,93.5,157.6,123.3c27.6,13.4,56.2,23.7,87.3,25.4c21.4,1.2,40-4.2,54.9-20.9 c10.2-11.4,21.7-21.8,32.5-32.7c16-16.2,16.1-35.8,0.2-51.8C403.554,355.9,384.454,336.9,365.354,317.9z" fill="#FFFFFF"/> <path d="M346.254,238.2l36.9-6.3c-5.8-33.9-21.8-64.6-46.1-89c-25.7-25.7-58.2-41.9-94-46.9l-5.2,37.1 c27.7,3.9,52.9,16.4,72.8,36.3C329.454,188.2,341.754,212,346.254,238.2z" fill="#FFFFFF"/> <path d="M403.954,77.8c-42.6-42.6-96.5-69.5-156-77.8l-5.2,37.1c51.4,7.2,98,30.5,134.8,67.2c34.9,34.9,57.8,79,66.1,127.5 l36.9-6.3C470.854,169.3,444.354,118.3,403.954,77.8z" fill="#FFFFFF"/> </g> </g> </svg> <svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 300 300" style="enable-background:new 0 0 300 300;" xml:space="preserve" width="30px" height="30px"> <g id="XMLID_496_"> <path id="XMLID_497_" d="M5.299,144.645l69.126,25.8l26.756,86.047c1.712,5.511,8.451,7.548,12.924,3.891l38.532-31.412 c4.039-3.291,9.792-3.455,14.013-0.391l69.498,50.457c4.785,3.478,11.564,0.856,12.764-4.926L299.823,29.22 c1.31-6.316-4.896-11.585-10.91-9.259L5.218,129.402C-1.783,132.102-1.722,142.014,5.299,144.645z M96.869,156.711l135.098-83.207 c2.428-1.491,4.926,1.792,2.841,3.726L123.313,180.87c-3.919,3.648-6.447,8.53-7.163,13.829l-3.798,28.146 c-0.503,3.758-5.782,4.131-6.819,0.494l-14.607-51.325C89.253,166.16,91.691,159.907,96.869,156.711z" fill="#FFFFFF"></path> </g> </svg> <svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="30px" height="30px"> <g> <g> <path d="M256,0C114.624,0,0,106.112,0,237.024c0,74.592,37.216,141.12,95.392,184.576V512l87.168-47.84 c23.264,6.432,47.904,9.92,73.44,9.92c141.376,0,256-106.112,256-237.024S397.376,0,256,0z M281.44,319.2l-65.184-69.536 L89.056,319.2l139.936-148.544l66.784,69.536l125.6-69.536L281.44,319.2z" fill="#FFFFFF"></path> </g> </g> </svg> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="-1 0 360 360" style="enable-background:new 0 0 455.731 455.731;width: 60px;height: 47px;margin-top: -14px;margin-left: -20px;fill: #fff;" xml:space="preserve"> <g> <path d="M296.076,105.381c-45.26-8.61-91.16-8.61-136.43,0c-19.8,4.41-44.71,28.28-49.58,47.48c-8.1,37.15-8.1,74.81,0,111.96 c4.87,19.2,29.78,43.07,49.58,47.48c0.005,0.001,0.01,0.002,0.015,0.003c0.882,0.173,1.525,0.937,1.525,1.836v54.422 c0,2.72,3.32,4.06,5.21,2.09l25.85-26.53c0,0,20.599-21.146,24.303-24.948c0.362-0.372,0.862-0.573,1.38-0.559 c26.099,0.723,52.226-1.385,78.147-6.313c19.8-4.41,44.72-28.28,49.58-47.48c8.11-37.15,8.11-74.81,0-111.96 C340.795,133.661,315.886,109.791,296.076,105.381z M296.766,267.592c-3.96,8.408-9.722,15.403-18.034,19.868 c-2.345,1.26-5.148,1.667-7.795,2.482c-3.044-0.924-5.945-1.545-8.639-2.663c-27.916-11.582-53.608-26.524-73.959-49.429 c-11.573-13.025-20.632-27.73-28.288-43.292c-3.631-7.38-6.691-15.049-9.81-22.668c-2.845-6.948,1.345-14.126,5.756-19.361 c4.139-4.913,9.465-8.673,15.233-11.444c4.502-2.163,8.943-0.916,12.231,2.9c7.108,8.25,13.637,16.922,18.924,26.485 c3.251,5.882,2.359,13.072-3.533,17.075c-1.432,0.973-2.737,2.115-4.071,3.214c-1.17,0.963-2.271,1.936-3.073,3.24 c-1.466,2.385-1.536,5.2-0.592,7.794c7.266,19.968,19.513,35.495,39.611,43.858c3.217,1.338,6.446,2.896,10.151,2.464 c6.205-0.725,8.214-7.531,12.562-11.087c4.25-3.475,9.681-3.521,14.259-0.624c4.579,2.898,9.018,6.009,13.43,9.153 c4.331,3.086,8.643,6.105,12.638,9.623C297.606,258.562,298.929,263,296.766,267.592z M260.722,202.523 c-1.733,0.031-1.052-0.003-0.393-0.022c-2.793-0.098-4.312-1.742-4.612-4.415c-0.219-1.953-0.392-3.932-0.858-5.832 c-0.918-3.742-2.907-7.21-6.054-9.503c-1.486-1.083-3.17-1.873-4.934-2.381c-2.241-0.647-4.568-0.469-6.804-1.017 c-2.428-0.594-3.771-2.561-3.39-4.839c0.347-2.073,2.364-3.691,4.629-3.527c14.157,1.022,24.275,8.341,25.719,25.008 c0.102,1.176,0.222,2.418-0.039,3.543c-0.424,1.829-1.731,2.781-3.052,2.954C261.042,202.494,261.021,202.503,260.722,202.523z M251.919,164.404c-4.344-2.127-9.042-3.449-13.804-4.237c-2.081-0.344-4.184-0.553-6.275-0.844 c-2.534-0.352-3.886-1.967-3.767-4.464c0.112-2.34,1.822-4.023,4.372-3.879c8.38,0.476,16.474,2.287,23.924,6.232 c15.15,8.023,23.804,20.687,26.33,37.597c0.115,0.766,0.298,1.525,0.356,2.294c0.144,1.898,0.233,3.799,0.379,6.302 c-0.06,0.456-0.092,1.528-0.358,2.538c-0.969,3.666-6.527,4.125-7.807,0.425c-0.379-1.098-0.436-2.347-0.438-3.529 c-0.013-7.734-1.694-15.46-5.594-22.189C265.228,173.736,259.102,167.922,251.919,164.404z M298.731,216.665 c-2.927,0.035-4.244-2.414-4.434-5.039c-0.376-5.196-0.636-10.415-1.353-15.568c-3.78-27.201-25.47-49.705-52.544-54.534 c-4.074-0.727-8.245-0.918-12.371-1.351c-2.609-0.274-6.026-0.432-6.604-3.675c-0.485-2.719,1.81-4.884,4.399-5.023 c0.704-0.038,1.412-0.006,2.119-0.003c35.065,0.983,2.14,0.076,0.094,0.005c36.472,1.063,66.417,25.283,72.839,61.351 c1.095,6.151,1.485,12.44,1.972,18.683C303.052,214.136,301.565,216.631,298.731,216.665z" style=""></path> <path d="M0,0v455.731h455.731V0H0z M371.996,270.781l-0.09,0.36c-7.28,29.43-40.1,61.01-70.24,67.58l-0.34,0.07 c-24.37,4.65-48.92,6.97-73.46,6.97c-7.223,0-14.446-0.225-21.665-0.629l-33.285,34.599c-8.24,8.58-22.73,2.74-22.73-9.15v-32.852 c-29.015-8.286-59.391-38.414-66.37-66.589l-0.08-0.36c-9-41.1-9-82.78,0-123.88l0.08-0.36c7.29-29.43,40.11-61.01,70.24-67.58 l0.35-0.07c48.74-9.3,98.17-9.3,146.92,0l0.34,0.07c30.14,6.57,62.96,38.15,70.24,67.58l0.09,0.36 C380.996,188.001,380.996,229.681,371.996,270.781z" style="fill: transparent;"></path> </g> </svg> <svg xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="30px" height="30px"> <g> <g> <path d="M256.064,0h-0.128C114.784,0,0,114.816,0,256c0,56,18.048,107.904,48.736,150.048l-31.904,95.104l98.4-31.456 C155.712,496.512,204,512,256.064,512C397.216,512,512,397.152,512,256S397.216,0,256.064,0z M405.024,361.504 c-6.176,17.44-30.688,31.904-50.24,36.128c-13.376,2.848-30.848,5.12-89.664-19.264C189.888,347.2,141.44,270.752,137.664,265.792 c-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624,26.176-62.304c6.176-6.304,16.384-9.184,26.176-9.184 c3.168,0,6.016,0.16,8.576,0.288c7.52,0.32,11.296,0.768,16.256,12.64c6.176,14.88,21.216,51.616,23.008,55.392 c1.824,3.776,3.648,8.896,1.088,13.856c-2.4,5.12-4.512,7.392-8.288,11.744c-3.776,4.352-7.36,7.68-11.136,12.352 c-3.456,4.064-7.36,8.416-3.008,15.936c4.352,7.36,19.392,31.904,41.536,51.616c28.576,25.44,51.744,33.568,60.032,37.024 c6.176,2.56,13.536,1.952,18.048-2.848c5.728-6.176,12.8-16.416,20-26.496c5.12-7.232,11.584-8.128,18.368-5.568 c6.912,2.4,43.488,20.48,51.008,24.224c7.52,3.776,12.48,5.568,14.304,8.736C411.2,329.152,411.2,344.032,405.024,361.504z" fill="#FFFFFF"></path> </g> </g> </svg> </div></div></div><script>let countq=0,burger=document.querySelector(".messengersq .btnq"),menu=document.querySelector(".messengersq .links"),pulseCall1=document.querySelector(".pulse-call path:nth-child(2)"),pulseCall2=document.querySelector(".pulse-call path:nth-child(3)");function pulceCall(){pulseCall1.classList.remove("active"),pulseCall2.classList.remove("active"),setTimeout(()=>{pulseCall1.classList.add("active")},200),setTimeout(()=>{pulseCall2.classList.add("active")},400)}burger.addEventListener("click",function(e){e.preventDefault(),menu.classList.contains("active")?menu.classList.remove("active"):menu.classList.add("active")}),setInterval(()=>{6==++countq&&(countq=1),document.querySelectorAll(".messengersq .btnq > div svg").forEach(function(e){e.classList.remove("active")}),document.querySelector(".messengersq .btnq > div svg:nth-child("+countq+")").classList.add("active")},2e3),pulceCall(),setInterval(()=>{pulceCall()},2e3);</script>
        <!-- WonderWeb Digital Agency -->
    <?php } ?>

    <?php if(isset($_GET['server-tuning'])) { ?>
        <div class="holder">
            <br>
            <br>
            <h3>Требования для WordPress</h3>
            <ul>
                <li>PHP 7.2</li>
                <li>MySQL 5.6</li>
                <li>Mod_rewrite (при использовании Apache)</li>
                <li>SSL</li>
                <li>cURL</li>
                <li>PHP mail</li>
            </ul>
            <br>
            <br>
            <br>
            <h3>Требования для Opencart</h3>
            <ul>
                <li>Apache</li>
                <li>PHP 7.2</li>
                <li>MySQL 5.6</li>
                <li>GD Library</li>
                <li>cURL</li>
                <li>mCrypt</li>
                <li>ZLIB</li>
                <li>ZIP</li>
                <li>XML</li>
                <li>PHP mail</li>
            </ul>
            <br>
            <br>
            <h3>Выполнение mod_rewrite в Nginx</h3>
            <p>Nginx не использует файл <code class="inline">.htaccess</code>, а для перезаписи URL он использует гораздо более простой подход.</p>
            <p>Чтобы ваш блог WordPress работал с Nginx, просто добавьте следующее к части <code class="inline">try_files</code> вашей конфигурации Nginx:</p>
            <code>
            <pre class="brush: plain noskimlinks noskimwords">location / {
        index index.php index.html index.htm;
        try_files $uri $uri/ /index.php?q=$uri&amp;$args;
    }</pre>
            </code>
            <p>Если вы используете каталог для своего блога WordPress, задайте следующее:</p>
            <code>
            <pre class="brush: plain noskimlinks noskimwords">location /wordpress/ {
        try_files $uri $uri/ /index.php?q=$uri&amp;$args;
    }</pre>     
            </code>
            <p>Перезапустите Nginx, и у вас будет работать перезапись URL.</p>
            <code>
                <pre class="brush: bash noskimlinks noskimwords">$ service nginx restart</pre>
            </code>
            <br>
            <br>
            <br>
        </div>

        <style>
            .holder {
                max-width: 900px;
                margin: 0 auto;
                padding: 15px;
            }
            p, strong, li {
                color: #fff;
                padding: 0 15px;
                margin: 5px 0;
            }
            ul {
                padding-left: 35px;
            }
            ul li {
                padding: 0;
            }
            pre {
                color: #fff;
            }
            code {
                color: #fff;
                display: inline-flex;
                margin: 0;
                margin: 5px 0 15px;
                padding: 5px 10px;
                background: #ffffff12;
            }
            body {
                background: #161926;
            }
            h3 {
                text-align: left;
            }
        </style>
    <?php } ?>

    <script src="system/jquery-3.2.1.min.js"></script>
    <script src="system/main.js"></script>
    <script src="system/slick/slick.min.js"></script>
</body>
</html>