/**
 * Passa os dados do paciente para o Modal, e atualiza o link para exclusão
 */

 $('#desmarcaModal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('agendamento');
  
  var modal = $('#desmarcaModal');
  modal.find('.modal-title').text('Desmarcar Consulta #' + id);
  modal.find('#dconfirm').attr('href','desmarca_agendamentos.php?id=' + id);
})

