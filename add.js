let rows = document.querySelectorAll("tr");
let tBody = document.querySelectorAll("tbody");
let rowAmount = rows.length;

tBody[1].innerHTML = "";
for (let i = 1; i < 10; i++) {
    tBody[1].innerHTML += rows[i].innerHTML;
}
