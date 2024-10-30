let totalPrecio = 0;

document.querySelectorAll('.agregar-carrito').forEach(boton => {
    boton.addEventListener('click', function() {
        const precio = parseFloat(this.getAttribute('data-precio'));
        totalPrecio += precio;
        document.getElementById('total-precio').innerText = `$${totalPrecio.toFixed(2)}`;
        alert(`${this.parentElement.parentElement.children[0].innerText} agregado al carrito`);
    });
});