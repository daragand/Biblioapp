// Sélection des éléments du DOM
const menuBtn = document.querySelectorAll('.switch-row');

// Ajout de la classe row sous 769px
document.addEventListener('DOMContentLoaded', () => {
    if (window.innerWidth < 769) {
        menuBtn.forEach(btn => {
            btn.classList.add('row');
        })
    }
})


//pour lister les clients via la recherche par nom
function handleClientId(reqClt) {
    console.log(reqClt)
    fetch(`services/SearchClient.php?cltName=${reqClt}`)
        .then(response => response.json())
        .then(data => {
            showSuggest(JSON.parse(data));
        })
        .catch(error => {
            console.error('Erreur lors de la récupération des clients :', error);
        });
    }


    //pour compléter la datalist 
    function showSuggest(suggestions) {
        console.log('sugg dans showsugg',suggestions)
        // Récupération de l'élément datalist pour y placer l'utilisateur
        const suggestionList = document.getElementById('listSuggClient');
        suggestionList.innerHTML = '';
//u
        if (suggestions.length > 0) {
            suggestions.forEach(client => {
                const listItem = document.createElement('option');
                listItem.textContent = client.firstname;
                suggestionList.appendChild(listItem);
            });
        } else {
            suggestionList.innerHTML = 'Aucun client correspondant trouvé.';
        }
    }