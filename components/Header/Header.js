class Header{
  handleOPenShoppingPage(){
          shoppingPage.render();
      }

   render(count){
     const html = `
            <div class="header-container">
            <div class="logo">
            <a>TR</a>
</div>
            <nav class="container-menu">
            <ul>
            <li><a  href="http://localhost/components/Account/welcomee.php">ACCOUNT</a></li>
            <li><a href="index.php">MAIN</a></li>
            <li><a href="podborkamn.html">STONE SELECTION</a></li>
            <li><a href="autor.html">AUTHOR</a></li>
</ul>
            </nav>
            <div class ="header-counter" onclick="headerPage.handleOPenShoppingPage();">
             ❤ ${count}️
</div>
            </div>
        `;
        ROOT_HEADER.innerHTML = html;
    }

}


const headerPage= new Header();
const productsStore = localStorageUtil.getProducts();
headerPage.render(productsStore.length);
