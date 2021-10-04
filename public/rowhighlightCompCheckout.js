let rows = document.querySelectorAll("tr");
let checkboxes = document.querySelectorAll("#checkbox");

for (let i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked == true) {
        rows[i + 1].style.backgroundColor = "red"
    }
}