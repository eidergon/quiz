$(document).ready(function () {
    if (performance.navigation.type === 1) {
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