
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&amp;display=swap&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
        <script src="https://kit.fontawesome.com/bb399fbda1.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" type="image/vnd.microsoft.icon" href="https://wonder-web.com.ua/wp-content/themes/wonderweb/img/icons/favicon.png">
        <title>Генератор оферты</title>
        <meta name="description" content="WonderWeb | Генератор оферты">
        <meta property="og:title" content="Генератор оферты" />
        <meta property="og:url" content="invoice" />
        <meta property="og:description" content="WonderWeb | генератор оферты" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="WonderWeb Digital Agency" >
        <meta property="og:locale" content="ru" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="robots" content="noindex, nofollow" />
    </head>
    <body>
        <img src="https://wonder-web.com.ua/wp-content/themes/wonderweb/img/logo-black.svg" alt="Wonder Web">
        <div class="title">Генерация публичной оферты</div>
        <form action="javascript:void(null)" method="POST">
            <input type="text" name="name" placeholder="Название компании" required>
            <input type="text" name="domen" placeholder="Домен" required>
            <button class="btn" type="submit">Сгенерировать</button>
        </form>
        <div id="text" class="holder"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            $('form').submit(function() {
                const msg = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: 'text.php',
                    data: msg,
                    success: function(data) {
                        $('#text').html(data)
                    },
                    error:  function(xhr, str){
                        alert('Error')
                    }
                })
            })
        </script>
    </body>
</html>