let monPanier = {};

function PanierAcheter() {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = 'panier.php';

    for (const id in monPanier) {
        if (monPanier.hasOwnProperty(id)) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = id;
            input.value = monPanier[id];
            form.appendChild(input);
        }
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
    updateQuantite(id);
}

function ChangerQuantiterAuPanier(id, valeur)
{
    if(valeur <= 0)
    {
        RetirerAuPanier(id);
        return;
    }
    document.querySelector('.enbas[value="'+id+'"]').querySelector('input').value = valeur;
    monPanier[id] = valeur;
    updateQuantite(id);
}

function updateQuantite(id)
{
    if(monPanier[id])
    {
        document.querySelector('.enbas[value="'+id+'"]').querySelector('.btnPanier').classList.add("hide");
        document.querySelector('.enbas[value="'+id+'"]').querySelector('.editionPanier').classList.remove("hide");
    }
    else
    {
        document.querySelector('.enbas[value="'+id+'"]').querySelector('.editionPanier').classList.add("hide");
        document.querySelector('.enbas[value="'+id+'"]').querySelector('.btnPanier').classList.remove("hide");
    }
    AfficherNombrePanier();
}

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