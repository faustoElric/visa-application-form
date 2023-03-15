import './bootstrap';

$(document).ready(function() {

    $('.clone-education').click(function() {
        // Clona el .input-group
        var $clone = $('#education-form .input-group').last().clone();

        // Borra los valores de los inputs clonados
        $clone.find(':input').each(function () {
            if ($(this).is('select')) {
                this.selectedIndex = 0;
            } else {
                this.value = '';
            }
        });

    // Agrega lo clonado al final del #formulario
        $clone.appendTo('#education-form');
    });

    $('.clone-work-experience').click(function() {
        // Clona el .input-group
        var $clone = $('#work-experience-form .input-group').last().clone();

        // Borra los valores de los inputs clonados
        $clone.find(':input').each(function () {
            if ($(this).is('select')) {
                this.selectedIndex = 0;
            } else {
                this.value = '';
            }
        });

    // Agrega lo clonado al final del #formulario
        $clone.appendTo('#work-experience-form');
    });

    $(function () {

        var table = $('#profileData').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: "profiles",
              data: function (d) {
                    d.civil_status_id = $('#civil_status_id').val(),
                    d.search = $('input[type="search"]').val(),
                    d.academic_level_id = $('#academic_level_id').val(),
                    d.start_date = $('#start_date').val(),
                    d.end_date = $('#end_date').val()
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'lastname', name: 'lastname'},
                {data: 'birthday', name: 'birthday'},
                {data: 'age', name: 'age'},
                {data: 'email', name: 'email'},
                {data: 'createdAt', name: 'createdAt'},
                {data: 'showProfile', name: 'showProfile', orderable: false},
            ],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registro por página.",
                "zeroRecords": "Lo sentimos, nada encontrado.",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles.",
                "infoFiltered": "(Filtrar desde _MAX_ total de registros.)",
                "search": "Buscar:",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                }
            }
        });

        $('#civil_status_id').change(function(){
            table.draw();
        });

        $('#academic_level_id').change(function(){
            table.draw();
        });

        $('#start_date').change(function(){
            table.draw();
        });

        $('#end_date').change(function(){
            table.draw();
        });

    });
});
