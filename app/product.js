const divTag = document.querySelector(".products_grid")
const boxTag = document.querySelector(".box")


fetch('http://rest-edu/api/product/read.php', {
    mode: 'cors',
    headers: {
        'Access-Control-Allow-Origin':'*'
    }
})
    .then(response => response.json())
    .then(res => {
        res['records'].forEach((item)=> {
            const card = document.createElement("div");
            card.className = "products__card"
            const divImg = document.createElement("div");
            divImg.className = "products_img"
            const img = document.createElement("img")
            img.src = item.img
            divImg.appendChild(img)
            card.appendChild(divImg)
            const titleTag = document.createElement("h4");
            titleTag.className = "products__title"
            const titlePrice = document.createElement("h4")
            const btn = document.createElement("a")
            btn.className = "viewProduct"
            btn.innerText = "Посмотреть"
            btn.href = "http://rest-edu/api/product/readOne.php?id=" + item.id
            titlePrice.className = "products__price";
            titlePrice.innerText = "Цена " + item.price
            titleTag.innerText = item.name
            card.appendChild(titleTag)
            card.appendChild(titlePrice)
            card.appendChild(btn)
            divTag.appendChild(card)
        })
    })