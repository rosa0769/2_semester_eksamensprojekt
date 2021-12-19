<?php





get_header();

?>

<section id="section" class="content-area">

			
	<template>
		<article class="the_product">
		<h3 class="product_name">Solar panels</h3>
            <img src="" alt="">
            <div>
            <p class="kortbeskrivelse"></p>
            <p class="product_price">122€</p>
			<button class="seMere">Læs mere</button>
            </div>
        </article>
    </template>

		<main id="main" class="site-main">


		<?php

// Start the Loop.
while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/content/content', 'page' );

    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) {
        comments_template();
    }

endwhile; // End the loop.
?>
	
	
	</main><!-- #main -->

	</section><!-- #section -->	

	<section id="overview"></section>
		


<script>

let posts;
      
	  //url til wp restapi - læg mærke til den her kun indhenter data med kategori 6 (numreringen på til efterskolen kategorien)
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

			   clone.querySelector(".navn").textContent = post.product_name;
		   clone.querySelector("img").src = kursus.billede.guid;
		   clone.querySelector(".kortbeskrivelse").textContent = kursus.kort_beskrivelse;
		   clone.querySelector(".pris").textContent = kursus.pris;
		   clone.querySelector(".seMere").addEventListener("click", () => location.href=post.link);

			   destination.appendChild(clone);
		   });
		   
	   }
	  hentData();

</script>

	</section><!-- #section -->


<?php

get_footer();