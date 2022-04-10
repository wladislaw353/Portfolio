<?php

$file = trim($_POST['file']);
$id = trim($_POST['id']);

echo htmlspecialchars("
    function ajax(msg) {
        $.ajax({
            type: 'POST',
            url: '/".$file.".php',
            data: msg,
            success: (data)=> {
                $('.modalq').hide()
                $('#modalq-0').fadeIn()
            },
            error: (xhr, str)=> {
                console.log(`\${JSON.stringify(xhr, null, '\\t')}; \${str}`)
            }
        });
    }
    $('#".$id."').submit(function(e) {
        e.preventDefault()
        $(this).find('button').prop('disabled', true)
        const msg = $(this).serialize()
        ajax(msg)
    })
");
?>