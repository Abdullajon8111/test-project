require('./bootstrap');

require('select2');
$('.select2').select2({
    theme: 'bootstrap',
    width: 'auto'
});

import Swal from 'sweetalert2';

window.swal = function ($type, $text) {
    Swal.fire({
        icon: $type,
        text: $text
    });
};

window.deleteConfirm = function(formId) {
    Swal.fire({
        icon: 'warning',
        text: 'Do you want to delete this?',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        confirmButtonColor: '#e3342f',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(formId).submit();
        }
    });
};
