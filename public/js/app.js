$.extend( $.fn.dataTable.defaults, {
    dom: "<'row'<'col-sm-12 col-md-8'B><'col-sm-6 col-md-4'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'d-none d-md-block col-md-6'i><'col-sm-12 col-md-6'p>>",
    processing: true,
    serverSide: true,
    ajax: {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: $('#appTable').attr('data-url'),
        type: "POST",
        dataSrc: function(json){
			table.buttons([1, 2]).disable();
			table.buttons([0, 1, 2]).nodes().removeClass('d-none');
			return json.data;
		}
    },
    language: { url: "../../dataTable.json" },
    // rowId: 'id',
    select: { style: 'single' },
    lengthChange: false,
    pagingType: "full",
    autoWidth: false,
    // responsive: true,
    buttons: {
        buttons: [
            {
                text: '<i class="far fa-file"></i> Crear',
                className: 'd-none',
                action: function() {
                    fn_modal_content(0);
                }
            },
            {
                text: '<i class="far fa-edit"></i> Editar',
                className: 'd-none',
                action: function() {
                    var row_id = table.row({ selected: true }).id();
                    fn_modal_content(1, row_id);
                },
            },
            {
                text: '<i class="far fa-trash-alt"></i> Eliminar',
                className: 'd-none',
                action: function() {
                    var row_id = table.row({ selected: true }).id();
                    fn_modal_delete(row_id);
                },
            },
        ],
        dom: {
            button: {
                className: 'btn btn-outline-dark'
            }
        }
    },
    initComplete: function() {
        $( "#appTable" ).removeClass('d-none');
    }
});

function fn_modal_content(v, a = null) {
    $('.modal-title').empty();
    $('.modal-body').empty();
    $('.btn-check-modal').removeClass('d-none');
    fn_modal();
    if(v === 0){
        var action = $('.model-url').attr('data-url') + '/create';
    }else if(v === 1){
        var action = $('.model-url').attr('data-url') + '/' + a +'/edit';
    }

    $.get(action, function(response){
        $('.modal-title').html(response.title);
        $('.modal-body').html(response.body);
    }).fail(function(response){
        console.log(response);
    });
};

function fn_modal_delete(a = null) {
    var form = $('.form-delete');
    var action = form.attr('action').replace(':ID', a);
    var data = form.serialize();

    bootbox.confirm({
        size: 'lg',
        closeButton: false,
        message: '<h5>¿Está seguro que desea eliminar el registro seleccionado?</h5>',
        buttons: {
            confirm: {
                label: 'Aceptar',
                className: 'btn-danger'
            },
            cancel: {
                label: 'Cancelar',
                className: 'btn-secondary'
            }
        },
        backdrop: true,
        callback: function(result){
            if(result){
                $.post(action, data, function(){
                    table.ajax.reload();
                }).fail(function(response){
                    console.log('Error');
                });
            }
        }
    });
};

function fn_modal(){
    $('#appModal').modal({
        backdrop: "static",
        keyboard: false
    });
};

$(document).on('click', '.btn-check-modal', function(e) {
    e.preventDefault();
    var form = $('#target');
    var data = new FormData(form[0]);
    var action = form.attr('action');

    $.ajax({
        type: 'POST',
        url: action,
        data: data,
        processData: false,
        contentType: false,
    }).done(function(response) {
        table.ajax.reload();
        $('#appModal').modal('hide');
    }).fail(function(response) {
        var errors = response.responseJSON.errors;
        $('.form-error').remove();

        $.each(errors, function(key, value){
            $.each(value, function(_key, _value){
                $('#'+key).append('<div class="form-text form-error">' + _value + '</div>');
            });
        });
    });
});

$('.carousel').carousel()