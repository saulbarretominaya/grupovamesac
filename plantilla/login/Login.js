window.onload = function () {
    EfectoImgs();
}
function EfectoImgs() {
    var imgBg1 = document.createElement('div'),
        imgBg2 = document.createElement('div'),
        imgBg3 = document.createElement('div');
    var t = 3, i = 2, c = 1;
    var body = document.getElementsByTagName('body')[0];

    imgBg1.className = 'container-login-g container-login-g1';
    imgBg2.className = 'container-login-g container-login-g2';
    imgBg3.className = 'container-login-g container-login-g3';

    body.appendChild(imgBg1);
    body.appendChild(imgBg2);
    body.appendChild(imgBg3);


    $('.container-login-g1').fadeIn(-2, function () {
        $('.container-login').fadeIn();
    });

    setInterval(function () {
        $('.container-login-g' + c).fadeOut(2000);
        $('.container-login-g' + i).fadeIn(2000);
        c = i;
        i = (i >= 3) ? 1 : (++i);
    }, 6000);
}
