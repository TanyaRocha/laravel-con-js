$(function() {
    $('#lts-user').DataTable( {
         processing: true,
            serverSide: true,
            ajax: "/Usuario/mostrar",
            columns:[
                {data: 'usr_usuario'},
                {data: 'usr_clave'},
                {data: 'usr_estado'},
                {data: 'usr_registrado'},
                {data: 'usr_modificado'},
                {data: 'actualizar',orderable: false, searchable: false},
                {data: 'eliminar',orderable: false, searchable: false},
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
         lengthMenu: [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
    });
   });