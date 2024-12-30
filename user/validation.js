function validateForm() {
    const dateDebut = document.querySelector('input[name="date_debut"]').value;
    const dateFin = document.querySelector('input[name="date_fin"]').value;

    if (new Date(dateDebut) >= new Date(dateFin)) {
        alert("La date de fin doit être après la date de début.");
        return false;
    }

    return confirm("Êtes-vous sûr de vouloir réserver cette place?");
}

