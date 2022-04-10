<?php
    if ($_GET['pass'] == '345') header('Location: /workspace/?i=f6e2750cb7fd17c28471ddbcc59319fc');
    if ($_GET['i'] != 'f6e2750cb7fd17c28471ddbcc59319fc') die;

    $mysqli = new mysqli('dr319515.mysql.tools', 'dr319515_db', 'WXElr5vk', 'dr319515_db');
    $mysqli->set_charset("utf8");
    $result = $mysqli->query("SELECT * FROM ww_brif ORDER BY `id` DESC");
    $data  = array();
    while ($row = $result->fetch_assoc()) {
        array_push($data, $row);
    }
    $result->free();
    $mysqli->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css?v=5.2">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap&subset=cyrillic-ext" rel="stylesheet">
    <title>WonderWeb WorkSpace</title>
    <meta name="description" content="WonderWeb WorkSpace">
    <meta property="og:title" content="WorkSpace" />
    <meta property="og:url" content="invoice" />
    <meta property="og:description" content="WonderWeb WorkSpace" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="WonderWeb Digital Agency" >
    <meta property="og:locale" content="ru" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="robots" content="noindex, nofollow" />
    <script src="https://kit.fontawesome.com/bb399fbda1.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.png">
</head>
<body>
    <div class="logo">
        <img src="logo.png" alt="">
    </div>
    
    
    <div class="flex-container">
        <a href="/completion-report" class="item" target="_blank">
            <h4>Акт выполненных работ</h4>
        </a>
        <a href="/invoice" class="item" target="_blank">
            <h4>Сгенерировать счет</h4>
        </a>
        <a href="https://docs.google.com/document/d/17W5jr0RdEOTumXZmqDtDWoPQbBEmj15OurlSStmx5L8/edit?usp=sharing" class="item" target="_blank">
            <h4>Создать договор</h4>
        </a>
        <a href="https://wonder-web.com.ua/brif/" class="item" target="_blank">
            <h4>Создать бриф</h4>
        </a>
        <!-- <a href="/tech-info" class="item" target="_blank">
            <h4>Создать документацию к проекту</h4>
        </a> -->
    </div>
    
    <main class="brief-list">
        <?php foreach($data as $project): ?>
            <section class="card<?=($project['status'] != '1') ? ' status-visibility' : '' ?>">
                <p>
                    <a href="https://wonder-web.com.ua/brif.php?view=<?=$project['token']?>" rel="noopener noreferrer" target="_blank"><?= (!empty($project['project']) ? $project['project'] : $project['name']) ?></a>
                </p>

                <span class="date"><i class="fas fa-calendar-day blue" aria-hidden="true"></i> <?=$project['stage1']?> - <?=$project['stage6']?></span>
                                            
                <div class="control">
                    <div>
                        <!-- <a href="/contract?number=<?php //echo $project['token']?>" rel="noopener noreferrer" target="_blank" data-title="Составить договор"><i class="fas fa-file-alt" aria-hidden="true"></i></a> -->
                        <a href="/invoice?content" rel="noopener noreferrer" target="_blank" data-title="Счет на оплату"><i class="fas fa-file-invoice-dollar" aria-hidden="true"></i></a>
                    </div>
                    <div>
                        <a href="https://wonder-web.com.ua/brif.php?view=<?=$project['token']?>" rel="noopener noreferrer" target="_blank" data-title="Бриф"><i class="fas fa-file-invoice" aria-hidden="true"></i></a>
                        <a href="https://wonder-web.com.ua/brif.php?view=<?=$project['token']?>&editq" class="<?=($project['status'] == '3') ? 'hidden' : '' ?>" rel="noopener noreferrer" target="_blank" data-title="Редактировать бриф"><i class="fas fa-marker" aria-hidden="true"></i></a>
                    </div>
                    <div>
                        <a data-send data-title="Утверждение этапа"><i class="fas fa-user-check yellow" aria-hidden="true"></i></a>
                        <a data-complete="/completion-report?number=<?=$project['token']?>&name=<?=$project['name']?>" data-token="<?=$project['token']?>" rel="noopener noreferrer" target="_blank" data-title="Завершить проект<br>и составить акт о выполненной работе"><i class="fas fa-flag-checkered green" aria-hidden="true"></i></a>
                        <div class="dropdown" data-email="<?=$project['email']?>" data-figma="<?=$project['figma']?>" data-edits="<?=$project['edits']?>" data-name="<?=$project['name']?>" data-project="<?=$project['project']?>">
                            <div class="item">Затвердження прототипу</div>
                            <div class="item">Затвердження дизайну</div>
                            <div class="item">Затвердження правок по сайту</div>
                        </div>
                    </div>
                    <div>
                        <a href="<?=$project['figma']?>" rel="noopener noreferrer" target="_blank" data-title="Прототип / Дизайн"><i class="fab fa-figma" aria-hidden="true"></i></a>
                        <a href="<?=$project['edits']?>" class="<?=($project['status'] == '3') ? 'hidden' : '' ?>" rel="noopener noreferrer" target="_blank" data-title="Правки по сайту"><i class="fas fa-highlighter" aria-hidden="true"></i></a>
                    </div>
                    <div>
                        <?php if ($project['status'] == '1'): ?>
                            <a data-set-status="0" data-token="<?=$project['token']?>" data-title="Поставить проект на паузу"><i class="fas fa-pause red" aria-hidden="true"></i></a>
                        <?php endif; ?>
                        <?php if ($project['status'] == '0'): ?>
                            <a data-set-status="1" data-token="<?=$project['token']?>" data-title="Продолжить работу над проектом"><i class="fas fa-play green" aria-hidden="true"></i></a>
                        <?php endif; ?>
                        <?php if ($project['status'] == '3'): ?>
                            <a class="hidden"><i class="fas fa-play" aria-hidden="true"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
    </main>

    <div id="tooltip"></div>

    <div class="theme-changer" data-title="Тема">
        <i class="fas fa-moon"></i>
        <i class="fas fa-sun"></i>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            
            let theme = localStorage.getItem('theme')
            theme = theme === null ? 1 : theme

            if (theme == 0) {
                $('body').addClass('dark')
                $('.theme-changer').addClass('dark')
            }

            $('.theme-changer').click(() => {
                $('body').toggleClass('dark')
                $('.theme-changer').toggleClass('dark')
                if ($('.theme-changer').hasClass('dark')) localStorage.setItem('theme', 0)
                else localStorage.setItem('theme', 1)
            })

            setInterval(() => {
                window.location.reload()
            }, 60000);
            function init() {
                if (document.layers) document.captureEvents(Event.MOUSEMOVE);
                document.onmousemove = mousemove;
            }
            function mousemove(event) {
                let mouse_x = mouse_y = 0;
                if (document.attachEvent != null) {
                    mouse_x = window.event.clientX;
                    mouse_y = window.event.clientY;
                } else if (!document.attachEvent && document.addEventListener) {
                    mouse_x = event.clientX;
                    mouse_y = event.clientY;
                }
                $('#tooltip').css({
                    'top': mouse_y + 20,
                    'left': mouse_x + 20
                });
            }
            init();

            $('[data-title]').mouseover(function() {
                $('#tooltip').html($(this).data('title'));
                $('#tooltip').show();
            });
            $('[data-title]').mouseleave(function() {
                $('#tooltip').html('');
                $('#tooltip').hide();
            });

            $('[data-set-status]').click(function() {
                $.ajax({
                    type: "POST",
                    url: "changeStatus.php",
                    data: { status: $(this).data('set-status'), token: $(this).data('token') },
                    dataType: "html",
                    cache: false,
                    beforeSend: () => {
                        $(this).find('i').removeClass('fa-pause').removeClass('fa-play').addClass('fa-spinner')
                    },
                    success: (data) => {
                        setTimeout(() => {
                            if($(this).data('set-status') == '0') {
                                $(this).find('i').removeClass('fa-spinner').removeClass('red').addClass('fa-play').addClass('green')
                                $(this).data('set-status', '1').data('title', 'Продолжить работу над проектом').parent().parent().parent().addClass('status-visibility')
                            } else {
                                $(this).find('i').removeClass('fa-spinner').removeClass('green').addClass('fa-pause').addClass('red')
                                $(this).data('set-status', '0').data('title', 'Поставить проект на паузу').parent().parent().parent().removeClass('status-visibility')
                            }
                        }, 500);
                    },
                    error: () => {
                        $(this).find('i').removeClass('fa-spinner').removeClass('green').addClass('fa-exclamation-circle').addClass('red')
                    }
                })
            })

            $('[data-send]').click(function() {
                $(this).parent().find('.dropdown').slideToggle()
            })
            $('.dropdown .item').click(function() {
                $.ajax({
                    type: "POST",
                    url: "send.php",
                    data: { email: $(this).parent().data('email'), name: $(this).parent().data('name'), project: $(this).parent().data('project'), title: $(this).html(), edits: $(this).parent().data('edits'), figma: $(this).parent().data('figma') },
                    dataType: "html",
                    cache: false,
                    beforeSend: () => {
                        $(this).parent().parent().find('[data-send]').find('i').removeClass('fa-user-check').addClass('fa-spinner')
                    },
                    success: (data) => {
                        setTimeout(() => {
                            $(this).parent().parent().find('[data-send]').find('i').removeClass('fa-spinner').addClass('fa-user-check')
                            setTimeout(() => {
                                $(this).parent().parent().find('[data-send]').trigger('click')
                            }, 500);
                        }, 500);
                    },
                    error: () => {
                        $(this).parent().parent().find('[data-send]').find('i').removeClass('fa-user-check').removeClass('green').addClass('fa-exclamation-circle').addClass('red')
                    }
                })
            })

            $('[data-complete]').click(function() {
                $.ajax({
                    type: "POST",
                    url: "changeStatus.php",
                    data: { status: 3, token: $(this).data('token') },
                    dataType: "html",
                    cache: false,
                    beforeSend: () => {
                        $(this).find('i').removeClass('fa-flag-checkered').addClass('fa-spinner')
                    },
                    success: (data) => {
                        window.location.href = $(this).data('complete')
                    },
                    error: () => {
                        $(this).find('i').removeClass('fa-flag-checkered').removeClass('green').addClass('fa-exclamation-circle').addClass('red')
                    }
                })
            })
        })
    </script>
</body>
</html>