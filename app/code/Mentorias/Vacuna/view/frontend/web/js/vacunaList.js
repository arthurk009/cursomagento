require(
    [
        'jquery',
        'Magento_Ui/js/modal/modal',
        'mage/calendar'
    ],
    function(
        $,
        modal
    ) {
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
            dateFormat:'dd-mm-yy'
        });

       
        // let options = {
        //     type: 'popup',
        //     responsive: true,
        //     innerScroll: true,
        //     title: 'Example Modal',
        //     buttons: [{
        //         text: $.mage.__('OK'),
        //         class: '',
        //         click: function () {
        //             this.closeModal();
        //         }
        //     }]
        // };

        // modal(options, $('#modal-content'));
        

        // $(".edit").on("click", function() {
        //     $('#modal-content').modal('openModal');
        // });

        var options = {
            type: 'popup',
            responsive: true,
            innerScroll: true,
            title: 'popup modal title',
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
            $("#modal-content").modal("openModal");
        });
    }  
);