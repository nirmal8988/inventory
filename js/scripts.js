 // Add item
document.getElementById("add-item-form")?.addEventListener("submit", function(e) {
    e.preventDefault();
    const itemName = document.getElementById("item_name").value;
    const stock = document.getElementById("stock").value;
    const supplier = document.getElementById("supplier").value;

    fetch("/api/add_item.php", {
        method: "POST",
        body: JSON.stringify({ item_name: itemName, stock: stock, supplier: supplier }),
        headers: { "Content-Type": "application/json" }
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        window.location.href = "index.html";
    });
});

// Load items
window.onload = function() {
    fetch("/api/get_items.php")
    .then(response => response.json())
    .then(data => {
        const tableBody = document.getElementById("item-data");
        data.forEach(item => {
            tableBody.innerHTML += `
                <tr>
                    <td>${item.item_name}</td>
                    <td>${item.stock}</td>
                    <td>${item.supplier}</td>
                    <td><button onclick="deleteItem(${item.id})">Delete</button></td>
                </tr>`;
        });
    });
};

function deleteItem(id) {
    fetch(`/api/delete_item.php?id=${id}`, { method: "DELETE" })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        window.location.reload();
    });
}

