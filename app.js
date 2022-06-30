const name = document.querySelector("#fname");
const button = document.querySelector("#button")
console.log(button)
eventListener();


function eventListener() {
    button.addEventListener("click",addBagis)
    //  document.addEventListener("DOMContentLoaded",loadAllProjetsToUI);
}


function addBagis(e) {
    console.log("çalıştı")
    const newBagis = name.value

    addProjectToUI(newBagis); // Değeri arayüze gönderme
        addProjectToStorage(newBagis); // Değeri storage'a gönderme
        showAlert("success","Proje başarıyla eklendi...");
        setTimeout(() => {
            popup.style.display = "none";
        }, 1000); 
    
    e.preventDefault();


}

function getBagisFromStorage() { // Storage'dan tüm projeleri alma
    let bagiss;

    if (localStorage.getItem("bagiss") === null) {
        bagiss = [];
    }
    else {
        bagiss = JSON.parse(localStorage.getItem("bagiss"));
    }

    return bagiss;
}

function addBagisToStorage(newBagis) {
    let bagiss = getProjetsFromStorage();

    bagiss.push(newBagis);

    localStorage.setItem("projets",JSON.stringify(bagiss));

}

