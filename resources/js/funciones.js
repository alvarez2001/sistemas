document.addEventListener("DOMContentLoaded", e => {
    const btn = document.querySelector("#menu-btn");
    if (btn) {
        const menu = document.querySelector("#sidemenu");

        btn.addEventListener("click", function() {
            menu.classList.toggle("menu-expanded");
            menu.classList.toggle("menu-collapsed");

            //document
            //	.querySelector("#header-sitio")
            //	.classList.toggle("header-collapsed");
        });
    }

    const FMProyecto = "#formulario-crear-proyecto";
    if (document.querySelector(FMProyecto)) {
        subirArchivo(
            FMProyecto + " #imagen_pro",
            FMProyecto + " #imagen_pro_label"
        );
        validarFormularios(FMProyecto);
    }

    const FMUsuario = "#formulario-crear-usuario";
    if (document.querySelector(FMUsuario)) {
        subirArchivo(
            FMUsuario + " #imagen_usu",
            FMUsuario + " #imagen_usu_label"
        );
        validarFormularios(FMUsuario);
    }

    const allDelete = document.querySelectorAll(".delete");
    if (allDelete) {
        allDelete.forEach(buttonDelete => {
            buttonDelete.addEventListener("click", e => {
                const confirm = window.confirm(
                    `Desea eliminar al registro con nombre de: ${buttonDelete.dataset.content}`
                );
                if (!confirm) {
                    e.preventDefault();
                }
            });
        });
    }
});

function existeValores(valor = []) {
    for (let i = 0; i < valor.length; i++) {
        const element = valor[i];
        if (!element.value || element.value === "") {
            return false;
        }
    }
    return true;
}

function subirArchivo(nombreInput, nombreLabel) {
    const inputFile = document.querySelector(nombreInput);
    const label = document.querySelector(nombreLabel);
    const img_prev = document.querySelectorAll(".imagenesPresubida");

    inputFile.addEventListener("change", function() {
        const file = inputFile.files[0];
        label.textContent = file.name;
        const objUrl = URL.createObjectURL(file);
        img_prev.forEach(element => {
            element.src = objUrl;
        });
    });
}

function validarFormularios(nombreFormulario) {
    const formulario = document.querySelector(nombreFormulario);

    formulario.addEventListener("submit", function(e) {
        const inputsAvalidar = e.target.getElementsByClassName("validarInput");
        if (!existeValores(inputsAvalidar)) {
            e.preventDefault();
        }
    });
}
