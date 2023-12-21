let monPanier = {};

function PanierAcheter() {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = 'panier.php';

    for (const id in monPanier) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = id;
        input.value = monPanier[id];
        form.appendChild(input);
    }

    document.body.appendChild(form);
    form.submit();
}


function AjouterAuPanier(id)
{
    ChangerQuantiterAuPanier(id, 1);
}

function RetirerAuPanier(id)
{
    delete monPanier[id];
    changerQuantite(id);
}

function ChangerQuantiterAuPanier(id, valeur)
{
    if(valeur <= 0)
    {
        RetirerAuPanier(id);
        return;
    }
    if(valeur > 99)
    {
        valeur =99;
    }
    monPanier[id] = valeur;
    changerQuantite(id);

}
function changerQuantite(id)
{
    updateQuantite(id);
    
    // Sauvegarder dans une session
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = 'sessionPanier.php';

    for (const id in monPanier) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = id;
        input.value = monPanier[id];
        form.appendChild(input);
    }

    // Utilisation d'AJAX pour envoyer le formulaire à sessionPanier.php
    const formData = new FormData(form);

    const xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "sessionPanier.php");
    xmlhttp.send(formData);
}
function updateQuantite(id)
{
    if(document.querySelector('.enbas[value="'+id+'"]'))
    {
        if(monPanier[id])
        {
            // on masque le boutton AjoutPanier et on affiche le boutton ajout panier et on met a jour le nombre 
            document.querySelector('.enbas[value="'+id+'"]').querySelector('input').value = monPanier[id];
            document.querySelector('.enbas[value="'+id+'"]').querySelector('.btnPanier').classList.add("hide");
            document.querySelector('.enbas[value="'+id+'"]').querySelector('.editionPanier').classList.remove("hide");
        }
        else
        {
            // on affiche le boutton AjoutPanier et on masque le boutton ajout panier 
            document.querySelector('.enbas[value="'+id+'"]').querySelector('.editionPanier').classList.add("hide");
            document.querySelector('.enbas[value="'+id+'"]').querySelector('.btnPanier').classList.remove("hide");
        }
    }
    AfficherNombrePanier();
    

}

//Charge le panier a partir de la session
function chargerPanier()
{
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            // Traitement des données de session récupérées
            const panierData = JSON.parse(xmlhttp.responseText);
            console.log(panierData);

            // Vous pouvez maintenant utiliser panierData comme nécessaire
            // par exemple, parcourir les éléments du panier
            for (const id in panierData) {
                if (panierData.hasOwnProperty(id)) {
                    const quantite = parseInt(panierData[id], 10);
                    console.log(`Produit avec ID ${id} et quantité ${quantite}`);
                    monPanier[id] = quantite;
                    console.log(monPanier[id]);
                    updateQuantite(id);
                    // Faites ce que vous devez faire avec ces données
                }
            }
        }
    };

    xmlhttp.open("GET", "getSessionPanier.php", true);
    xmlhttp.send();
}

//Affiche le nombre d'album au panier 
function AfficherNombrePanier()
{
    if(Object.keys(monPanier).length == 0)
    {
        document.getElementById("nbPanier").textContent = "";
    }
    else
    {
        document.getElementById("nbPanier").textContent = Object.keys(monPanier).length;
    }
}
// on l'affiche seulement si le js est lancer
document.querySelector('.nav-image').classList.remove("hide");

// Ajout des listener aux bouttons
// Boutton Panier
document.getElementById("monBouton").addEventListener("click", PanierAcheter);

// Boutton Ajouter Au Panier
const btnPanierElements = document.querySelectorAll('.btnPanier');
for(let btnPanier of btnPanierElements)
{
    btnPanier.addEventListener('click',()=> AjouterAuPanier(btnPanier.parentNode.getAttribute("value")));
}

// Boutton Retirer au Panier
const btnEditionPanierElements = document.querySelectorAll('.editionPanier');
for(let EditionDiv of btnEditionPanierElements)
{
    EditionDiv.querySelector(".btnRetirerPanier").addEventListener('click',()=> RetirerAuPanier(EditionDiv.parentNode.getAttribute("value")));
    EditionDiv.querySelector("input").addEventListener('change', (event) => {
        ChangerQuantiterAuPanier(EditionDiv.parentNode.getAttribute("value"), event.target.value);
    });
}

//On récupere les données de la session
chargerPanier();