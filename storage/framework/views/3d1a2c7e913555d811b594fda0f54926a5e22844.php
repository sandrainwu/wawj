$('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      $("#modal-body").html("<p class='text-center'>数据读取中...</>");
        alert(button.val());
      $.get(button.val(),function(result){
          $("#modal-body").text(result['introduction']);
          $("#modal-body").append('<small><hr>地址:'+result['address']+' 电话:'+result['phone']+'</small>');
      });
      var recipient = button.data('whatever');
      var modal = $(this);
      modal.find('.modal-title').text(recipient);
    })