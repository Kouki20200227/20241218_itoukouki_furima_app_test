document.addEventListener('DOMContentLoaded', function () {
    const left = document.getElementById('left');
    const right = document.getElementById('right');
    left.style.color = 'palevioletred';
})

function leftClick() {
    left.classList.toggle("palevioletred");
    right.classList.toggle("grey");
}
function rightClick() {
    right.classList.toggle("palevioletred");
    left.classList.toggle("grey");
}

