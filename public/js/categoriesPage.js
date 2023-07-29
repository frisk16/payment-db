const editModal = document.getElementById('editCategoryModal');
const editForm = document.forms.editCategoryForm;

editModal.addEventListener('show.bs.modal', e => {
    let btn = e.relatedTarget;
    let modalTitle = document.querySelector('#editCategoryModal h5');
    let id = btn.parentNode.dataset.id;
    let name = btn.parentNode.dataset.name;

    modalTitle.textContent = `「${name}」カテゴリー編集`;
    editForm.name.value = name;
    editForm.action = `categories/${id}`;
});

const delModal = document.getElementById('delCategoryModal');
const delForm = document.forms.delCategoryForm;

delModal.addEventListener('show.bs.modal', e => {
    let btn = e.relatedTarget;
    let modalTitle = document.querySelector('#delCategoryModal h5');
    let id = btn.parentNode.dataset.id;
    let name = btn.parentNode.dataset.name;

    modalTitle.textContent = `「${name}」カテゴリーを削除`;
    delModal.action = `categories/${id}`;
});
