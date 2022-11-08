/**
 * Passa os dados do paciente para o Modal, e atualiza o link para exclusão
 */

 $('#delete-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('paciente');
  
  var modal = $('#delete-modal');
  modal.find('.modal-title').text('Excluir Paciente #' + id);
  modal.find('#confirm').attr('href','delete_pacientes.php?id=' + id);
})


/**
 * Passa os dados do profissional para o Modal, e atualiza o link para exclusão
 */
$('#deleteModalProf').on('show.bs.modal', function (event) {
  
  var buttonp = $(event.relatedTarget);
  var idp = buttonp.data('profissional');
  
  var modalp = $('#deleteModalProf');
  modalp.find('.modal-title').text('Excluir Profissional da Saúde #' + idp);
  modalp.find('#pconfirm').attr('href','delete_profissionais.php?id=' + idp);
})