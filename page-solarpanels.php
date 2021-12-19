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

    get_template_part( 'template-parts/content/content', 'content-page' );


endwhile; // End the loop.
?>
	
	
	</main>

	</section>

	<section id="overview"></section>
		


<script>

let posts;
      
	  //url til wp restapi - læg mærke til den her kun indhenter data med kategori 1 (nummereringen til solar panels kategorien)
	  const url = "https://rosasahlholt.one/kea/2_semester/10_eksamensprojekt/wordpress/wp-json/wp/v2/posts/category=1";
	 
 
	  const destination = document.querySelector("#overview");
    let template = document.querySelector("template"); 

	  // asynkron function som afventer og indhenter json data fra restdb
	  async function fetchData() {
		  const jsonData = await fetch(url);
		  posts = await jsonData.json();
		  showPosts();
	  }

	  function showPosts() {
            //const for destination af indhold og template

		 
			posts.forEach(post => {
               
        
			   const clone = template.cloneNode(true).content;

			        clone.querySelector(".product_name").textContent = post.product_name;
		            clone.querySelector("product_image").src = post.product_image;
		            clone.querySelector(".product_description").textContent = post.product_description;
		            clone.querySelector(".product_price").textContent = post.product_price;

			        destination.appendChild(clone);
		   });
		   
	   }
	  hentData();

</script>

	</section>


<?php

get_footer();