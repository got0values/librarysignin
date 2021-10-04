let rows = document.querySelectorAll("tr");

for (let i = 1; i < rows.length; i++) {
    rows[i].innerHTML += 
    `<button onClick="changeColor(rows[${i}])">
        color${i}
    </button>`
}

function changeColor (rowSelect) {
    if (rowSelect.style.backgroundColor === "") {
        rowSelect.style.backgroundColor = "red"
    }
    else {
        rowSelect.style.backgroundColor = ""
    }
}