$(document).ready(function () {
    $('#mensaje').click(function () {
        Swal.fire({
            icon: 'info',
            title: '',
            text: 'Comunicate con el area de desarrollo.'
        });
    });

    $('#developer').click(function () {
        Swal.fire({
            icon: 'info',
            title: '',
            text: 'Developer: Eider González Sánchez.'
        });
    });

    $('#0_intentos').click(function () {
        Swal.fire({
            icon: 'error',
            title: '',
            text: 'Alcanste el numero maximo de intentos.'
        });
    });

    $('#preguntas').click(function () {
        Swal.fire({
            title: "",
            text: "Tienes un solo intento para responder.",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../view/preguntas.php";
            }
        });
    });

    $('#no_valido, #no_valido2, #no_valido3').click(function () {
        Swal.fire({
            icon: 'error',
            title: '',
            text: 'No tiene permisos para eso.'
        });
    });

    $('#habilitar_intentos').click(function () {
        $.ajax({
            url: '../php/habilitar_intentos.php',
            type: 'POST',
            success: function (response) {
                if (response.status === "success") {
                    Swal.fire({
                        icon: "success",
                        title: "",
                        text: response.message,
                    });
                } else if (response.status === "error") {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: response.message,
                    });
                }
            }
        });
    });

    $('#volver').click(function () {
        Swal.fire({
            title: "",
            text: "¿Seguro que quieres volver?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "SI."
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../php/0_intentos.php',
                    type: 'POST',
                    success: function (response) {
                        if (response.status === "success") {
                            Swal.fire({
                                icon: "info",
                                title: "",
                                text: response.message,
                            }).then(function () {
                                window.location.href = "../view/inicio.php";
                            });
                        } else if (response.status === "error") {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: response.message,
                            });
                        }
                    }
                });
            }
        });
    });

    // Get dinamico
    $('.php').on('click', function (e) {
        e.preventDefault();

        var formName = $(this).data('form');

        $.ajax({
            url: formName + '.php',
            type: 'GET',
            success: function (response) {
                $('#resultado').html(response);
            },
            error: function (error) {
                console.log('Error al cargar el formulario:', error);
            }
        });
    });

    // enviar las preguntas
    $('#verificar_respuesta').submit(function (e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: "../php/verificar_respuesta.php",
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status === "success") {
                    Swal.fire({
                        icon: "success",
                        title: "",
                        text: response.message,
                    }).then(function () {
                        window.location.href = "../view/inicio.php";
                    });
                } else if (response.status === "error") {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: response.message,
                    });
                }
            }
        })
    })

    // crear pregunta 
    $('#crear').submit(function (e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: "../php/crear_pregunta.php",
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status === "success") {
                    Swal.fire({
                        icon: "success",
                        title: "",
                        text: response.message,
                    });
                    $("#crear")[0].reset();
                } else if (response.status === "error") {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: response.message,
                    });
                    $("#crear")[0].reset();
                }
            }
        })
    })

    // pagination
    $('.btn-pagination').click(function () {
        var pagina = $(this).data('pagina');
        $.ajax({
            url: '../php/obtener_datos.php', // Aquí deberás especificar la URL de tu script PHP que obtiene los datos
            type: 'GET',
            data: { pagina: pagina },
            success: function (data) {
                $('.table').html(data); // Actualiza la tabla con los nuevos datos recibidos
            },
            error: function () {
                alert('Error al obtener los datos');
            }
        });
    });

    // editar pregunta form
    $('.link').on('click', function (e) {
        e.preventDefault();

        var formName = $(this).data('form');

        var idValue = $(this).data('id');

        var formUrl = '../view/' + formName + '.php?id=' + encodeURIComponent(idValue);

        $.ajax({
            url: formUrl,
            type: 'GET',
            success: function (response) {
                $('#resultado').html(response);
            },
            error: function (error) {
                console.log('Error al cargar el formulario:', error);
            }
        });
    });

    // cambiar pregunta
    $('#editar').submit(function (e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: "../php/cambiar_pregunta.php",
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status === "success") {
                    Swal.fire({
                        icon: "success",
                        title: "",
                        text: response.message,
                    });
                } else if (response.status === "error") {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: response.message,
                    });
                }
            }
        })
    })

    // busqueda puntuacion
    $('#puntuacion').submit(function (e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: '../php/consulta_puntuacion.php',
            type: 'POST',
            data: formData,
            success: function (response) {
                $('#resultado').html(response);
            },
            error: function (error) {
                console.log('Error en la búsqueda:', error);
            }
        });
    });
});