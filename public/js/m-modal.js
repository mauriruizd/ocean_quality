//nuevo registro;
(function(){
    var button = $('#m-submit');
    var form = button.closest('form');
    var url = form.attr('action');
    var method = form.attr('method');
    function save(){
        $.ajax({
            method : method,
            url : url,
            data : form.serialize(),
            success : function(response){
                //location.reload();
                console.log(response);
            }
        });
    }

    button.on('click', save);
})();
//editar registro
(function(){
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
            data : form.serialize(),
            success : function(response) {
                location.reload();
                //console.log(response);
            }
        });
    }

    function setBtnSend(){
        $('#m-update').on('click', update);
    }
})();