function loadAjax(url, local) {
    $.ajax({
        url,
        context: local,
        cache: false,
        success: function(result) {
            $(`#${local}`).html(result)
        }
    })
}

function sair() {
    window.location = './login.php'
}