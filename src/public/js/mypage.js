function clickEventSell() {
    document.getElementById('sell').addEventListener('click', function () {
        document.getElementById('sell').style.color = 'pink';
        document.getElementById('buy').style.color = 'grey';
    })
}

function clickEventBuy() {
    document.getElementById('buy').addEventListener('click', function () {
        document.getElementById('buy').style.color = 'pink';
        document.getElementById('sell').style.color = 'grey';
    })
}