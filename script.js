document.addEventListener("DOMContentLoaded", function() {
    const orderForm = document.getElementById("orderForm");
    const orderList = document.getElementById("orderList");

    // Carregue as ordens de serviço salvas no localStorage, se houver
    const savedOrders = JSON.parse(localStorage.getItem("orders")) || [];
    renderOrders(savedOrders);

    orderForm.addEventListener("submit", function(event) {
        event.preventDefault();

        const customerName = document.getElementById("customerName").value;
        const vehicle = document.getElementById("vehicle").value;
        const description = document.getElementById("description").value;
        const price = document.getElementById("price").value;
        // Crie um objeto para representar a nova ordem de serviço
        const newOrder = {
            customerName,
            vehicle,
            description,
            price,
        };

        // Adicione a nova ordem à lista
        savedOrders.push(newOrder);

        // Atualize o localStorage com a lista atualizada
        localStorage.setItem("orders", JSON.stringify(savedOrders));

        // Atualize a tabela de ordens de serviço
        renderOrders(savedOrders);

        orderForm.reset();
    });

    function renderOrders(orders) {
        // Limpe a tabela antes de recriá-la
        orderList.innerHTML = "";

        // Preencha a tabela com as ordens de serviço
        orders.forEach(function(order) {
            const tableRow = document.createElement("tr");
            tableRow.innerHTML = `
                <td>${order.customerName}</td>
                <td>${order.vehicle}</td>
                <td>${order.description}</td>
                <td>${order.price}</td>
            `;
            orderList.appendChild(tableRow);
        });
    }
});


