<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<div id="page" class="site">

		<header id="masthead" class="<?php echo is_singular() && twentynineteen_can_show_post_thumbnail() ? 'site-header featured-image' : 'site-header'; ?>">

			<div class="site-branding-container">
				<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
			</div>



            <section id="section" class="content-area">

            <h2 id="headline">All products</h2>

<nav class="filter_section">

<div id="all_products" class="buttonContainer">
    <button id="filterbutton" class="chosen" data-kategori="all_products">All products</button>
</div>

<div id="category1" class="buttonContainer">
    <button id="filterbutton" class="" data-kategori="solar_panels">Solar panels</button>
</div>

<div id="category2" class="buttonContainer">
    <button id="filterbutton" class="" data-kategori="inverters">Inverters</button>
</div>

<div id="category3" class="buttonContainer">
    <button id="filterbutton" class="" data-kategori="storage_solutions">Storage solutions</button>
</div>

<div id="category4" class="buttonContainer">
    <button id="filterbutton" class="" data-kategori="roof_sandwich_panels">Roof sandwich panels</button>
</div>

<div id="category5" class="buttonContainer">
    <button id="filterbutton" class="" data-kategori="mounting_systems">Mounting systems</button>
</div>

</nav>

    <main id="main" class="site-main">
        <section id="overview"></section>
    </main><!-- #main -->
    
    <template>
    <article class="the_product">
    <h3 class="product_name"></h3>
        <img src="" alt="">
        <div>
        <p class="product_description"></p>
        <p class="product_price"></p>
        <button class="seeMore">See more</button>
        </div>
    </article>
</template>

<script>

let posts;
let filter = "all_products";

let newHeadline = document.querySelector("#headline");
  //url til restdb 
  const url = "https://rosasahlholt.one/kea/2_semester/10_eksamensprojekt/wordpress/wp-json/wp/v2/posts";

 //const for destinationen af indholdet og templaten
  const destination = document.querySelector("#overview");
        let template = document.querySelector("template");

  // asynkron function som afventer og indhenter json data fra restdb
  async function fetchData() {
      const jsonData = await fetch(url);
      posts = await jsonData.json();
      showPosts();
  }
  const filterButtons = document.querySelectorAll("#filterbutton");

filterButtons.forEach(button => button.addEventListener("click", filterMenu));



function filterMenu() {

console.log(this.textContent);

//  //sætter filters værdi lig med værdien fra data af den knap der førte ind i funktionen
filter= this.dataset.category;


//ændrer overskriften
newHeadline.textContent = this.textContent + "";


//fjerner og tilføjer valgt class til den rigtige knap
document.querySelector(".chosen").classList.remove("chosen");

this.classList.add("chosen");

//kalder function showPosts efter det nye filter er sat på
showPosts();
}

function showPosts(){
console.log(posts);


destination.textContent = "";
posts.forEach(post => {
if (filter == post.category || filter == "all_products" ) {

const clone = template.cloneNode(true).content;
klon.querySelector(".product_name").textContent = post.product_name;
klon.querySelector(".product_imgage").src = post.product_image;
klon.querySelector(".product_description").textContent = post.product_description;
klon.querySelector(".product_price").textContent = "Price: "+ post.product_price;


destination.appendChild(clone);

}

});
}

fetchData();

</script>

</section>


<?php


get_footer();