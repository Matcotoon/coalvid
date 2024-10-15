document.addEventListener('DOMContentLoaded', function(){

    eventListeners();
    darkMode();
    crearGaleria();
    
});


function darkMode (){

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    if(prefiereDarkMode.matches){
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function(){
        if(prefiereDarkMode.matches){
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    })
}

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);

    //Muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));
}
function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar')
}
function mostrarMetodosContacto(e){
    const contactoDiv = document.querySelector('#contacto');
    if(e.target.value === 'telefono'){
        contactoDiv.innerHTML = `
            <input type="tel" placeholder="Tu Numero Telefonico" id="telefono" name="contacto[telefono]" required>

            <p>Elija la fecha y hora para ser contactado</p>
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="contacto[fecha]">

                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="09:00" max="17:00" name="contacto[hora]">

        `;
    } else{
        contactoDiv.innerHTML = `
                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu Email" id="email" name="contacto[email]" required>
        `;
    }

    
}

//FITVIDS

















// function crearGaleria() {

//     const CANTIDAD_IMAGENES = 6
//     const galeria = document.querySelector('.galeria-imagenes')

//     for(let i = 1; i <= CANTIDAD_IMAGENES; i++) {
//         const imagen = document.createElement('IMG')
//         imagen.src = `/src/img/gallery/${i}.jpg`
//         imagen.alt = 'Imagen Galería'

//         // Event Handler
//         imagen.onclick = function() {
//             mostrarImagen(i)
//         }
        
//         galeria.appendChild(imagen)
//     }
// }
// function mostrarImagen(i) {
    
//     const imagen = document.createElement('IMG')
//     imagen.src = `/src/img/gallery/${i}.jpg`
//     imagen.alt = 'Imagen Proyecto'

//     //Generar modal
//     const modal = document.createElement('DIV')
//     modal.classList.add('modal')
//     modal.onclick = cerrarModal

//     modal.appendChild(imagen)

//     //Agregar al HTML
//     const body = document.querySelector('body')
//     body.appendChild(modal)
// }
// function cerrarModal(){
//     const modal = document.querySelector('.modal')
//     modal.classList.add('fade-out') 
//     setTimeout(() => {
//         modal.classList.remove('modal')
//         const modal = document.remove('DIV')
//     }, 500);
// }