const navover = document.querySelector('#navOver');
const togle = document.querySelector('#togl');
const close = document.querySelector('#close');
togle.addEventListener('click', function () {
    navover.classList.remove('hidden');

})
close.addEventListener('click', function () {
    navover.classList.add('hidden');
})