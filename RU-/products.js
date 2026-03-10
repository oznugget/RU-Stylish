
let uploadedImageUrl = 'images/placeholder.jpg';


//Array to store items
let items =[];


//Load items from local storage,runs when page loads to store prevois items
function loadItems(){
    //get saved items for browsers 
    const saved= localStorage.getItem('market');
    if (saved){
        items = JSON.parse(saved); //if item exists
    }else{
        //else 
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
    // Convert items array to JSON string and store in localStorage
}


loadItems(); //run function when pg loasds




//dipslay all products in the Store Section
function AllProducts(){
    const StoreSection = document.querySelectorAll('.store');


    StoreSection.forEach((section,index) => {

    const oldItems = section.querySelector('.store_items');


    if (oldItems){
        oldItems.remove();
    }
    //create new div for item
    const newContainer = document.createElement('div');
    newContainer.className = 'store_items';

    if ( index===0 ){
        items.forEach(item =>{
            CreateProd(item,newContainer);  // Create each product and add it to the new container
        });
    }else{
        //duplicate sections 
        const OgItems = section.querySelectorAll('.items');

         // Clone each original item and add to new container
        OgItems.forEach(item => {
            newContainer.appendChild(item.cloneNode(true));

        });
    }
    // Clear the entire section content


    
    section.appendChild(newContainer);
});
}




//Create item template and add it

function CreateProd(item, container){
        const itemDiv = document.createElement('div');
        itemDiv.className = 'items';

        //image item
        const picDiv =document.createElement('div');
        picDiv.className = 'picture';

        //link to listing.html
        const link = document.createElement('a');
        link.href = item.link || 'listing.html';
        link.className = 'listing-link';

    //create item
        const img = document.createElement('img');
        img.src = item.image;
        img.alt = item.alt||item.title; 
        img.width = 200;
        img.height = 200;
        img.className = 'store_img';


        link.appendChild(img);
        picDiv.appendChild(link);

        const figcaption = document.createElement('figcaption');
    //Titel
        const ItemTitle = document.createElement('p');
        ItemTitle.textContent = item.title;
    //Price
        const ItemPrice = document.createElement('p');
        ItemPrice.textContent = item.price;

    //item detsails
        const ItemDetails = document.createElement('p');
        ItemDetails.textContent = `Size: ${item.size} | Colour: ${item.colour}`;
        ItemDetails.style.fontSize = '0.9em';
        ItemDetails.style.color ='#666';
   

    //Seller details
        const Seller = document.createElement('p');
        Seller.textContent = item.seller || 'Seller: ...';


        figcaption.appendChild(ItemTitle);
        figcaption.appendChild(ItemPrice);
          figcaption.appendChild(ItemDetails);

        figcaption.appendChild(Seller);
        picDiv.appendChild(figcaption);
        itemDiv.appendChild(picDiv);
        container.appendChild(itemDiv); //add item


}



    const ListingForm = document.querySelector('.listing-form');
    if (ListingForm){
        ListingForm.addEventListener('submit',function(e) {
                e.preventDefault();
            
                
         const title = document.getElementById('title')?.value;
        const price = document.getElementById('price')?.value;
        const size = document.getElementById('size')?.value;
        const colour = document.getElementById('colour')?.value;
        const condition = document.getElementById('condition')?.value;
        const category = document.getElementById('lcategory')?.value;
        

        if (!title || !price){
            alert("Please Enter title and price");
            return;
        }

        const NewItem = {
             image: uploadedImageUrl,
            alt: title,
            title: title,
            price: 'R' + price,
            size: size || 'N/A',
            colour: colour || 'N/A',
            condition: condition || 'new',
            category: category || 'other',
            seller: 'Seller: .....',
            link: 'listing.html'
        }

        items.push(NewItem);
        saveItems();


        AllProducts();

        ListingForm.reset();
        uploadedImageUrl = 'image/placeholder.jpg';
        document.getElementById('imageName').textContent = 'No file chosen';

        const preview = document.querySelector('.image-preview');
        if (preview) preview.remove();

        alert('Item successfylly posted')

    });
}






document.addEventListener('DOMContentLoaded', function(){
    loadItems()
     // Load saved items from localStorage when page starts

    if(document.querySelector('.store')){
        AllProducts(); //dislay all products
    }

    const lastModified = document.getElementById('lastModified');
    if(lastModified){
        // Show when the document was last updated
        lastModified.textContent = 'Last modified: '+document.lastModified;
    }
});

//Handlwe uploading of images
document.getElementById('imageUpload').addEventListener('change', function(e){
    const file = e.target.files[0];
    if (file){
        document.getElementById('imageName').textContent = file.name;
        uploadedImageUrl = URL.createObjectURL(file);


        const PastPrev = document.querySelector('.image-preview');
        if (PastPrev) PastPrev.remove();
          // Create new preview image element
        const prev = document.createElement('img');
        prev.src = uploadedImageUrl;
        prev.width=100;
        prev.className= 'image-preview';
        document.querySelector('.addImageBtn').appendChild(prev);



    }
});


//prevet page from refreshing









