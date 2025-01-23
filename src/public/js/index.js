const selectedColor = 'palevioletred';
const noSelectedColor = 'grey';
// URLのクエリパラメータ取得
const urlParams = new URLSearchParams(window.location.search);
const page = urlParams.get('page');

document.addEventListener('DOMContentLoaded', function () {
    const left = document.getElementById('left');
    const right = document.getElementById('right');
    if (page === 'mylist') {
        left.style.color = noSelectedColor;
        right.style.color = selectedColor;
    } else if(page === null){
        left.style.color = selectedColor;
        right.style.color = noSelectedColor;
    }
});
