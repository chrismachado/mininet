$('#edit-modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var name = button.data('nome'); // Extract info from data-* attributes
  var id = button.data('reg');
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  var modal = $(this);
  modal.find('.modal-title').text('Modificando usuário : ' + name);
  modal.find('.modal-body input#reg').val(id);
  modal.find('.modal-body input#name').val(name);
});

$('#remove-modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var name = button.data('whatever'); // Extract info from data-* attributes
  var id = button.data('id');
  var modal = $(this);
  modal.find('.modal-title').text('Removendo usuário : ' + name);
  modal.find('.modal-body input#reg').val(id)
  modal.find('.modal-body input#name').val(name);

});
$('#adding-modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var name = button.data('whatever'); // Extract info from data-* attributes
  var id = button.data('id');
  var modal = $(this);
  modal.find('.modal-title').text('Adicionando novo dispositivo');
  modal.find('.modal-body input#reg').val(id);
  modal.find('.modal-body input#name').val(name);
});
