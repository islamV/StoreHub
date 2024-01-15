// Use a unique name for the variable, e.g., mainBody
let mainBody = document.querySelector(".body");
let table = new DataTable('#table');
if (!mainBody) {
    console.error("Error: Element with class 'body' not found. Check your HTML.");
} else {
    // Continue with the rest of the code only if 'mainBody' exists

    let sun = document.querySelector(".sun");
    let moon = document.querySelector(".moon");

    // Toggle dark mode
    moon.onclick = function () {
        mainBody.classList.add("dark--mode");
    };

    sun.onclick = function () {
        mainBody.classList.remove("dark--mode");
    };

    // Toggle menu visibility
    let menu = document.querySelector(".menu");
    let sidebar = document.querySelector(".sidebar");
    let mainContainer = document.querySelector(".main--container");

    menu.onclick = function () {
        sidebar.classList.toggle("activemenu");
    };

    mainContainer.onclick = function () {
        sidebar.classList.remove("activemenu");
    };

    // Add click event listeners to sidebar links
    document.addEventListener("DOMContentLoaded", function () {
        var sidebarLinks = document.querySelectorAll('.sidebar--item');

        sidebarLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                // Remove the 'active' class from all links
                sidebarLinks.forEach(function (otherLink) {
                    otherLink.classList.remove('active');
                });

                // Add the 'active' class to the clicked link
                link.classList.add('active');
            });
        });
    });
}

const successPlaceholder = document.getElementById('success');
const failedPlaceholder = document.getElementById('failed');

const successAlert = (message, type) => {
  const wrapper = document.createElement('div');
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible" role="alert">`,
    `   <div>${message}</div>`,
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
    '</div>',
  ].join('');

  successPlaceholder.append(wrapper);
};

const failedAlert = (message, type) => {
  const wrapper = document.createElement('div');
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible" role="alert">`,
    `   <div>${message}</div>`,
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
    '</div>',
  ].join('');

  failedPlaceholder.append(wrapper);
};

// Example asynchronous operation (simulated delay for 2 seconds)
const addProduct = async (product) => {
  try {
    // Simulating an asynchronous operation (e.g., API call)
    await new Promise((resolve) => setTimeout(resolve, 10));
    
    // Assume the operation was successful
    successAlert('Product added successfully!', 'success');
  } catch (error) {
    // If an error occurs during the operation
    failedAlert('Oops, product not added!', 'danger');
  }
};

// Call the addProduct function with a product (simulated scenario)
addProduct({ name: 'Sample Product', price: 19.99 });
