$(document).ready(function() {
    // Cargar facultades al iniciar
    cargarFacultades();

    // Manejar el envío del formulario
    $('#formulario').on('submit', function(e) {
        e.preventDefault();
        
        let facultad = $('#facultad').val();
        let id = $('#formulario').data('id');
        let accion = id ? 'actualizar' : 'crear';

        $.ajax({
            url: './app/controller/FacultadDao.php',
            type: 'POST',
            data: {
                accion: accion,
                facultad: facultad,
                id: id
            },
            success: function(response) {
                try {
                    let res = JSON.parse(response);
                    if(res.status === 'success') {
                        cargarFacultades();
                        $('#formulario')[0].reset();
                        $('#formulario').removeData('id');
                        $('input[type="submit"]').val('Guardar');
                    }
                    alert(res.message);
                } catch(e) {
                    console.error('Error parsing JSON:', response);
                    alert('Error en la respuesta del servidor');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en la petición:', status, error);
                alert('Error al conectar con el servidor. Revisa la consola para más detalles.');
            }
        });
    });
});

function cargarFacultades() {
    $.ajax({
        url: './app/controller/FacultadDao.php',
        type: 'POST',
        data: { accion: 'leer' },
        success: function(response) {
            try {
                let facultades = JSON.parse(response);
                let html = '';
                
                facultades.forEach(function(facultad) {
                    html += `
                        <tr>
                            <td>${facultad.idfacultad}</td>
                            <td>${facultad.nomfac}</td>
                            <td>
                                <button onclick="editarFacultad(${facultad.idfacultad}, '${facultad.nomfac}')" 
                                        class="btn btn-warning btn-sm">
                                    Editar
                                </button>
                                <button onclick="eliminarFacultad(${facultad.idfacultad})" 
                                        class="btn btn-danger btn-sm">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    `;
                });
                
                $('#tablaFac').html(html);
            } catch(e) {
                console.error('Error parsing JSON:', response);
                alert('Error en la respuesta del servidor');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error en la petición:', status, error);
            alert('Error al conectar con el servidor. Revisa la consola para más detalles.');
        }
    });
}

function editarFacultad(id, nombre) {
    $('#facultad').val(nombre);
    $('#formulario').data('id', id);
    $('input[type="submit"]').val('Actualizar');
}

function eliminarFacultad(id) {
    if(confirm('¿Está seguro de eliminar esta facultad?')) {
        $.ajax({
            url: './app/controller/FacultadDao.php',
            type: 'POST',
            data: {
                accion: 'eliminar',
                id: id
            },
            success: function(response) {
                try {
                    let res = JSON.parse(response);
                    if(res.status === 'success') {
                        cargarFacultades();
                    }
                    alert(res.message);
                } catch(e) {
                    console.error('Error parsing JSON:', response);
                    alert('Error en la respuesta del servidor');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en la petición:', status, error);
                alert('Error al conectar con el servidor. Revisa la consola para más detalles.');
            }
        });
    }
}