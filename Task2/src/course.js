function addEditDelete() {
    let add = document.getElementById('add');
    add.addEventListener('click', add);
    let edit = document.getElementById('edit');
    add.addEventListener('click', edit);
    let del = document.getElementById('delete');
    add.addEventListener('click', del);
}
function add(){
    let removeEdit = document.getElementsByClassName('editcourse');
    removeEdit.style.display = 'none';
    let removeDelete = document.getElementsByClassName('delcourse');
    removeDelete.style.display = 'none';
    let showAdd = document.getElementsByClassName('addcourse');
    showAdd.style.display = 'block';
}
function edit(){
    let showEdit = document.getElementsByClassName('editcourse');
    showEdit.style.display = 'block';
    let removeDelete = document.getElementsByClassName('delcourse');
    removeDelete.style.display = 'none';
    let removeAdd = document.getElementsByClassName('addcourse');
    removeAdd.style.display = 'none';
}
function del(){
    let removeEdit = document.getElementsByClassName('editcourse');
    removeEdit.style.display = 'none';
    let showDelete = document.getElementsByClassName('delcourse');
    showDelete.style.display = 'block';
    let removeAdd = document.getElementsByClassName('addcourse');
    removeAdd.style.display = 'none';
}

document.addEventListener('DOMContentLoaded', addEditDelete);