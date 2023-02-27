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
});

