function addEditDelete() {
    let add = document.getElementById('add');
    add.addEventListener('click', add);
    let edit = document.getElementById('edit');
    add.addEventListener('click', edit);
    let del = document.getElementById('delete');
    add.addEventListener('click', del);
}

document.addEventListener('DOMContentLoaded', addEditDelete);