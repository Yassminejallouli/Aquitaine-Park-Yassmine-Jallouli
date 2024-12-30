function confirmerSuppression(event, url) {
    event.preventDefault();
    if (confirm("Êtes-vous sûr de vouloir supprimer cet élément ?")) {
        window.location.href = url;
    }
}
