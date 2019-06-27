var AffGrp = document.getElementById('afficherGroupe');
AffGrp.addEventListener('click', afficherGroupe);


// Utilisation de l'Ajax pour appeler l'API et récuperer les enregistrements
var contenu = document.getElementById("contenu");
var enregs; // contient la reponse de l'API
// on définit une requete
function afficherTache() {

    const req = new XMLHttpRequest();
    //on vérifie les changements d'états de la requête
    req.onreadystatechange = function(event) {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                // la requete a abouti et a fournit une reponse
                //on décode la réponse, pour obtenir un objet
                reponse = JSON.parse(this.responseText);
                enregs = reponse.records;
                for (let i = 0; i < enregs.length; i++) {
                    // on crée la ligne et les div internes

                    category = document.createElement("div");
                    category.setAttribute("class", "category");
                    category.id = i;

                    date = document.createElement("div");
                    date.setAttribute("class", "date");
                    category.appendChild(date);

                    libelle = document.createElement("div");
                    libelle.setAttribute("class", "libelle");
                    category.appendChild("libelle");

                    category = document.createElement("div");
                    category.setAttribute("class", "category");
                    categorye.appendChild(category);

                    //on met à jour le contenu
                    date.innerHTML = enregs[i].date;
                    category.innerHTML = enregs[i].categorydescription;
                    libelle.innerHTML = enregs[i].description;
                    comment.innerHTML = enregs[i].description;
                    // on ajoute un evenement sur ligne pour afficher le detail

                }
                console.log(response)
                console.log("Réponse reçue: %s", this.responseText);
            } else {
                console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
            }
        }
    };




    //on envoi la requête
    req.open('GET', ' http://monserveur/AgendaFinal/PHP/View/testajax.php?functio=affichertache', true);
    req.send(null);

}


function afficherGroupe() {
    var contenu = document.getElementById("contenu");
    var enregs; // contient la reponse de l'API
    // on définit une requete
    const req = new XMLHttpRequest();
    //on vérifie les changements d'états de la requête
    req.onreadystatechange = function(event) {
            if (this.readyState === XMLHttpRequest.DONE) {
                if (this.status === 200) {
                    // la requete a abouti et a fournit une reponse
                    //on décode la réponse, pour obtenir un objet
                    reponse = JSON.parse(this.responseText);
                    enregs = reponse.records;
                    for (let i = 0; i < enregs.length; i++) {
                        // on crée la ligne et les div internes

                        groupelist = document.createElement("div");
                        groupelist.setAttribute("class", "groupelist");
                        groupelist.id = i;


                        //on met à jour le contenu
                        groupe.innerHTML = enregs[i].groupe;

                        // on ajoute un evenement sur ligne pour afficher le detail

                    }
                    console.log(response)
                    console.log("Réponse reçue: %s", this.responseText);
                } else {
                    console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
                }
            }
        }
        //on envoi la requête
    req.open('GET', ' http://monserveur/AgendaFinal/PHP/View/testajax.php?function=afficherGroupe', true);
    req.send(null);
}

// Utilisation de l'Ajax pour appeler l'API et récuperer les enregistrements









/*// Utilisation de l'Ajax pour appeler l'API et récuperer les enregistrements
var contenu = document.getElementById("contenu");
var enregs; // contient la reponse de l'API
// on définit une requete
const req = new XMLHttpRequest();
//on vérifie les changements d'états de la requête
req.onreadystatechange = function(event) {
    if (this.readyState === XMLHttpRequest.DONE) {
        if (this.status === 200) {
            // la requete a abouti et a fournit une reponse
            //on décode la réponse, pour obtenir un objet
            reponse = JSON.parse(this.responseText);
            enregs = reponse.records;
            for (let i = 0; i < enregs.length; i++) {
                // on crée la ligne et les div internes

                category = document.createElement("div");
                category.setAttribute("class", "category");
                category.id = i;



                libelle = document.createElement("div");
                libelle.setAttribute("class", "libelle");
                category.appendChild("libelle");

                description = document.createElement("div");
                description.setAttribute("class", "category");
                category.appendChild(description);

                //on met à jour le contenu
                date.innerHTML = enregs[i].date;
                category.innerHTML = enregs[i].categorydescription;
                libelle.innerHTML = enregs[i].description;
                comment.innerHTML = enregs[i].description;
                // on ajoute un evenement sur ligne pour afficher le detail

            }
            console.log(response)
            console.log("Réponse reçue: %s", this.responseText);
        } else {
            console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
        }
    }
}

//on envoi la requête
req.open('GET', ' http://monserveur/AgendaFinal/PHP/View/testajax.php?functio=affichercategory', true);
req.send(null);
}*/