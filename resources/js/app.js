import './bootstrap';

$(document).ready(function() {

    $("#mainInformationModal").modal('show');

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

    var wCounter = 0;
    var wArrayItems = [0];


    function workExperienceItems(wArrayItems){
        wArrayItems.forEach(function(element) {
            $('.btn-work-experience-remove-item-'+element).on('click', function() {
                if (element == 0) {
                    const div = document.querySelector('.work-experience-item-'+element) // get input div
                    var inputElements = div.getElementsByTagName("input"); // get input array
                    var textareaElements = div.getElementsByTagName("textarea"); // get input array
                    var selectElements = div.getElementsByTagName("select"); // get input array

                    for (var i = 0, max = inputElements.length; i < max; i++) { // loop through input elements and make value ''
                        inputElements[i].value = '';
                    }

                    for (var i = 0, max = textareaElements.length; i < max; i++) { // loop through textarea elements and make value ''
                        textareaElements[i].value = '';
                    }

                    for (var i = 0, max = selectElements.length; i < max; i++) { // loop through select elements and make value ''
                        selectElements[i].selectedIndex = 0;
                    }
                } else {
                    $('.work-experience-item-'+element).remove();
                }
            })
        })
    }

    onload = workExperienceItems(wArrayItems);

    $('.clone-work-experience').click(function() {

        var wCounter2 = wCounter;
        wCounter++;

        // Clona el .input-group
        var $clone = $('#work-experience-form .input-group').last().clone().addClass('work-experience-item-'+wCounter).removeClass("work-experience-item-"+wCounter2);

        // Borra los valores de los inputs clonados
        $clone.find(':input').each(function () {
            if ($(this).is('select')) {
                this.selectedIndex = 0;
            } else {
                this.value = '';
            }
        });

        $clone.find('a').each(function () {
            $(this).addClass("btn-work-experience-remove-item-"+wCounter).removeClass("btn-work-experience-remove-item-"+wCounter2);
        });

        // Agrega lo clonado al final del #formulario
        $clone.appendTo('#work-experience-form');

        wArrayItems.push(wCounter);
        return workExperienceItems(wArrayItems);
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


    // Select a township by state ID
    $(document).on('change', '#state_id', function() {
        var state_id = $(this).val();
        var township = $('#township_id');

        $.ajax({
            type: 'get',
            url: '/townships-list-by-state/'+state_id,
            success: function(data){
                township.html(''); // clear the options
                for (var i = 0; i < data.length; i++){
                    township.append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
                }
            },
            error: function(){
                console.log('success');
            },
        });
    });

    // Remove Work Experience by ID
    $(document).on('change', '#work_experience_id', function() {
        var work_experience_id = $(this).val();
        var township = $('#township_id');

        $.ajax({
            type: 'get',
            url: '/townships-list-by-state/'+work_experience_id,
            success: function(data){
                township.html(''); // clear the options
                for (var i = 0; i < data.length; i++){
                    township.append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
                }
            },
            error: function(){
                console.log('success');
            },
        });
    });

    // Checking DUI

    $('#dui').on('blur', function(){
        var dui = $(this).val();

        $.ajax({
            type: 'get',
            url: '/check-dui/'+dui,
            success: function(data){
                if (data.statusCode == 200) {
                    var message = 'El Número DUI ya ha sido registrado con anterioridad. Por favor verifique el número DUI e intente de nuevo. Si el inconvenient persiste pongase en contacto con nosotros.'
                    alert(message);
                    $('#btn-save-data').prop("disabled", true);
                } else {
                    $('#btn-save-data').prop("disabled", false);
                }
            },
            error: function(){
                console.log('success');
            },
        });
    });
});
