var AffGrp = document.getElementById('afficherGroupe');
if (AffGrp) AffGrp.addEventListener('click', afficherLesGroupes);
var listGroup = document.getElementById('listGroup');


function afficherLesGroupes() {

    //var enregs; // contient la reponse de l'API
    // on définit une requete
    const req = new XMLHttpRequest();
    //on vérifie les changements d'états de la requête
    req.onreadystatechange = function(event) {
            if (this.readyState === XMLHttpRequest.DONE) {
                if (this.status === 200) {
                    // la requete a abouti et a fournit une reponse
                    //on décode la réponse, pour obtenir un objet
                    reponse = JSON.parse(this.responseText);

                    for (let i = 0; i < reponse.length; i++) {
                        // on crée la ligne et les div internes

                        groupelist = document.createElement("div");
                        groupelist.setAttribute("class", "groupelist");
                        groupelist.id = i;
                        btn = document.createElement("button");
                        btn.innerHTML = "Cliquer ici pour voir les personnes associé a ce groupe";
                        btn.addEventListener('click', afficherLesUtilisateurs);
                        // btn.removeEventListener('click', afficherLesUtilisateurs);



                        //on met à jour le contenu
                        groupelist.innerHTML = reponse[i].description;
                        groupelist.appendChild(btn);
                        listGroup.appendChild(groupelist);
                        // on ajoute un evenement sur ligne pour afficher le detail

                    }
                    console.log(reponse)
                    console.log("Réponse reçue: %s", this.responseText);
                } else {
                    console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
                }
            }
        }
        //on envoi la requête
    req.open('GET', ' http://monserveur/AgendaFinal/PHP/View/testajax.php?function=afficherGroupe', true);
    req.send(null);
    AffGrp.removeEventListener('click', afficherLesGroupes);
}

var afftaches = document.getElementById('afficherLesTaches');
if (afftaches) afftaches.addEventListener('click', afficherLesTaches);
console.log(afftaches)
var listtaches = document.getElementById('listtaches');
console.log(AffCat);

function afficherLesTaches() {
    var listGroup = document.getElementById('listGroup');
    //var enregs; // contient la reponse de l'API
    // on définit une requete
    const req = new XMLHttpRequest();
    //on vérifie les changements d'états de la requête
    req.onreadystatechange = function(event) {
            if (this.readyState === XMLHttpRequest.DONE) {
                if (this.status === 200) {
                    // la requete a abouti et a fournit une reponse
                    //on décode la réponse, pour obtenir un objet
                    reponse = JSON.parse(this.responseText);

                    for (let i = 0; i < reponse.length; i++) {
                        // on crée la ligne et les div internes

                        listtaches = document.createElement("div");
                        listtaches.setAttribute("class", "task");
                        listtaches.id = i;


                        //on met à jour le contenu
                        listtaches.innerHTML += reponse[i].comment + " - ";
                        listtaches.innerHTML += reponse[i].idgroup + " - ";
                        listtaches.innerHTML += reponse[i].date + " - ";
                        document.getElementById('listGroup').appendChild(listtaches)
                            // on ajoute un evenement sur ligne pour afficher le detail

                    }
                    console.log(reponse)
                    console.log("Réponse reçue: %s", this.responseText);
                } else {
                    console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
                }
            }
        }
        //on envoi la requête
    req.open('GET', ' http://monserveur/AgendaFinal/PHP/View/testajax.php?function=afficherLesTaches', true);
    req.send(null);
    afftaches.removeEventListener('click', afficherLesTaches);
}
var AffUtilisateur = document.getElementById('afficherutilisateurs');
if (AffUtilisateur) AffUtilisateur.addEventListener('click', afficherLesUtilisateurs);
console.log(AffUtilisateur)
listcategorie = document.getElementById('listUtilisateurs');


function afficherLesUtilisateurs() {

    //var enregs; // contient la reponse de l'API
    // on définit une requete
    const req = new XMLHttpRequest();
    //on vérifie les changements d'états de la requête
    req.onreadystatechange = function(event) {
            if (this.readyState === XMLHttpRequest.DONE) {
                if (this.status === 200) {
                    // la requete a abouti et a fournit une reponse
                    //on décode la réponse, pour obtenir un objet
                    reponse = JSON.parse(this.responseText);

                    for (let i = 0; i < reponse.length; i++) {
                        // on crée la ligne et les div internes

                        utilisateurslist = document.createElement("div");
                        utilisateurslist.setAttribute("class", "utilisateurs");
                        utilisateurslist.id = i;


                        //on met à jour le contenu
                        utilisateurslist.innerHTML += "Id : " + reponse[i].iduser;
                        utilisateurslist.innerHTML += " Nom : " + reponse[i].name;
                        utilisateurslist.innerHTML += " Prénom :" + reponse[i].firstname;
                        utilisateurslist.innerHTML += " Niveau :  " + reponse[i].level;
                        document.getElementById('listGroup').appendChild(utilisateurslist);
                        // on ajoute un evenement sur ligne pour afficher le detail


                    }
                    console.log(reponse)
                    console.log("Réponse reçue: %s", this.responseText);
                } else {
                    console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
                }

            }
        }
        //on envoi la requête
    req.open('GET', 'http://monserveur/AgendaFinal/PHP/View/testajax.php?function=afficherLesUtilisateurs', true);
    req.send(null);
    AffUtilisateur.removeEventListener('click', afficherLesUtilisateurs);

}
var AffCat = document.getElementById('affichercategories');
if (AffCat) AffCat.addEventListener('click', afficherLesCategories);
var listcategorie = document.getElementById('listCategory');


function afficherLesCategories() {
    var listGroup = document.getElementById('listGroup');
    //var enregs; // contient la reponse de l'API
    // on définit une requete
    const req = new XMLHttpRequest();
    //on vérifie les changements d'états de la requête
    req.onreadystatechange = function(event) {
            if (this.readyState === XMLHttpRequest.DONE) {
                if (this.status === 200) {
                    // la requete a abouti et a fournit une reponse
                    //on décode la réponse, pour obtenir un objet
                    reponse = JSON.parse(this.responseText);

                    for (let i = 0; i < reponse.length; i++) {
                        // on crée la ligne et les div internes

                        categorieslist = document.createElement("div");
                        categorieslist.setAttribute("class", "categories");
                        categorieslist.id = i;


                        //on met à jour le contenu
                        categorieslist.innerHTML += reponse[i].description;
                        document.getElementById('listGroup').appendChild(categorieslist)
                            // on ajoute un evenement sur ligne pour afficher le detail


                    }
                    console.log(reponse)
                    console.log("Réponse reçue: %s", this.responseText);
                } else {
                    console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
                }
            }
        }
        //on envoi la requête
    req.open('GET', ' http://monserveur/AgendaFinal/PHP/View/testajax.php?function=afficherLesCategories', true);
    req.send(null);
    AffCat.removeEventListener('click', afficherLesCategories);

}