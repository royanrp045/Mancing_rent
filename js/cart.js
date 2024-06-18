function decreaseQuantity(button) {
  const quantityElement = button.nextElementSibling;
  let quantity = parseInt(quantityElement.textContent);
  if (quantity > 0) {
    quantity--;
    quantityElement.textContent = quantity;
    updateSummary();
  }
}

function increaseQuantity(button) {
  const quantityElement = button.previousElementSibling;
  let quantity = parseInt(quantityElement.textContent);
  quantity++;
  quantityElement.textContent = quantity;
  updateSummary();
}

function removeItem(button) {
  const itemElement = button.closest(".cart-item");
  itemElement.remove();
  updateSummary();
}

function updateSummary() {
  const items = document.querySelectorAll(".cart-item");
  const itemCount = items.length;
  document.getElementById("item-count").textContent = itemCount;

  let totalPrice = 0;
  items.forEach((item) => {
    const quantity = parseInt(item.querySelector(".quantity span").textContent);
    const price = parseInt(item.querySelector("span:nth-child(4)").textContent);
    totalPrice += quantity * price;
  });

  const shippingCost = parseInt(document.getElementById("shipping-cost").value);
  totalPrice += shippingCost;

  document.getElementById("total-price").textContent = totalPrice;
}

document
  .getElementById("shipping-cost")
  .addEventListener("change", updateSummary);
