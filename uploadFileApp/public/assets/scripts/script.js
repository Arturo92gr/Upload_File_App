(function () {
    let tabla = document.getElementById('filesTable');

    if(tabla) {
        tabla.addEventListener('click', clickTable);
    }

    function clickTable(event) {
        const formDelete = document.getElementById('formDelete');
        let target = event.target;
        if(target.classList.contains('borrar')) {
            event.preventDefault();
            if(confirm('Confirm delete?')) {
                let url = target.dataset.href;
                formDelete.action = url;
                formDelete.submit();
            }
        }
    }
})();