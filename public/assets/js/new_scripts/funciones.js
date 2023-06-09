function proceso_fetch(url, data) {
    return fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded', Authentication: 'secret' },
        body: data
    }).then(response => {
        if (!response.ok) throw Error(response.status);
        return response.json();
    }).catch(error => {
        alert('<span class="red-text">Error en la consulta</span>', 'red lighten-5');
    });
}

function proceso_fetch_get(url) {
    return fetch(url).then(response => {
        if (!response.ok) throw Error(response.status);
        return response.json();
    }).catch(error => {
        Swal.fire({
            title: 'Oops..',
            icon: 'warning',
            html: error,
            confirmButtonText: 'Aceptar'
        });
    });
}

function alert(message, type, duration = 300) {
    M.toast({ html: message, classes: `rounded ${type}`, outDuration: duration });
}

function alert_sweet(error) {
    Swal.fire({
        title: 'Oops..',
        icon: 'warning',
        html: error,
        confirmButtonText: 'Aceptar'
    });
}