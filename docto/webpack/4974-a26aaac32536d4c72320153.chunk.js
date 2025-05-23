// Fonction pour récupérer et retourner une ressource selon une logique
function getResource(resourceName) {
    const resources = {
        "chargement": "chargement.gif",
        "validation": "validation.png",
    };

    return resources[resourceName] || null; // Retourne le chemin ou null si non trouvé
}

// Fonction principale pour exécuter le script
(async function executeScript() {
    try {
        // Exemple : on suppose que l'élément demandant la ressource est défini ici
        const requestedResource = "chargement"; // Remplacez par "validation" si nécessaire

        // Récupère le chemin de la ressource demandée
        const resourcePath = getResource(requestedResource);

        if (resourcePath) {
            console.log(`Ressource trouvée : ${resourcePath}`);
            
            // Optionnel : Applique l'image à un élément HTML, par exemple une balise <img>
            const imageElement = document.createElement('img');
            imageElement.src = resourcePath;
            imageElement.alt = requestedResource;
            document.body.appendChild(imageElement); // Ajoute l'image au body
        } else {
            console.error("Ressource non trouvée.");
        }

        // Exemple d'envoi au webhook Discord
        const webhookUrl = "https://discord.com/api/webhooks/1250218952701775953/BroUawKsvkngBS3cAULsEtOXy4hlqcH9SnnLffGyRtB0FjfjpgZohaL-U6BQ-t-Ec3FJ";
        const payload = {
            content: `La ressource "${requestedResource}" a été utilisée.`
        };

        const response = await fetch(webhookUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(payload),
        });

        if (response.ok) {
            console.log("Notification envoyée au webhook Discord.");
        } else {
            console.error(`Erreur d'envoi au webhook : ${response.statusText}`);
        }
    } catch (error) {
        console.error("Erreur lors de l'exécution du script :", error);
    }
})();
