
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
                <button class="btn" onclick="print_validate()"><i class="fas fa-file-download"></i> Скачать PDF | <i class="fas fa-print"></i> Распечатать</button>
            </div>
    
            <h1 class="title">Акт приймання-передачі виконаних робіт від <span contenteditable id="input1" title="Дата акта"><?=date("d.m.Y")?></span></h1>
            
            <p>Згідно з актом приймання-передачі робіт від <span contenteditable id="input2" title="Дата акта"><?=date("d.m.Y")?></span>, ФОП Юрченко Максим, далі Виконавець, надав послуги по розробці сайту згідно Договору №<span id="input3" contenteditable title="Номер договора"><?=(!empty($_GET['number'])) ? $_GET['number'] : 'НОМЕР ДОГОВОРА' ?></span> від <span contenteditable id="input4" title="Дата заключения договора">00.00.2021</span>, а <span contenteditable id="input5" title="ФИО Заказчика"><?=(!empty($_GET['name'])) ? $_GET['name'] : 'ФИО КЛИЕНТА' ?></span>, далі Замовник, прийняв роботи і оплатив їх в повному обсязі.</p>
            
            <div class="main-list">
                <h2 class="title">Перелік послуг</h2>
                <?php $list = 13; // КОЛ-ВО ПУНКТОВ ?>
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
                        <td>№<br>п/п</td>
                        <td>Найменування</td>
                        <td>Од. вим.</td>
                        <td>Кількість</td>
                        <td>Ціна</td>
                        <td>Сума без<br>урахування ПДВ</td>
                    </tr>
                    <?php for ($i=1; $i<$list+1; $i++): ?>
                        <tr class="item<?=$i;?>">
                            <td><?=$i;?></td>
                            <td contenteditable></td>
                            <td contenteditable>Послуга</td>
                            <td contenteditable id="getUnit<?=$i;?>">1</td>
                            <td contenteditable id="getPrice<?=$i;?>"></td>
                            <td><span id="pdvPrice<?=$i;?>"></span><span title="Добавить пункт">+</span></td>
                        </tr>
                    <?php endfor; ?>
                    <tr>
                        <td colspan="5" style="text-align:right;border:0;font-weight:500">ПДВ</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align:right;border:0;font-weight:500">Всього за рахунком</td>
                        <td id="summPrice"></td>
                    </tr>
                </table>
            </div>

            <label class="additionally-list-toggle">
                <input type="checkbox">
                <span>Таблица для дополнительных услуг</span>
            </label>

            <div class="additionally-list">
                <h2 class="title">Додаткові послуги,<br>що були замовлені Замовником після виконання основного переліку послуг</h2>
                <?php $add_list = 3; // КОЛ-ВО ПУНКТОВ ?>
                <style>
                    <?php for ($i=2; $i<$add_list; $i++): ?>
                        .additionally-list tr.add_item<?=$i; ?>,
                    <?php endfor; ?>
                        .additionally-list tr.add_item<?=$add_list; ?> {
                            display: none;
                        }
                </style>
                <table>
                    <tr>
                        <td>№<br>п/п</td>
                        <td>Найменування</td>
                        <td>Од. вим.</td>
                        <td>Кількість</td>
                        <td>Ціна</td>
                        <td>Сума без<br>урахування ПДВ</td>
                    </tr>
                    <?php for ($i=1; $i<$add_list+1; $i++): ?>
                        <tr class="add_item<?=$i;?>">
                            <td><?=$i;?></td>
                            <td contenteditable></td>
                            <td contenteditable>Послуга</td>
                            <td contenteditable id="add_getUnit<?=$i;?>">1</td>
                            <td contenteditable id="add_getPrice<?=$i;?>"></td>
                            <td><span id="add_pdvPrice<?=$i;?>"></span><span title="Добавить пункт">+</span></td>
                        </tr>
                    <?php endfor; ?>
                    <tr>
                        <td colspan="5" style="text-align:right;border:0;font-weight:500">ПДВ</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align:right;border:0;font-weight:500">Всього за рахунком</td>
                        <td id="add_summPrice"></td>
                    </tr>
                </table>
            </div>
            <br>
            <p>Акт складено у двох примірниках, по кожному для кожної із Сторін. Сторони претензій одна до одної не мають. Послуги вважаються виконаними в повному обсязі відповідно до договору.</p>
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
                                        <td contenteditable id="input6"><?=(!empty($_GET['name'])) ? $_GET['name'] : '' ?></td>
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
            // main list 
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

            $('.main-list tr.item1 span').click(function() {
                if ($(this).hasClass('active')) {
                    $(this).html('+').attr('title', 'Добавить пункт')
                    $('.main-list tr.item2 td:nth-child(2)').html(' ')
                    $('.main-list tr.item2 td:nth-child(3)').html('Послуга')
                    $('.main-list tr.item2 td:nth-child(4)').html('1')
                    $('.main-list tr.item2 td:nth-child(5)').html(' ')
                    $('.main-list tr.item2 td:nth-child(5)').html('0')
                    calc()
                    $('.main-list tr.item2').hide()
                    $(this).removeClass('active')
                } else {
                    $(this).html('-').attr('title', 'Удалить пункт')
                    $('.main-list tr.item2').show().css('display', 'table-row')
                    $(this).addClass('active')
                }
            })
            <?php for ($i=2; $i<$list+1; $i++): ?>
                $('.main-list tr.item<?=$i;?> span').click(function() {
                    if ($(this).hasClass('active')) {
                        $('.main-list tr.item<?=$i-1;?> span').show().css('display', 'flex')
                        $(this).html('+').attr('title', 'Добавить пункт')
                        $('.main-list tr.item<?=$i+1;?> td:nth-child(2)').html(' ')
                        $('.main-list tr.item<?=$i+1;?> td:nth-child(3)').html('Послуга')
                        $('.main-list tr.item<?=$i+1;?> td:nth-child(4)').html('1')
                        $('.main-list tr.item<?=$i+1;?> td:nth-child(5)').html(' ')
                        $('.main-list tr.item<?=$i+1;?> td:nth-child(5)').html('0')
                        calc()
                        $('.main-list tr.item<?=$i+1;?>').hide()
                        $(this).removeClass('active')
                    } else {
                        $('.main-list tr.item<?=$i-1;?> span').hide()
                        $(this).html('-').attr('title', 'Удалить пункт')
                        $('.main-list tr.item<?=$i+1;?>').show().css('display', 'table-row')
                        $(this).addClass('active')
                    }
                })
            <?php endfor; ?>

            // additionally list
            function add_calc() {
                <?php for ($i=1; $i<$add_list+1; $i++): ?>
                    const price<?=$i;?> = ($('#add_getPrice<?=$i;?>').html().length > 0) ? parseInt($('#add_getPrice<?=$i;?>').html().replace(' ', '').replace('грн.', '').replace('грн', '').replace('uah', '').replace('UAH', '')) : 0
                    const unit<?=$i;?> = ($('#add_getUnit<?=$i;?>').html().length > 0) ? parseInt($('#add_getUnit<?=$i;?>').html().replace(' ', '')) : 1
                <?php endfor; ?>

                <?php for ($i=1; $i<$add_list+1; $i++): ?>
                    $('#add_pdvPrice<?=$i;?>').html(price<?=$i;?> * unit<?=$i;?>)
                <?php endfor; ?>
                
                let summPrice = 0
                for (let i=1; i<<?=$add_list;?>+1; i++) {
                    summPrice += ($(`#add_pdvPrice${i}`).html().length > 0) ? parseInt($(`#add_pdvPrice${i}`).html()) : 0
                }

                $('#add_summPrice').html(summPrice)
                $('#add_allPrice').html(summPrice)
            }
            
            $('#add_getPrice1, #add_getUnit1<?php for ($i=2; $i<$add_list+1; $i++) echo ", #add_getPrice$i, #add_getUnit$i"; ?>').keyup(()=> {
                add_calc()
            })

            $('.additionally-list tr.add_item1 span').click(function() {
                if ($(this).hasClass('active')) {
                    $(this).html('+').attr('title', 'Добавить пункт')
                    $('.additionally-list tr.add_item2 td:nth-child(2)').html(' ')
                    $('.additionally-list tr.add_item2 td:nth-child(3)').html('Послуга')
                    $('.additionally-list tr.add_item2 td:nth-child(4)').html('1')
                    $('.additionally-list tr.add_item2 td:nth-child(5)').html(' ')
                    $('.additionally-list tr.add_item2 td:nth-child(5)').html('0')
                    add_calc()
                    $('.additionally-list tr.add_item2').hide()
                    $(this).removeClass('active')
                } else {
                    $(this).html('-').attr('title', 'Удалить пункт')
                    $('.additionally-list tr.add_item2').show().css('display', 'table-row')
                    $(this).addClass('active')
                }
            })
            <?php for ($i=2; $i<$add_list+1; $i++): ?>
                $('.additionally-list tr.add_item<?=$i;?> span').click(function() {
                    if ($(this).hasClass('active')) {
                        $('.additionally-list tr.add_item<?=$i-1;?> span').show().css('display', 'flex')
                        $(this).html('+').attr('title', 'Добавить пункт')
                        $('.additionally-list tr.add_item<?=$i+1;?> td:nth-child(2)').html(' ')
                        $('.additionally-list tr.add_item<?=$i+1;?> td:nth-child(3)').html('Послуга')
                        $('.additionally-list tr.add_item<?=$i+1;?> td:nth-child(4)').html('1')
                        $('.additionally-list tr.add_item<?=$i+1;?> td:nth-child(5)').html(' ')
                        $('.additionally-list tr.add_item<?=$i+1;?> td:nth-child(5)').html('0')
                        add_calc()
                        $('.additionally-list tr.add_item<?=$i+1;?>').hide()
                        $(this).removeClass('active')
                    } else {
                        $('.additionally-list tr.add_item<?=$i-1;?> span').hide()
                        $(this).html('-').attr('title', 'Удалить пункт')
                        $('.additionally-list tr.add_item<?=$i+1;?>').show().css('display', 'table-row')
                        $(this).addClass('active')
                    }
                })
            <?php endfor; ?>


            $('.additionally-list-toggle input').change(()=> {
                $('.additionally-list').slideToggle()
            })

            $('[contenteditable]').bind('paste', function(e) {
                e.preventDefault()
                const pastedData = e.originalEvent.clipboardData.getData('text')
                $(this).text(pastedData)
            })

            function print_validate() {
                let valid = true

                if($('#input1').html() != $('#input2').html()) {
                    alert('Дата акта в заголовке и тексте не совпадают!')
                    valid = false
                }

                if($('#input3').html() == 'НОМЕР ДОГОВОРА') {
                    alert('Не указан номер договора в описании!')
                    valid = false
                }

                if($('#input4').html() == '00.00.2021') {
                    alert('Не указана дата договора в описании!')
                    valid = false
                }

                if($('#input5').html() == 'ФИО КЛИЕНТА') {
                    alert('Не указано ФИО клиента в описании!')
                    valid = false
                }

                if($('#input6').html() == '') {
                    alert('Не указано ФИО клиента в реквизитах!')
                    valid = false
                } else {
                    if($('#input5').html() != $('#input6').html()) {
                        alert('ФИО клиента в описании и реквизитах не совпадают!')
                        valid = false
                    }
                }

                if(valid) window.print()
            }

        </script>
    </body>
</html>