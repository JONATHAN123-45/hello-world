// Obtener y mostrar los clientes
async function cargarClientes() {
    const response = await fetch('../backend/api.php');
    const clientes = await response.json();
    console.log(clientes);

    const tabla = document.getElementById('tabla-clientes');
    clientes.forEach(cliente => {
        const fila = `
            <tr>
                <td>${cliente.nombre}</td>
                <td>${cliente.email}</td>
                <td>${cliente.telefono || 'Sin teléfono'}</td>
            </tr>`;
        tabla.innerHTML += fila;
    });
}

// Registrar un nuevo cliente
async function registrarCliente(nombre, email, telefono) {
    const response = await fetch('../backend/api.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ nombre, email, telefono })
    });
    const data = await response.json();
    alert(data.mensaje);
}

// Eliminar un cliente
async function eliminarCliente(id) {
    const response = await fetch(`../backend/api.php?id=${id}`, {
        method: 'DELETE'
    });
    const data = await response.json();
    alert(data.mensaje);
}

cargarClientes();
