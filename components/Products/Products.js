class Products{
    constructor() {
        this.classNameActive = 'products-element__btn_active';
        this.labelAdd = 'Добавить в корзину';
        this.labelRemove = 'Удалить из корзины';}
    handleSetLocationStorage(element, id){
        const {pushProduct, products} = localStorageUtil.putProducts(id);
        if(pushProduct){
            element.classList.add(this.classNameActive);
            element.innerHTML = this.labelRemove;
        }else{
            element.classList.remove(this.classNameActive);
            element.innerHTML = this.labelAdd;}
        headerPage.render(products.length);}
    async render(){
        try {
            
            let htmlCatalog = '';
            products.forEach(({id, name, description, price, photo}) =>{
                let activeClass = '';
                let activeText = '';
                if(productsStore.indexOf(id.toString()) === -1){
                    activeText = this.labelAdd;
                }
               else {
                   activeClass = ' '+ this.classNameActive;
                   activeText = this.labelRemove;
               }
                htmlCatalog += `
               <li class="products-element">
                   <span class="products-element__name">${name}</span>
                   <img class="products-element__img" src = "${photo}"/>
                   <span class="products-element__opis">${description}</span>
                   <span class="products-element__price">
                       ✨${price.toLocaleString()} RUB
                   </span>
                   <button class="products-element__btn${activeClass}" onclick="productsPage.handleSetLocationStorage(this, '${id.toString()}');">
                       ${activeText}
                   </button>
                </li>`;
            });
            const html = `
        
               <ul class="products-container">
                   ${htmlCatalog}
               </ul>
           `;
            ROOT_PRODUCTS.innerHTML = html;
        }catch(error){
            console.error(error);
        }
    }
}
const productsPage = new Products();
productsPage.render();