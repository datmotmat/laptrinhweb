//----------------------------------- Menu-slidebar-category -----------------------------------
function toggleMenu() {
    var menu = document.getElementById("category-left-menu-li");
    if (menu.style.maxHeight) {
        menu.style.maxHeight = null;
    } else {
        menu.style.maxHeight = menu.scrollHeight + "px";
    }
}

//----------------------------------- PRODUCT-QUANTITY-----------------------------------
document.getElementById("decrease").addEventListener("click", function () {
    let quantityInput = document.getElementById("quantity");
    let currentValue = parseInt(quantityInput.value) || 0;
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
    }
});

document.getElementById("increase").addEventListener("click", function () {
    let quantityInput = document.getElementById("quantity");
    let currentValue = parseInt(quantityInput.value) || 0;
    quantityInput.value = currentValue + 1;
});

//----------------------------------- PRODUCT-----------------------------------
const bigIMG = document.querySelector(".product-content-left-big-img img");
const smallIMG = document.querySelectorAll(".product-content-left-small-img img");
smallIMG.forEach(function (imgItem, X) {
    imgItem.addEventListener("click", function () {
        bigIMG.src = imgItem.src;
    });
});

const chitiet = document.querySelector(".chitiet");
const motasanpham = document.querySelector(".motasanpham");
if (chitiet) {
    chitiet.addEventListener("click", function () {
        chitiet.classList.add("selected");
        motasanpham.classList.remove("selected");
        document.querySelector(".product-content-right-detail-bottom-content-motasanpham").style.display = "none";
        document.querySelector(".product-content-right-detail-bottom-content-chitiet").style.display = "block";
    });
}
if (motasanpham) {
    motasanpham.addEventListener("click", function () {
        motasanpham.classList.add("selected");
        chitiet.classList.remove("selected");
        document.querySelector(".product-content-right-detail-bottom-content-chitiet").style.display = "none";
        document.querySelector(".product-content-right-detail-bottom-content-motasanpham").style.display = "block";
    });
}
const button = document.querySelector(".product-content-right-detail-top");
if (button) {
    button.addEventListener("click", function () {
        var bottomContent = document.getElementById("bottom-content");
        if (bottomContent.style.maxHeight) {
            bottomContent.style.maxHeight = null;
        } else {
            console.log(bottomContent);
            bottomContent.style.maxHeight = 300 + "px";
        }
    });
}
