// p1.js - Updated Functions with + and - Button
let cart = [];
let totalAmount = 0;

function addToCart(itemName, itemPrice) {
    let existingItem = cart.find(item => item.name === itemName);
    if (existingItem) {
        existingItem.quantity++;
    } else {
        cart.push({ name: itemName, price: itemPrice, quantity: 1 });
    }
    totalAmount += itemPrice;
    updateCart();
}

function updateCart() {
    const cartItemsDiv = document.getElementById('cart-items');
    cartItemsDiv.innerHTML = ''; // Clear existing items

    cart.forEach((item, index) => {
        const itemDiv = document.createElement('div');
        itemDiv.innerHTML = `
            ${item.name} - ${item.price} Rs (x${item.quantity})
            <button onclick="increaseQuantity(${index})">+</button>
            <button onclick="decreaseQuantity(${index})">-</button>
        `;
        cartItemsDiv.appendChild(itemDiv);
    });

    document.getElementById('total').textContent = `Total: ${totalAmount} Rs`;
}

function increaseQuantity(index) {
    cart[index].quantity++;
    totalAmount += cart[index].price;
    updateCart();
}

function decreaseQuantity(index) {
    if (cart[index].quantity > 1) {
        cart[index].quantity--;
        totalAmount -= cart[index].price;
    } else {
        totalAmount -= cart[index].price;
        cart.splice(index, 1);
    }
    updateCart();
}

// p1.js - Buy Now and Transaction History Logic
let transactionHistory = [];

// Modified buyNow function to save transactions in the database
function buyNow() {
    if (cart.length === 0) {
        alert("Your cart is empty!");
        return;
    }

    const orderId = Math.floor(Math.random() * 100000);
    const orderDetails = {
        orderId: orderId,
        items: [...cart],
        total: totalAmount
    };
    transactionHistory.push(orderDetails);

    // Send transaction data to the server
    fetch('p1.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'insertTransaction', orderDetails })
    }).then(response => response.json())
      .then(data => console.log('Transaction saved:', data))
      .catch(error => console.error('Error:', error));

    // Clear cart after transaction
    cart = [];
    totalAmount = 0;
    updateCart();
    displayTransactionHistory();
}

function displayTransactionHistory() {
    const historyDiv = document.getElementById('transaction-history');
    historyDiv.innerHTML = '<h3>Transaction History</h3>';

    transactionHistory.forEach(order => {
        const orderDiv = document.createElement('div');
        orderDiv.innerHTML = `
            <p>Order ID: ${order.orderId}</p>
            <p>Items: ${order.items.map(item => item.name).join(', ')}</p>
            <p>Total: ${order.total} Rs</p>
            <hr>
        `;
        historyDiv.appendChild(orderDiv);
    });
}

// Function to send cart items to the database
function sendCartToDatabase() {
    fetch('p1.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'insertCart', cart })
    }).then(response => response.json())
      .then(data => console.log('Cart saved:', data))
      .catch(error => console.error('Error:', error));
}