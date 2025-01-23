const selectedColor = 'palevioletred';
const noSelectedColor = 'grey';
// URLのクエリパラメータ取得
const urlParams = new URLSearchParams(window.location.search);
const tab = urlParams.get('tab');

document.addEventListener('DOMContentLoaded', function () {
    const sell = document.getElementById('sell');
    const buy = document.getElementById('buy');
    if (tab === 'sell') {
        sell.style.color = selectedColor;
        buy.style.color = noSelectedColor;
    } else if (tab === 'buy') {
        sell.style.color = noSelectedColor;
        buy.style.color = selectedColor;
    }
});
