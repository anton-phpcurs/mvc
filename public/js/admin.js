
(function() {
    setInterval(function() {
        var dateNow =new Date();
        var d = dateNow.getDate();
        var m = dateNow.getMonth();
        var y = dateNow.getFullYear();
        var h = dateNow.getHours();
        var min = dateNow.getMinutes()
        document.querySelector('#dateTime').innerHTML = '<small>' + d +'/' + m + '/' + y + '</small> <big>' + h + ':' + min + '</big>';
    }, 1000);
})();