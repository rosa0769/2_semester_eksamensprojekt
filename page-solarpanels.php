<?php
get_header();
?>

<section id="section" class="content-area">

			
	<template>
		<article class="the_product">
		<h3 class="product_name">Solar panels</h3>
            <img src="" alt="">
            <div>
            <p class="product_description"></p>
            <p class="product_price">122€</p>
            </div>
        </article>
    </template>

		<main id="main" class="site-main">


		<?php

// Start the Loop.
while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/content/content', 'page' );


endwhile; // End the loop.
?>
	
	
	</main>

	</section>

	<section id="overview"></section>
		


<script>

let products;
      
	  //url til wp restapi - læg mærke til den her kun indhenter data med kategori 1 (nummereringen til solar panels kategorien)
	  const url = "https://rosasahlholt.one/kea/2_semester/10_eksamensprojekt/wordpress/index.php/wp-json/wp/v2/product?per_page=20&categories=30";
	 
 
	  const destination = document.querySelector("#overview");
    let template = document.querySelector("template"); 

	  // asynkron function som afventer og indhenter json data fra restdb
	  async function fetchData() {
		  const jsonData = await fetch(url);
		  products = await jsonData.json();
		  showProducts();
	  }

	  function showProducts() {
            //const for destination af indhold og template

		 
			products.forEach(product => {
               
        
			   const clone = template.cloneNode(true).content;

			        clone.querySelector(".product_name").textContent = product.product_name;
		            clone.querySelector("product_image").src = product.product_image;
		            clone.querySelector(".product_description").textContent = product.product_description;
		            clone.querySelector(".product_price").textContent = product.product_price;

			        destination.appendChild(clone);
		   });
		   
	   }
	  fetchData();

</script>

	</section>


<?php

get_footer();