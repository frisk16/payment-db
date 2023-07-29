const categoryBtn = document.getElementById('categoryBtn');
const sideBar = document.querySelector('.side-bar');
const background = document.querySelector('.background');
let width = sideBar.clientWidth;

categoryBtn.addEventListener('click', () => {
    background.style.display = 'block';
    sideBar.style.transform = 'translateX(0)';
});

background.addEventListener('click', e => {
    e.target.style.display = 'none';
    sideBar.style.transform = `translateX(-${width}px)`;
});


const editPaymentForm = document.forms.editPaymentForm;
const editPaymentModal = document.getElementById('editPaymentModal');

editPaymentModal.addEventListener('show.bs.modal', e => {
    let btn = e.relatedTarget;
    let id = btn.parentNode.dataset.id;
    let name = btn.parentNode.dataset.name;
    let price = btn.parentNode.dataset.price;
    let date = btn.parentNode.dataset.date;
    let title = document.querySelector('#editPaymentModal h5');

    title.textContent = `「${date}」編集`;
    editPaymentForm.name.value = name;
    editPaymentForm.price.value = price;
    editPaymentForm.date.value = date;
    editPaymentForm.action = `payments/${id}`;
});

const delPaymentForm = document.forms.delPaymentForm;
const delPaymentModal = document.getElementById('delPaymentModal');

delPaymentModal.addEventListener('show.bs.modal', e => {
    let btn = e.relatedTarget;
    let id = btn.parentNode.dataset.id;
    let date = btn.parentNode.dataset.date;
    let title = document.querySelector('#delPaymentModal h5');

    title.textContent = `「${date}」のデータを削除`;
    delPaymentForm.action = `payments/${id}`;
});
