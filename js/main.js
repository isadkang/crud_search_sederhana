$(document).ready(function() {
    $('data').DataTable()
})

let docTitle = document.title
window.addEventListener("blur", () => {
    document.title = "BALEK LAHHH :("
})

window.addEventListener("focus", () => {
    document.title = docTitle
})

function hapus(id) {
    if (confirm("Menghapus data?")) {
        window.location.href = '../controller/del.php?id=' + id;
    }
}

function logout() {
    if (confirm("Ingin Logout?")) {
        window.location.href = '../controller/logout.php'
    }
}