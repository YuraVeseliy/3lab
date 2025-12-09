// Import Bootstrap
import 'bootstrap';

// Import jQuery
import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;

// Custom JavaScript
$(document).ready(function() {
    console.log('Laravel app initialized');
    
    // Подтверждение удаления
    $(document).on('submit', 'form.delete-form', function(e) {
        if (!confirm('Вы уверены, что хотите удалить этот элемент?')) {
            e.preventDefault();
        }
    });
});