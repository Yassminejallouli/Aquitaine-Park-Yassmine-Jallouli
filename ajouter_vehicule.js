function validerFormulaire() {
    const plaque = document.getElementById('plaque').value.trim();
    const proprietaire = document.getElementById('proprietaire').value.trim();
    const telephone = document.getElementById('telephone').value.trim();

    if (plaque === '' || proprietaire === '' || telephone === '') {
        alert("Tous les champs doivent être remplis.");
        return false;
    }

    

    if (!/^\d{10}$/.test(telephone)) {
        alert("Le numéro de téléphone doit contenir 10 chiffres.");
        return false;
    
    // Demander confirmation avant de soumettre le formulaire
    return confirm('Voulez-vous vraiment ajouter ce véhicule ?');
}
}