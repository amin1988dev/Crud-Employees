$(document).ready(function () {
    // Gestione della modale di modifica
    $('#editEmployeeModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Pulsante che ha attivato la modale
        var id = button.data('id');
        var name = button.data('name');
        var surname = button.data('surname');
        var email = button.data('email');
        var phone = button.data('phone');
        var birthdate = button.data('birthdate');
        var address = button.data('address');
        var salary = button.data('salary');

        // Popola la modale con i dati del dipendente
        var modal = $(this);
        modal.find('#edit-id').val(id);
        modal.find('#edit-name').val(name);
        modal.find('#edit-surname').val(surname);
        modal.find('#edit-email').val(email);
        modal.find('#edit-phone').val(phone);
        modal.find('#edit-birthdate').val(birthdate);
        modal.find('#edit-address').val(address);
        modal.find('#edit-salary').val(salary);
    });
});
