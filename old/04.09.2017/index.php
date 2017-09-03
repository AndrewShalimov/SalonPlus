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
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link href="images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
<!--    <script type="text/javascript" src="js/jquery.min.js"></script>-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/ddsmoothmenu.js">
         /***********************************************
        * Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
        * This notice MUST stay intact for legal use
        * Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
        ***********************************************/
    </script>

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
            initSlider();
            getProductsForCategory('<?php echo $categories[0] -> properties -> sheetId; ?>');
            //refreshElements();
        });
        ddsmoothmenu.init({
            mainmenuid: "templatemo_menu", //menu DIV id
            orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
            classname: 'ddsmoothmenu', //class added to menu's outer DIV
            //customtheme: ["#1c5a80", "#18374a"],
            contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
        })
    </script>
    <script language="javascript" type="text/javascript" src="js/mootools-1.2.1-core.js"></script>
    <script language="javascript" type="text/javascript" src="js/mootools-1.2-more.js"></script>
    <script language="javascript" type="text/javascript" src="js/slideitmoo-1.1.js"></script>
    <script language="javascript" type="text/javascript" src="js/sp.js"></script>
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
    
    <!--<div id="templatemo_middle">-->
    	<!--<img src="images/templatemo_image_01.png" alt="Image 01" />-->
    	<!--<h1>Introducing Web Store</h1>-->
        <!--<p><a href="http://www.templatemo.com" target="_parent">Web Store</a> is a free css template for your personal or commercial websites. Feel free to download, edit and use this template for any purpose.</p>-->
        <!--<a href="#" class="buy_now">Browse All Products</a>-->
    <!--</div> &lt;!&ndash; END of middle &ndash;&gt;-->
    
    <div id="templatemo_main_top"></div>
    <div id="templatemo_main">
    	<div id="product_slider">
    		<div id="SlideItMoo_outer">	
                <div id="SlideItMoo_inner">			
                    <div id="SlideItMoo_items">
<!--                        <div class="SlideItMoo_element">-->
<!--                                <a href="http://www.templatemo.com/page/1" target="_parent">-->
<!--                                <img src="images/gallery/01.jpg" alt="product 1" /></a>-->
<!--                        </div>	-->
                    </div>
                </div>
            </div>
            <div class="cleaner"></div>
        </div>
        
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
<!---->
<!--			    <li><a id="hairdresser" class="categoryLink" onclick="javascript:changeContent(categories[0].id)">Aenean et dolor diam</a></li>-->
<!--                <li><a id="napkinsTowels" class="categoryLink" onclick="javascript:changeContent(categories[1].id)">Aenean pulvinar</a></li>-->
<!--            	<li><a class="categoryLink" onclick="javascript:changeContent(categories[2].id)">Etiam in tellus</a></li>-->
<!--                <li><a class="categoryLink" onclick="javascript:changeContent(categories[3].id)">Hendrerit justo</a></li>-->
<!--                <li><a class="categoryLink" onclick="javascript:changeContent(categories[4].id)">Integer interdum</a></li>-->
<!--                <li><a class="categoryLink" onclick="javascript:changeContent(categories[5].id)">Maecenas a diam</a></li>-->
<!--				<li><a class="categoryLink" onclick="javascript:changeContent(categories[6].id)">Nullam in semper</a></li>-->
<!--				<li><a class="categoryLink" onclick="javascript:changeContent(categories[7].id)">Posuere in commodo</a></li>-->
<!--				<li><a class="categoryLink" onclick="javascript:changeContent(categories[8].id)">Tincidunt leo</a></li>-->
<!--                <li><a class="categoryLink" onclick="javascript:changeContent(categories[9].id)">Vestibulum blandit</a></li>-->
<!--                <li><a class="categoryLink" onclick="javascript:changeContent(categories[10].id)">Vestibulum blandit</a></li>-->
<!--                <li><a class="categoryLink" onclick="javascript:changeContent(categories[11].id)">Vestibulum blandit</a></li>-->
<!--                <li><a class="categoryLink" onclick="javascript:changeContent(categories[12].id)">Vestibulum blandit</a></li>-->
<!--                <li><a class="categoryLink" onclick="javascript:changeContent(categories[13].id)">Vestibulum blandit</a></li>-->
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

</body>
</html>