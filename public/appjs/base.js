// Delete Sponsor
function MessageDelete(pk){
    swal({
          title: "Eliminar mensaje",
          text: "Esta seguro que quiere eliminar este mensaje?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Eliminar",
          cancelButtonText: "Cancelar",
          closeOnConfirm: false,
          closeOnCancel: false
      })
      .then(
        function(isConfirm){
          if (isConfirm){
            request_url = '/mensaje/' + pk
            $.ajax({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: request_url,
                  type:'DELETE',
                  success: function(data){
                    location.reload();
                  }
                })
              return true;
          }
          else{
            swal({title: "OK", text: 'Operación cancelada', type: "success", timer: 1000, allowEscapeKey:true});
            return false;
          }
        }
      )
  }