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

 <article class="kurset">
            
            <div>
			
            <div class="infoboks"> 
                  <h2 class="navn"></h2>
            <p class="kortbeskrivelse"></p>
            <p class="langbeskrivelse"></p>
 
			
            <p class="pris"></p>
            <p class="laengde"></p>
            <p class="antal_deltagere"></p>
            <p class="klassetrin"></p> 
        
        </div>
            <img class="billede" src="" alt="">
            <h3 class="underoverskrift1"></h3>
            <p class="yderligereinfo_1"></p>
            <h4 class="underoverskrift2"></h4>
            <p class="yderligereinfo_2"></p>
            </div>
        </article>




</main>






<script>
        
        let kursus;
		const dbUrl = "https://rosasahlholt.one/kea/2_semester/10_eksamensprojekt/wordpress/wp-json/wp/v2/post/"+<?php echo get_the_ID() ?>;
        

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



