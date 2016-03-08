function errorHandler(err) {
    $('#errWell').html(err).show('fast');
    setTimeout(function(){
        $('#errWell').hide('fast');
    }, 8000);
}
function deleteErrorHandler(xhr, txtStatus, err){
    if (typeof deleteErrorMsg == 'undefined') {
        errorHandler('Hubo un error inesperado en el servidor! Por favor intente de nuevo más tarde.');
    } else {
        errorHandler(deleteErrorMsg);
    }
}

function saveErrorHandler(xhr, txtStatus, err) {
    if (typeof saveErrorMsg == 'undefined') {
        errorHandler('Hubo un error inesperado en el servidor! Por favor intente de nuevo más tarde.');
    } else {
        errorHandler(saveErrorMsg);
    }
}

function editErrorHandler(xhr, txtStatus, err) {
    if (typeof editErrorMsg == 'undefined') {
        errorHandler('Hubo un error inesperado en el servidor! Por favor intente de nuevo más tarde.');
    } else {
        errorHandler(editErrorMsg);
    }
}

//nuevo registro;
(function(errorHandler){
    var button = $('#m-submit');
    var form = button.closest('form');
    var url = form.attr('action');
    var method = form.attr('method');
    function save(){
        $.ajax({
            method : method,
            url : url,
            data : new FormData(form[0]),
            enctype : 'multipart/form-data',
            processData : false,
            contentType : false,
            success : function(response){
                location.reload();
                //console.log(response);
            },
            error : errorHandler
        });
    }

    button.on('click', save);
})(saveErrorHandler);

//editar registro
(function(errorHandler){
    var url = $('#editUrl').val();
    var editModal = $('#editModal').children('.modal-dialog:first').children('.modal-content:first');
    $('.m-edit').on('click', function(){
        editModal.html('Cargando..');
        var id = $(this).val();
        editModal.load(url + id + '/edit', function(response, status, xhr){
            if(status == 'error'){
                $(editModal).html('Error al cargar el registro. La pagina será recargada');
                setTimeout(function(){
                    location.reload();
                }, 1500);
            }
            setBtnSend();
        });
    });
    function update(){
        var button = $('#m-update');
        var form = button.closest('form');
        var method = form.attr('method');
        var url = form.attr('action');
        $.ajax({
            method : method,
            url : url,
            data : new FormData(form[0]),
            enctype : 'multipart/form-data',
            processData : false,
            contentType : false,
            success : function(response) {
                location.reload();
                //console.log(response);
            },
            error : errorHandler
        });
    }

    function setBtnSend(){
        $('#m-update').on('click', update);
    }
})(editErrorHandler);

//eliminar registro
(function(errorHandler){
    function eliminar(){
        var form = $(this).closest('form');
        var method = form.attr('method');
        var url = form.attr('action');
        $.ajax({
            method : method,
            url : url,
            data : new FormData(form[0]),
            enctype : 'multipart/form-data',
            processData : false,
            contentType : false,
            success : function(response) {
                location.reload();
                //console.log(response);
            },
            error : errorHandler
        });
    }
    $('.btn-delete').on('click', eliminar);
})(deleteErrorHandler);

(function(){
    $('#m-more-images').on('click', function(){
        $(this).parent().append($(this).prev()[0].outerHTML);
    });
})();