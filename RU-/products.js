
let uploadedImageUrl = 'images/placeholder.jpg';



let items =[];

function loadItems(){

    const saved= localStorage.getItem('market');
    if (saved){
        items = JSON.parse(saved);
    }else{
 items =[{
    image: 'images/loafers.jpg',
    alt: 'Loafers',
    title: 'Loafers',
    price: 'R300',

    size: '42',
    colour: 'Red',
    category: 'shoes',
    seller: 'Seller: John',
     link:'#'
}];

}
}




function saveItems() {
    localStorage.setItem('market',JSON.stringify(items));
}


loadItems();



function AllProducts(){
    const StoreSection = document.querySelectorAll('.store');


    StoreSection.forEach((section,index) => {

    const heading = section.querySelector('h2');
    const oldItems = section.querySelector('.store_items');


    if (oldItems){
        oldItems.remove();
    }

    const newContainer = document.createElement('div');
    newContainer.className = 'store_items';

    if ( index===0 ){
        items.forEach(item =>{
            CreateProd(item,newContainer);
        });
    }else{
        const OgItems = section.querySelectorAll('.items');
        OgItems.forEach(item => {
            newContainer.appendChild(item.cloneNode(true));

        });
    }

    section.innerHTML='';
    section.appendChild(heading);
    section.appendChild(newContainer);
});
}






function CreateProd(item, container){
        const itemDiv = document.createElement('div');
        itemDiv.className = 'items';

        const picDiv =document.createElement('div');
        picDiv.className = 'picture';

        const link = document.createElement('a');
        link.href = item.link || 'listing.html';
        link.className = 'listing-link';


        const img = document.createElement('img');
        img.src = item.image;
        img.alt = item.alt||item.title;
        img.width = 200;
        img.height = 200;
        img.className = 'store_img';


        link.appendChild(img);
        picDiv.appendChild(link);

        const figcaption = document.createElement('figcaption');

        const ItemTitle = document.createElement('p');
        ItemTitle.textContent = item.title;

        const ItemPrice = document.createElement('p');
        ItemPrice.textContent = item.price;


        const ItemDetails = document.createElement('p');
        ItemDetails.textContent = `Size: ${item.size} | Colour: ${item.colour}`;
        ItemDetails.style.fontSize = '0.9em';
        ItemDetails.style.color ='#666';
   


        const Seller = document.createElement('p');
        Seller.textContent = item.seller || 'Seller: ...';


        figcaption.appendChild(ItemTitle);
        figcaption.appendChild(ItemPrice);
          figcaption.appendChild(ItemDetails);

        figcaption.appendChild(Seller);
        picDiv.appendChild(figcaption);
        itemDiv.appendChild(picDiv);
        container.appendChild(itemDiv);


}






document.querySelector('.listing-form').addEventListener('submit', function(e){
    e.preventDefault();


    const title = document.getElementById('title')?.value;
    const price = document.getElementById('price')?.value;
    const size = document.getElementById('size')?.value;
    const colour = document.getElementById('colour')?.value;
    const condition = document.getElementById('condition')?.value;
    const category = document.getElementById('lcategory')?.value;



    if(!title|| !price){
        alert('Please enter title and price');
        return;

    }


    const NewItem = {
        image: uploadedImageUrl,
        alt: title,
        title: title,
        price: 'R' + price,

        size: size ||'N/A',
        colour: colour || 'N/A',
        condition: condition || 'new',
        category: category|| 'other',
        seller: `Seller: .....`,
        link: 'listing.html'

    };

    items.push(NewItem);
    saveItems();
    console.log('Item added:', NewItem);
    console.log('Total items:', items.length);
    alert('Item successfuly posted');


    if(document.querySelector('.store')){
    AllProducts();
    }

    this.reset();
     uploadedImageUrl = 'images/placeholder.jpg';
    document.getElementById('imageName').textContent = 'No file chosen'

     const preview = document.querySelector('.image-preview');
    if (preview) preview.remove();

});




document.addEventListener('DOMContentLoaded', function(){
    loadItems()
    if(document.querySelector('.store')){
        AllProducts();
    }

    const lastModified = document.getElementById('lastModified');
    if(lastModified){
        lastModified.textContent = 'Last modified: '+document.lastModified;
    }
});


document.getElementById('imageUpload').addEventListener('change', function(e){
    const file = e.target.files[0];
    if (file){
        document.getElementById('imageName').textContent = file.name;
        uploadedImageUrl = URL.createObjectURL(file);


        const PastPrev = document.querySelector('.image-preview');
        if (PastPrev) PastPrev.remove();

        const prev = document.createElement('img');
        prev.src = uploadedImageUrl;
        prev.width=100;
        prev.className= 'image-preview';
        document.querySelector('.addImageBtn').appendChild(prev);



    }
});







/*
document.querySelector('.postBtn button').addEventListener('click', function(e){
    e.preventDefault();

    document.querySelector('.listing-form').dispatchEvent(new Event('submit'));
    
});*/







