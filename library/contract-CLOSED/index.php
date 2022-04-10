
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&amp;display=swap&amp;subset=cyrillic-ext,latin-ext" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&amp;display=swap&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
        <script src="https://kit.fontawesome.com/bb399fbda1.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" type="text/css" href="print-style.css" media="print">
        <link rel="icon" type="image/vnd.microsoft.icon" href="https://wonder-web.com.ua/wp-content/themes/wonderweb/img/icons/favicon.png">
        <title>Акт приймання-передачі виконаних робіт</title>
        <meta name="description" content="WonderWeb | Генератор счета на оплату">
        <meta property="og:title" content="Генератор счета на оплату" />
        <meta property="og:url" content="invoice" />
        <meta property="og:description" content="WonderWeb | генератор счета на оплату" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="WonderWeb Digital Agency" >
        <meta property="og:locale" content="ru" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="robots" content="noindex, nofollow" />
    </head>
    <body>
        <div class="holder">
            <div class="flex-container">
                <img src="https://wonder-web.com.ua/wp-content/themes/wonderweb/img/logo-black.svg" alt="Wonder Web">
                <button class="btn" onclick="window.print()"><i class="fas fa-file-download"></i> Скачать PDF | <i class="fas fa-print"></i> Распечатать</button>
            </div>
    
            <h1 class="title">Акт приймання-передачі виконаних робіт від <span contenteditable><?=date("d.m.Y")?></span></h1>
            
            <p>Згідно з актом приймання-передачі робіт від <span contenteditable><?=date("d.m.Y")?></span>, ФОП Юрченко Максим, далі Виконавець надав послуги по розробці сайту згідно Договору №<span contenteditable><?=$_GET['number']?></span> від <span contenteditable>00.00.0000</span>, а <span contenteditable>КЛИЕНТ</span> далі Замовник, прийняв роботи і оплатив їх в повному обсязі.</p>
            
            <h2 class="title">Перелік послуг</h2>
            <?php $list = 15; // КОЛ-ВО ПУНКТОВ ?>
            <style>
                <?php for ($i=2; $i<$list; $i++): ?>
                    tr.item<?=$i; ?>,
                <?php endfor; ?>
                    tr.item<?=$list; ?> {
                        display: none;
                    }
            </style>
            <table>
                <tr>
                    <td rowspan="2">№<br>п/п</td>
                    <td rowspan="2">Найменування</td>
                    <td rowspan="2">Од. вим.</td>
                    <td rowspan="2">Кількість</td>
                    <td rowspan="2">Ціна</td>
                    <td rowspan="2">Сума без<br>урахування ПДВ</td>
                    <td colspan="2">ПДВ</td>
                    <td rowspan="2">Сума з<br>урахуванням ПДВ</td>
                </tr>
                <tr>
                    <td>ставка</td>
                    <td>сума</td>
                </tr>
                <?php for ($i=1; $i<$list+1; $i++): ?>
                    <tr class="item<?=$i;?>">
                        <td><?=$i;?></td>
                        <td contenteditable></td>
                        <td contenteditable>кіл-ть</td>
                        <td contenteditable id="getUnit<?=$i;?>">1</td>
                        <td contenteditable id="getPrice<?=$i;?>"></td>
                        <td>-</td>
                        <td>0</td>
                        <td id="pdvPrice<?=$i;?>"></td>
                        <td>-<span title="Добавить пункт">+</span></td>
                    </tr>
                <?php endfor; ?>
                <tr>
                    <td colspan="7" style="text-align:right;border:0;font-weight:500">Всього за рахунком</td>
                    <td id="summPrice"></td>
                    <td>-</td>
                </tr>
            </table>
            <br>
            <p>Акт складено у двох примірниках, по кожному для кожної із Сторін. <br> Сторони претензій одна до одної не мають. Послуги вважаються виконаними в повному обсязі, відповідно до дороговору та технічному завданню.</p>
            <h2 class="title">Реквізити та підписи сторін</h2>
            <table class="table-signatures">
                <tbody>
                    <tr>
                        <td>
                            <table class="noborder">
                                <tbody>
                                    <tr>
                                        <td><h3 class="title">Виконавець:</h3></td>
                                        <td>СПД «Юрченко»</td>
                                    </tr>
                                    <tr>
                                        <td>Адреса:</td>
                                        <td>Україна, Одеса, вул. Троїцька, 43Б</td>
                                    </tr>
                                    <tr>
                                        <td>ІПН / КПП:</td>
                                        <td>3072023679</td>
                                    </tr>
                                    <tr>
                                        <td>Рахунок отримувача:</td>
                                        <td>26005060750337</td>
                                    </tr>
                                    <tr>
                                        <td>Рахунок IBAN:</td>
                                        <td>UA343287040000026005060750337</td>
                                    </tr>
                                    <tr>
                                        <td>Банк:</td>
                                        <td>ПІВДЕННЕ ГРУ АТ КБ «ПРИВАТБАНК»</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>Підпис: <span class="signature"></span></p>
                        </td>
                        <td>
                            <table class="noborder">
                                <tbody>
                                    <tr>
                                        <td><h3 class="title">Замовник:</h3></td>
                                        <td contenteditable></td>
                                    </tr>
                                    <tr>
                                        <td>Адреса:</td>
                                        <td contenteditable></td>
                                    </tr>
                                    <tr>
                                        <td>ІПН / КПП:</td>
                                        <td contenteditable></td>
                                    </tr>
                                    <tr>
                                        <td>Рахунок отримувача:</td>
                                        <td contenteditable></td>
                                    </tr>
                                    <tr>
                                        <td>Рахунок IBAN:</td>
                                        <td contenteditable></td>
                                    </tr>
                                    <tr>
                                        <td>Банк:</td>
                                        <td contenteditable></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>Підпис: <span class="signature"></span></p>
                        </td>
                    </tr>                
                </tbody>
            </table>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            function calc() {
                <?php for ($i=1; $i<$list+1; $i++): ?>
                    const price<?=$i;?> = ($('#getPrice<?=$i;?>').html().length > 0) ? parseInt($('#getPrice<?=$i;?>').html().replace(' ', '').replace('грн.', '').replace('грн', '').replace('uah', '').replace('UAH', '')) : 0
                    const unit<?=$i;?> = ($('#getUnit<?=$i;?>').html().length > 0) ? parseInt($('#getUnit<?=$i;?>').html().replace(' ', '')) : 1
                <?php endfor; ?>

                <?php for ($i=1; $i<$list+1; $i++): ?>
                    $('#pdvPrice<?=$i;?>').html(price<?=$i;?> * unit<?=$i;?>)
                <?php endfor; ?>
                
                let summPrice = 0
                for (let i=1; i<<?=$list;?>+1; i++) {
                    summPrice += ($(`#pdvPrice${i}`).html().length > 0) ? parseInt($(`#pdvPrice${i}`).html()) : 0
                }

                $('#summPrice').html(summPrice)
                $('#allPrice').html(summPrice)
            }

            $('#getPrice1, #getUnit1<?php for ($i=2; $i<$list+1; $i++) echo ", #getPrice$i, #getUnit$i"; ?>').keyup(()=> {
                calc()
            })

            $('tr.item1 span').click(function() {
                if ($(this).hasClass('active')) {
                    $(this).html('+').attr('title', 'Добавить пункт')
                    $('tr.item2 td:nth-child(2)').html(' ')
                    $('tr.item2 td:nth-child(3)').html('кіл-ть')
                    $('tr.item2 td:nth-child(4)').html('1')
                    $('tr.item2 td:nth-child(5)').html(' ')
                    $('tr.item2 td:nth-child(5)').html('0')
                    calc()
                    $('tr.item2').hide()
                    $(this).removeClass('active')
                } else {
                    $(this).html('-').attr('title', 'Удалить пункт')
                    $('tr.item2').show().css('display', 'table-row')
                    $(this).addClass('active')
                }
            })
            <?php for ($i=2; $i<$list+1; $i++): ?>
                $('tr.item<?=$i;?> span').click(function() {
                    if ($(this).hasClass('active')) {
                        $('tr.item<?=$i-1;?> span').show().css('display', 'flex')
                        $(this).html('+').attr('title', 'Добавить пункт')
                        $('tr.item<?=$i+1;?> td:nth-child(2)').html(' ')
                        $('tr.item<?=$i+1;?> td:nth-child(3)').html('кіл-ть')
                        $('tr.item<?=$i+1;?> td:nth-child(4)').html('1')
                        $('tr.item<?=$i+1;?> td:nth-child(5)').html(' ')
                        $('tr.item<?=$i+1;?> td:nth-child(5)').html('0')
                        calc()
                        $('tr.item<?=$i+1;?>').hide()
                        $(this).removeClass('active')
                    } else {
                        $('tr.item<?=$i-1;?> span').hide()
                        $(this).html('-').attr('title', 'Удалить пункт')
                        $('tr.item<?=$i+1;?>').show().css('display', 'table-row')
                        $(this).addClass('active')
                    }
                })
            <?php endfor; ?>
        </script>
    </body>
</html>