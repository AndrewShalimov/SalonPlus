<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
// I18N support information here

include_once('g_API.php');

$language = 'en';
putenv("LANG=$language");
setlocale(LC_ALL, $language);

// Set the text domain as 'messages'
$domain = 'messages';
bindtextdomain($domain, "/www/htdocs/site.com/locale");
textdomain($domain);
//echo gettext("A string to be translated would go here");

$categories = getCategories();
?>


<head>
    <title>Salon Plus</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="kharkiv, web store, makeup, maquillage харьков, расходные материалы для салонов красоты, центр обеспечения салонов" />
    <meta name="description" content="харьков, расходные материалы для салонов красоты, центр обеспечения салонов" />
    <link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
    <link rel="stylesheet" type="text/css" href="css/remodal.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link type='text/css' rel='stylesheet' href='css/liquidcarousel.css' />

    <link href="images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">

    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/sp.js"></script>
    <script type="text/javascript" src="js/remodal.js"></script>
    <script type="text/javascript" src="js/jquery.liquidcarousel.min.js"></script>

    <script type="text/javascript">
        var categories = [];
        function Category(id, title) {
            this.id = id;
            this.title = title;
        }
        <?php foreach($categories as $category): ?>
            categories.push(new Category(<?php echo $category -> properties -> sheetId;?>, ''));
        <?php endforeach; ?>
        jQuery(document).ready(function( $ ) {
            //changeContent(categories[0].id);
            applyLanguage();
            getProductsForCategory('<?php echo $categories[0] -> properties -> sheetId; ?>');
            modalInit();
            initSlider();
            //refreshElements();
        });
//        ddsmoothmenu.init({
//            mainmenuid: "templatemo_menu", //menu DIV id
//            orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
//            classname: 'ddsmoothmenu', //class added to menu's outer DIV
//            //customtheme: ["#1c5a80", "#18374a"],
//            contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
//        })
    </script>

    <script language="javascript" type="text/javascript">
        function clearText(field) {
            if (field.defaultValue == field.value) field.value = '';
            else if (field.value == '') field.value = field.defaultValue;
        }
    </script>
</head>


<body id="home">

<div id="templatemo_wrapper">
	<div id="header" class="divRow">
    	<div class="divColumn">
                <a href="#"> <img id="siteLogo" class="siteLogo" src="images/sp_logo.jpg" /></a>
        </div>

        <div id="siteTitle" class="divColumn siteTitle">
        </div>

        <div id="headerRight" class="divColumn contactsDiv">
            <div>
                <p class="contacts">+38(057)781-78-85<br>+38(050)938-28-03</p>
                <p class="contacts" style="font-size: 14px;">
                    <a href="mailto:salon.plus.info@gmail.com">salon.plus.info@gmail.com</a>
                </p>
            </div>
        </div>


    </div> <!-- END of header -->
    
    <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            <li><a href="index.php" class="selected">Home</a></li>
            <li><a href="products.html">Products</a>
                <ul>
                    <li><a href="#">Sub menu 1</a></li>
                    <li><a href="#">Sub menu 2</a></li>
                    <li><a href="#">Sub menu 3</a></li>
              </ul>
            </li>
            <li><a href="about.html">About</a>
                <ul>
                    <li><a href="#">Sub menu 1</a></li>
                    <li><a href="#">Sub menu 2</a></li>
                    <li><a href="#">Sub menu 3</a></li>
                    <li><a href="#">Sub menu 4</a></li>
                    <li><a href="#">Sub menu 5</a></li>
              </ul>
            </li>
            <li><a href="faqs.html">FAQs</a></li>
            <li><a href="checkout.html">Checkout</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
        <br style="clear: left" />
    </div> <!-- end of templatemo_menu -->
    <div id="scrollable" class="liquid">
        <span class="previous"></span>
        <div class="wrapper">
            <ul id="liSliderContent">
            </ul>
        </div>
        <span class="next"></span>
    </div>

    <!--<div id="templatemo_middle">-->
    	<!--<img src="images/templatemo_image_01.png" alt="Image 01" />-->
    	<!--<h1>Introducing Web Store</h1>-->
        <!--<p><a href="http://www.templatemo.com" target="_parent">Web Store</a> is a free css template for your personal or commercial websites. Feel free to download, edit and use this template for any purpose.</p>-->
        <!--<a href="#" class="buy_now">Browse All Products</a>-->
    <!--</div> &lt;!&ndash; END of middle &ndash;&gt;-->
    
    <div id="templatemo_main_top"></div>
    <div id="templatemo_main">

        <div id="sidebar">
        	<h3 id="catTitle">Categories</h3>
            <ul class="sidebar_menu">
                <?php foreach($categories as $category): ?>
                    <li><a id="<?php echo $category -> properties -> sheetId; ?>"
                           class="categoryLink"
                           onclick="javascript:changeContent(<?php echo $category -> properties -> sheetId; ?>)">
                            <?php echo $category -> properties -> title; ?></a>
                    </li>
                <?php endforeach; ?>

			</ul>
            <h3>Newsletter</h3>
            <p>Praesent aliquam mi id tellus pretium pulvinar in vel ligula.</p>
            <div id="newsletter">
                <form action="#" method="get">
                  <input type="text" value="Subscribe" name="email_newsletter" id="email_newsletter" title="email_newsletter" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                  <input type="submit" name="subscribe" value="Subscribe" alt="Subscribe" id="subscribebtn" title="Subscribe" class="subscribebtn"  />
                </form>
                <div class="cleaner"></div>
            </div>
        </div> <!-- END of sidebar -->
        
        <div id="content" classs="mainContent">
<!--        	<div class="col col_14 product_gallery">-->
<!--            	<a href="productdetail.html"><img src="images/product/01.jpg" alt="Product 01" /></a>-->
<!--                <h3>Ut eu feugiat</h3>-->
<!--                <p class="product_price">$ 100</p>-->
<!--                    <a href="shoppingcart.html" class="add_to_cart">Add to Cart</a>-->
<!--            </div>        	-->
        </div> <!-- END of content -->
        <div class="cleaner"></div>
    </div> <!-- END of main -->
    
    <div id="templatemo_footer">
    	<div class="col col_16">
        	<h4>Categories</h4>
            <ul class="footer_menu">
			    <li><a href="#">Aenean et dolor diam</a></li>
                <li><a href="#">Aenean pulvinar</a></li>				
                <li><a href="#">Cras bibendum auctor</a></li>
                <li><a href="#">Donec sodales bibendum</a></li>				
		  </ul>  
        </div>
        <div class="col col_16">
        	<h4>Pages</h4>
            <ul class="footer_menu">
            	<li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Shipping</a></li>
                <li><a href="#">Privacy</a></li>
			</ul>  
        </div>
        <div class="col col_16">
        	<h4>Partners</h4>
            <ul class="footer_menu">
            	<li><a href="http://www.flashmo.com/">Free Flash Templates</a></li>
                <li><a href="http://www.templatemo.com/">Free CSS Templates</a></li>
                <li><a href="http://www.koflash.com/">Website Gallery</a></li>
                <li><a href="http://www.webdesignmo.com/blog/">Web Design Resources</a></li>
			</ul>  
        </div>
        <div class="col col_16">
        	<h4>Social</h4>
            <ul class="footer_menu">
            	<li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Youtube</a></li>
                <li><a href="#">LinkedIn</a></li> 
		  </ul>  
        </div>
        <div class="col col_13 no_margin_right">
        	<h4>About Us</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur semper quam sit amet turpis rhoncus id venenatis tellus sollicitudin. Fusce ullamcorper, dolor non mollis pulvinar, turpis tortor commodo nisl. Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow"><strong>XHTML</strong></a> &amp; <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow"><strong>CSS</strong></a>.</p>
        </div>
        
        <div class="cleaner h40"></div>
		<center>
			Copyright © 2048 Your Company Name | Designed by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
		</center>
    </div> <!-- END of footer -->   
</div>

<div id="modalMain" data-remodal-id="modal" role="dialog">
    <button data-remodal-action="close" class="remodal-close" aria-label="Close">
        <svg class="" viewBox="0 0 24 24">
            <path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z"></path>
            <path d="M0 0h24v24h-24z" fill="none"></path>
        </svg>
    </button>
    <div id="productDetailsTitle" class="productDetailsTitle">Failed rows description</div>
    <div id="modal-content"></div>
</div>


</body>
</html>