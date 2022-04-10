
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&amp;display=swap&amp;subset=cyrillic-ext,latin-ext" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&amp;display=swap&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
        <script src="https://kit.fontawesome.com/bb399fbda1.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css?v3">
        <link rel="stylesheet" type="text/css" href="print-style.css?v3" media="print">
        <link rel="icon" type="image/vnd.microsoft.icon" href="https://wonder-web.com.ua/wp-content/themes/wonderweb/img/icons/favicon.png">
        <title>Рахунок на оплату</title>
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
                <table class="noborder">
                    <tr>
                        <td>Продавець:</td>
                        <td>СПД «Юрченко»</td>
                    </tr>
                    <tr>
                        <td>Адреса:</td>
                        <td>Україна, Одеса, вул. Канатна, 28</td>
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
                    <tr><td></td><td></td></tr>
                    <tr><td></td><td></td></tr>
                    <tr><td></td><td></td></tr>
                    <tr>
                        <td>Замовник:</td>
                        <td contenteditable></td>
                    </tr>
                    <tr>
                        <td>ІПН / КПП:</td>
                        <td contenteditable></td>
                    </tr>
                </table>
                <div id="user-part">
                    <img src="https://wonder-web.com.ua/wp-content/themes/wonderweb/img/logo-black.svg" alt="Wonder Web">
                    <button class="btn" id="print"><i class="fas fa-file-download"></i> Скачать PDF | <i class="fas fa-print"></i> Распечатать</button>
                    <label>
                        <input type="checkbox" id="tax" checked>
                        <span>Добавить налог 10%</span>
                    </label>
                    <p class="warning-extensions ext-1"></p>
                </div>
            </div>
    
            <h1 class="title">Рахунок №<span contenteditable>1</span> від <span contenteditable><?=date("d.m.Y")?></span></h1>
    
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
                        <td><span id="price<?=$i;?>"></span><span title="Добавить пункт">+</span></td>
                    </tr>
                <?php endfor; ?>
                <tr>
                    <td colspan="5" style="text-align:right;border:0">ПДВ</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:right;border:0">Всього за рахунком</td>
                    <td id="summPrice"></td>
                </tr>
            </table>
            <br><br>
            <span>Всього до сплати: <strong id="allPrice"></strong> <strong>грн.</strong></span>
            <br>
            <br>
            <span><strong id="allPriceText"></strong></span>
            <br>
            <br>
            <span>В т.ч. ПДВ: <strong>Без ПДВ</strong></span>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>

            const current_version = 3
            const text_version = '\n★ НОВАЯ ВЕРСИЯ ★\n\nНалог теперь можно добавлять автоматически!'

            if ( localStorage.getItem('version') != current_version ) {
                localStorage.setItem('version', current_version)
                alert(text_version)
            }

            $('body').click(()=> {
                setTimeout(() => {
                    if ($('grammarly-extension').html() != undefined || $('grammarly-popups').html() != undefined) $('.warning-extensions.ext-1').html('Обнаружено дополнение <strong>Grammarly</strong>, нарушающее работу генератора.<br><strong>Активирована защита</strong>, но рекомендуется отключить его для этого домена')
                    if ($('grammarly-extension')) $('grammarly-extension').remove()
                    if ($('grammarly-popups')) $('grammarly-popups').remove()
                }, 1000)
            })

            $('#print').click(()=> {
                // добавляем налог
                if ( $('#tax').prop('checked') ) {
                    $('tr[class*=item]').each(function() {
                        const price = parseFloat($(this).find('td:nth-child(5)').text().replace(' ', '').replace('грн.', '').replace('грн', '').replace('uah', '').replace('UAH', ''))
                        if (price) {
                            $(this).attr('data-price', price)
                            $(this).find('td:nth-child(5)').text(price + price * 0.1)
                        }
                    })
                    calc()
                }
                // печатаем
                window.print()
                // возвращаем цены без налога
                $('tr[class*=item]').each(function() {
                    $(this).find('td:nth-child(5)').text( $(this).data('price') )
                })
                calc()
            })

            function calc() {
                <?php for ($i=1; $i<$list+1; $i++): ?>
                    const price<?=$i;?> = ($('#getPrice<?=$i;?>').html().length > 0) ? parseFloat($('#getPrice<?=$i;?>').html().replace(' ', '').replace('грн.', '').replace('грн', '').replace('uah', '').replace('UAH', '')) : 0
                    const unit<?=$i;?> = ($('#getUnit<?=$i;?>').html().length > 0) ? parseFloat($('#getUnit<?=$i;?>').html().replace(' ', '')) : 1
                <?php endfor; ?>

                <?php for ($i=1; $i<$list+1; $i++): ?>
                    $('#price<?=$i;?>').html(price<?=$i;?> * unit<?=$i;?>)
                <?php endfor; ?>
                
                let summPrice = 0
                for (let i=1; i<<?=$list;?>+1; i++) {
                    summPrice += ($(`#price${i}`).html().length > 0) ? parseFloat($(`#price${i}`).html()) : 0
                }

                $('#summPrice').html(summPrice)
                $('#allPrice').html(summPrice)
                if (summPrice <= 999999999999) {
                    $('#allPriceText').html(FloatToSamplesInWordsRus(parseFloat(summPrice))+".")
                } else {
                    $('#allPriceText').html('Да иди в жопу, чувак, считай сам. Ты че совсем уже, я тебе тут что, Мегамозг?!')
                }
            }

            $('#getPrice1, #getUnit1<?php for ($i=2; $i<$list+1; $i++) echo ", #getPrice$i, #getUnit$i"; ?>').keyup(function() {
                // if ($(this).val().includes(',')) $(this).val($(this).val().replace(',', '.'))
                // if ($(this).val().includes('/')) $(this).val($(this).val().replace('/', ''))
                // if ($(this).val().includes('?')) $(this).val($(this).val().replace('?', ''))
                // if ($(this).val().includes('>')) $(this).val($(this).val().replace('>', ''))
                // if ($(this).val().includes('<')) $(this).val($(this).val().replace('<', ''))
                calc()
            })

            $('tr.item1 span[title]').click(function() {
                if ($(this).hasClass('active')) {
                    $(this).html('+').attr('title', 'Добавить пункт')
                    $('tr.item2 td:nth-child(2)').html(' ')
                    $('tr.item2 td:nth-child(3)').html('Послуга')
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
                $('tr.item<?=$i;?> span[title]').click(function() {
                    if ($(this).hasClass('active')) {
                        $('tr.item<?=$i-1;?> span[title]').show().css('display', 'flex')
                        $(this).html('+').attr('title', 'Добавить пункт')
                        $('tr.item<?=$i+1;?> td:nth-child(2)').html(' ')
                        $('tr.item<?=$i+1;?> td:nth-child(3)').html('Послуга')
                        $('tr.item<?=$i+1;?> td:nth-child(4)').html('1')
                        $('tr.item<?=$i+1;?> td:nth-child(5)').html(' ')
                        $('tr.item<?=$i+1;?> td:nth-child(5)').html('0')
                        calc()
                        $('tr.item<?=$i+1;?>').hide()
                        $(this).removeClass('active')
                    } else {
                        $('tr.item<?=$i-1;?> span[title]').hide()
                        $(this).html('-').attr('title', 'Удалить пункт')
                        $('tr.item<?=$i+1;?>').show().css('display', 'table-row')
                        $(this).addClass('active')
                    }
                })
            <?php endfor; ?>

            $('[contenteditable]').bind('paste', function(e) {
                e.preventDefault()
                const pastedData = e.originalEvent.clipboardData.getData('text')
                $(this).text(pastedData)
            })

            const mapNumbers = {
            0 : [2, 1, "нуль"], 
            1 : [0, 2, "одна", "одна"], 
            2 : [1, 2, "двi", "двi"], 
            3 : [1, 1, "три"], 
            4 : [1, 1, "чотири"], 
            5 : [2, 1, "п'ять"], 
            6 : [2, 1, "шiсть"], 
            7 : [2, 1, "сiм"], 
            8 : [2, 1, "вiсiм"], 
            9 : [2, 1, "дев'ять"], 
            10 : [2, 1, "десять"], 
            11 : [2, 1, "одинадцять"], 
            12 : [2, 1, "дванадцять"], 
            13 : [2, 1, "тринадцять"], 
            14 : [2, 1, "чотирнадцять"], 
            15 : [2, 1, "п'ятнадцять"], 
            16 : [2, 1, "шiстнадцять"], 
            17 : [2, 1, "сiмнадцять"], 
            18 : [2, 1, "вiсiмнадцять"], 
            19 : [2, 1, "дев'ятнадцzть"],
            20 : [2, 1, "двадцять"],
            30 : [2, 1, "тридцять"],
            40 : [2, 1, "сорок"],
            50 : [2, 1, "п'ятдесят"],
            60 : [2, 1, "шiстдесят"],
            70 : [2, 1, "сiмдесят"],
            80 : [2, 1, "вiсiмдесят"],
            90 : [2, 1, "дев'яносто"],
            100 : [2, 1, "сто"],
            200 : [2, 1, "двiсти"],
            300 : [2, 1, "триста"],
            400 : [2, 1, "чотириста"],
            500 : [2, 1, "п'ятсот"],
            600 : [2, 1, "шiстсот"],
            700 : [2, 1, "сiмсот"],
            800 : [2, 1, "вiсiмсот"],
            900 : [2, 1, "дев'ятсот"]
        };

        const mapOrders = [ 
            { _Gender : true, _arrStates : ["гривня", "гривнi", "гривень"] }, 
            { _Gender : false, _arrStates : ["тисяча", "тисячi", "тисяч"] }, 
            { _Gender : true, _arrStates : ["мiльйон", "мiльйони", "мiльйонiв"] }, 
            { _Gender : true, _arrStates : ["мільярд", "мільярди", "мільярдiв"] }, 
            { _Gender : true, _arrStates : ["трильйон", "трильйони", "трильйонiв"] }
        ];

        const objKop = { _Gender : false, _arrStates : ["копiйка", "копiйки", "копiйок"] };

        function Value(dVal, bGender) {
            let xVal = mapNumbers[dVal];
            if (xVal[1] == 1) {
                return xVal[2];
            } else {
                return xVal[2 + (bGender ? 0 : 1)];
            }
        }

        function From0To999(fValue, oObjDesc, fnAddNum, fnAddDesc)
        {
            let nCurrState = 2;
            if (Math.floor(fValue/100) > 0) {
                let fCurr = Math.floor(fValue/100)*100;
                fnAddNum(Value(fCurr, oObjDesc._Gender));
                nCurrState = mapNumbers[fCurr][0];
                fValue -= fCurr;
            }

            if (fValue < 20) {
                if (Math.floor(fValue) > 0) {
                    fnAddNum(Value(fValue, oObjDesc._Gender));
                    nCurrState = mapNumbers[fValue][0];
                }
            } else {
                let fCurr = Math.floor(fValue/10)*10;
                fnAddNum(Value(fCurr, oObjDesc._Gender));
                nCurrState = mapNumbers[fCurr][0];
                fValue -= fCurr;
                
                if (Math.floor(fValue) > 0) {
                    fnAddNum(Value(fValue, oObjDesc._Gender));
                    nCurrState = mapNumbers[fValue][0];
                }
            }

            fnAddDesc(oObjDesc._arrStates[nCurrState]);
        }

        function FloatToSamplesInWordsRus(fAmount)
        {
            let fInt = Math.floor(fAmount + 0.005);
            let fDec = Math.floor(((fAmount - fInt) * 100) + 0.5);

            let arrRet = [];
            let iOrder = 0;
            let arrThousands = [];
            for (; fInt > 0.9999; fInt/=1000) {
                arrThousands.push(Math.floor(fInt % 1000));
            }
            if (arrThousands.length == 0) {
                arrThousands.push(0);
            }

            function PushToRes(strVal) {
                arrRet.push(strVal); 
            }

            for (let iSouth = arrThousands.length-1; iSouth >= 0; --iSouth) {
                if (arrThousands[iSouth] == 0) {
                    continue;
                }
                From0To999(arrThousands[iSouth], mapOrders[iSouth], PushToRes, PushToRes);
            }

            if (arrThousands[0] == 0) {
                //  Handle zero amount
                if (arrThousands.length == 1) {
                    PushToRes(Value(0, mapOrders[0]._Gender));
                }

                let nCurrState = 2;
                PushToRes(mapOrders[0]._arrStates[nCurrState]);
            }

            if (arrRet.length > 0) {
                // Capitalize first letter
                arrRet[0] = arrRet[0].match(/^(.)/)[1].toLocaleUpperCase() + arrRet[0].match(/^.(.*)$/)[1];
            }

            arrRet.push((fDec < 10) ? ("0" + fDec) : ("" + fDec));
            From0To999(fDec, objKop, function() {}, PushToRes);

            return arrRet.join(" ");
        }
            
        </script>
    </body>
</html>