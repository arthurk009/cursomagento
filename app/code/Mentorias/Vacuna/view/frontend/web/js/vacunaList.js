require(
    [
        'jquery',
        'Magento_Ui/js/modal/modal',
        'mage/calendar',
        'https://unpkg.com/sweetalert/dist/sweetalert.min.js'
    ],
    function($,modal) 
    {
       

        $('#datepicker').datepicker({
            prevText: 'Anterior', prevStatus: '',
            prevJumpText: '&#x3c;&#x3c;', prevJumpStatus: '',
            nextText: 'Siguiente', nextStatus: '',
            nextJumpText: '&#x3e;&#x3e;', nextJumpStatus: '',
            monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
                'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
             'Jul','Ago','Sep','Oct','Nov','Dic'],
            dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
            dayNamesShort: ['Do','Lu','Ma','Mi','Jue','Vie','Sab'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Jue','Vie','Sab'],
            showMonthAfterYear: false,
            dateFormat:'yy-mm-dd'
        });

        var options = {
            type: 'popup',
            responsive: true,
            innerScroll: true,
            title: 'Editar Registro',
            buttons: [{
                text: $.mage.__('Actualizar'),
                class: 'saveEdit',
                click: function () {
                    this.closeModal();
                }
            }]
        };

        var popup = modal(options, $('#modal-content'));
        $(".edit").on('click',function(){ 
            $("#idVacuna").val($(this).attr('id'));
            let datetime = $(this).attr('datetime').split(" ");
            $("#datepicker").val(datetime[0]);
            $("#hour").val(datetime[1]);
            $("#modal-content").modal("openModal");
        });

        $(".saveEdit").on('click',function(){    
            let formData = {
                day: $("#datepicker").val(),
                hour: $("#hour").val(),
                id: $("#idVacuna").val(),
              };
              const urlSaveData = BASE_URL + 'vacuna/index/updatevacuna';
              $.ajax({
                type: "POST",
                url: urlSaveData,
                data: formData,
                dataType: "json",
                success: function(response){
                    console.log(response);
                    if(response.result){
                        
                        //window.location.href = BASE_URL + 'vacuna/index/vacunaslist';
                        window.location.reload(true);
                    }
                    //
                }
              });
              return false;
        });


        $(".delete").on('click',function(){
            let tr = $(this).closest('tr'); 
            console.log($(this).attr('id'));
            let formDataDel = {
                id: $(this).attr('id'),
              };

              swal({
                title: "Eliminar registro",
                text: "¿Está seguro de eliminar el registro?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {

                    const urlDeleteData = BASE_URL + 'vacuna/index/deletevacuna';
                    $.ajax({
                      type: "POST",
                      url: urlDeleteData,
                      data: formDataDel,
                      dataType: "json",
                      success: function(response){
                        console.log(response);
                        tr.remove();
                        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
                      }
                    });


                  swal("¡Registro eliminado correctamente!", {
                    icon: "success",
                  });
                } 
              });

              //if (confirm("Está seguro de eliminar el registro") == true) {
                
              //}

              
              return false;
        });
    }  
);