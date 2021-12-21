<?php



get_header();
?>

<section id="primary" class="content-area">
<main id="main" class="site-main"> 

 <article class="the_product">
            <div>
            <h2 class="product_name"></h2>
            <p class="product_price"></p>
            <p class="product_description"></p> 
            <img class="product_image" src="" alt="">
            </div>
        </article>
</main>

<script>
        
        let product;
		const dbUrl = "https://rosasahlholt.one/kea/2_semester/10_eksamensprojekt/wordpress/index.php/wp-json/wp/v2/posts"+<?php echo get_the_ID() ?>;
        

        async function getJson() { 
			const data = await fetch(dbUrl);
			product = await data.json();
			showProducts();
		
		}

      //Vis data om produktet 

        function showProducts() {
                document.querySelector(".product_name").textContent = product.product_name;
                document.querySelector(".product_price").textContent = product.product_price;
                document.querySelector(".product_description").textContent = product.product_description;
                document.querySelector(".product_image").src = product.product_image.guid;

            }

	
        getJson();

    </script>

	</section>

<?php

get_footer();



