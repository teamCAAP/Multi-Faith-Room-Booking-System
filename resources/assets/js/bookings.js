(function(){
  $('#bookingModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var time = button.data('time');
    var bookingId = button.data('id');
    var modal = $(this);
    modal.find('.modal-title').text('Booking for ' + time);
    modal.find('#bookingTime').val(time);
    modal.find('#bookingId').val(bookingId);
  });
})();