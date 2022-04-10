function $(selector) {
    return document.querySelector(selector)
}

var urlObject = window.URL || window.webkitURL;
$('input[type="file"]').addEventListener('click', function(e) {
    const file
    if ((file = this.files[0])) {
        const img = new Image()
        img.src = urlObject.createObjectURL(file)
        img.onload = function() {
            draw(this)
        }
    }
});


function draw(img) {
    const $canvas = $('#photo')
    const ctx = $canvas.getContext('2d')

    // setInterval(function () {
    //     ctx.clearRect(0, 0, 500, 500);
    //     ctx.beginPath();
    //     for(var i = 0; i < 5; i++) {
    //         ctx.drawImage(img, 
    //                       0, 
    //                       (i * 100), 
    //                       500, 
    //                       100, 
    //                       Math.floor(Math.random() * 10), 
    //                       (i * 100), 
    //                       500, 
    //                       100);
    //     }
    // }, 100);

    ctx.drawImage(img, 
                    0, 
                    0, 
                    500, 
                    500, 
                    0, 
                    0, 
                    500, 
                    500)

    let imageData = ctx.getImageData(0, 0, 500, 500)

    for(let i = 0; i < imageData.data.length; i += 4) {
        const brightness = 0.34 * imageData.data[i] + 0.5 * imageData.data[i + 1] + 0.16 * imageData.data[i + 2]
        // red
        imageData.data[i] = brightness
        // green
        imageData.data[i + 1] = brightness
        // blue
        imageData.data[i + 2] = brightness
    }
    ctx.putImageData(imageData, 0, 0)
    
}


$('.btn.download').addEventListener('click', ()=> {
    $('#download').setAttribute('href', $canvas.toDataURL())
    $('#download').click()
})

$('.settings').addEventListener('click', ()=> {
    $('aside').classList.toggle('active')
    $('.settings').classList.toggle('active')
})