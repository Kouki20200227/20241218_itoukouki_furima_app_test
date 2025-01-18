document.addEventListener('DOMContentLoaded', function () {
    const inputBox = document.getElementById("inputBox");
    const outputBox = document.getElementById("outputBox");
})


function selectChange() {
    const selectedValue = inputBox.value;
    switch (selectedValue) {
        case "1":
            outputBox.value = 'コンビニ払い';
            break;
        case "2":
            outputBox.value = 'カード支払い';
            break;
        default:
            outputBox.value = '';
            break;
    }
}