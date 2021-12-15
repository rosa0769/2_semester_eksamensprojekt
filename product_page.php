<?php



get_header();
?>

<style>
    
 .product_description {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
    padding-left: 20px;
    
}



.product_name {
    padding-left: 20px;

}

img {
    width: 100%;
    height: 100%; 
    padding-left: 20px;

}


.product_price {
    padding-left: 20px;  
}



    </style>




<section id="primary" class="content-area">
<main id="main" class="site-main"> 

 <article class="post">
            
            <div>
			
                  <h2 class="product_name"></h2>
            <p class="product_price"></p>        
            <img class="product_image" src="" alt="">
            <p class="product_description"></p>
            </div>
        </article>




</main>






<script>
        
        let kursus;
		const dbUrl = "https://rosasahlholt.one/kea/2_semester/10_eksamensprojekt/wordpress/wp-json/wp/v2/posts/"+<?php echo get_the_ID() ?>;
        

        async function getJson() { 
			const data = await fetch(dbUrl);
			post = await data.json();
			showPosts();
		
		}

      //Vis data om produkt 

        function showPosts() {
                document.querySelector("h2").textContent = post.product_name;
                document.querySelector(".product_price").textContent = post.product_price;
                document.querySelector(".billede").src = kursus.billede.guid;
            }

			// document.querySelector(".luk").addEventListener("click", () => {
				
			// 	history.back();
		
    

        getJson();

    </script>

	</section>

<?php

get_footer();



