async function cargarClientes() {
    const response = await fetch('../backend/obtener_clientes.php');
    const clientes = await response.json();
    console.log(clientes);
}

cargarClientes();
