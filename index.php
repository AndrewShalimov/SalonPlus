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
        $(document).ready(function( $ ) {
            //changeContent(categories[0].id);
            applyLanguage();
            getProductsForCategory('<?php echo $categories[0] -> properties -> sheetId; ?>');
            modalInit();
            initSlider();
            refreshElements();
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
                <a href=""> <img id="siteLogo" class="siteLogo" src="images/sp_logo.jpg" /></a>
        </div>

        <div id="siteTitle" class="divColumn siteTitle">
        </div>

        <div id="headerRight" class="divColumn contactsDiv">
            <div>
                <div class="contacts">+38(050)938-28-03<br>+38(098)509-36-96</div>
                <p class="contacts" style="font-size: 14px;">
                    <a href="mailto:salon.plus.info@gmail.com">salon.plus.info@gmail.com</a>
                </p>
            </div>
        </div>


    </div> <!-- END of header -->
    
    <div id="templatemo_menu" class="ddsmoothmenu">
        <ul>
            <li><a class="categoryLink" onclick="showProducts();" id="homeTitle">Home</a></li>
            <li><a class="categoryLink" onclick="showProducts();" id="productsTitle">Products</a></li>
            <li><a class="categoryLink" onclick="showAbout();" id="aboutTitle">About</a></li>
            <li><a class="categoryLink" onclick="showHelp();" id="helpTitle">FAQs</a></li>
            <li><a class="categoryLink" onclick="goExit();" id="exitTitle">Checkout</a></li>
            <li><a id="contacts" class="categoryLink" onclick="showContacts();">Contact</a></li>
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
<!--                            --><?php //echo mb_convert_encoding($category -> properties -> title, "windows-1251", "utf-8"); ?><!--</a>-->
                            <?php echo $category -> properties -> title; ?></a>
                    </li>
                <?php endforeach; ?>

			</ul>
<!--            <h3>Newsletter</h3>-->
<!--            <p>Praesent aliquam mi id tellus pretium pulvinar in vel ligula.</p>-->
<!--            <div id="newsletter">-->
<!--                <form action="#" method="get">-->
<!--                  <input type="text" value="Subscribe" name="email_newsletter" id="email_newsletter" title="email_newsletter" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />-->
<!--                  <input type="submit" name="subscribe" value="Subscribe" alt="Subscribe" id="subscribebtn" title="Subscribe" class="subscribebtn"  />-->
<!--                </form>-->
<!--                <div class="cleaner"></div>-->
<!--            </div>-->
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
    
       
</div>

<div id="modalMain" data-remodal-id="modal" role="dialog">
    <button data-remodal-action="close" class="remodal-close" aria-label="Close">
        <svg class="" viewBox="0 0 24 24">
            <path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z"></path>
            <path d="M0 0h24v24h-24z" fill="none"></path>
        </svg>
    </button>
    <div id="titleWraper">
        <div id="productDetailsTitle" class="productDetailsTitle"></div>
        <div id="productDetailsPrice" class="titlePrice"></div>
    </div>

    <div id="modal-content" style="display: block"></div>
</div>

<div id="contactsContent" class="hidden">
    <h2><p id="contactsInfo">Contact Information</p></h2>

    <div class="col col_13">
        <p id="info_1">
            Все товары продаются с доставкой по Харькову и по всей Украине
            службами доставки " Новая почта" или " Ин-тайм "
            Для жителей и гостей г. Харькова есть возможность самовывоза.
        </p>

        <div>
            <p id="info_3">
                <br><br>
                График работы интернет-магазина:<br>
                Пн.-Сб.:  с 10.00 до 18.00<br>
                Воскресенье - выходной<br>
            </p>
        </div>
    </div>
    <div class="col col_13">
        <p id="info_0">
            Сделать заказ, оформить курьерскую доставку,
            получить консультацию по интересующей Вас продукции,
            задать вопросы, связанные с оформлением заказа,
            оплатой и доставкой, вы можете по телефонам:
        </p>
        +38(050)938-28-03<br>
        +38(098)509-36-96<br>
        <strong>Email:</strong> <a href="mailto:salon.plus.info@gmail.com">salon.plus.info@gmail.com</a> <br />
        <div class="cleaner divider"></div>

        <div class="cleaner h30"></div>

        <h5><p id="postAddress">Почтовый адрес</p></h5>
        <p id="info_2">
            Ул. Костомаровская 5/7<br />
            Заезд с Мироносицкой или с Чернышевского в арку.<br />
        </p>
    </div>

    <div class="cleaner h30"></div>

<!--    <iframe width="660" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"-->
<!--            src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=new+york+central+park&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=60.158465,135.263672&amp;vpsrc=6&amp;ie=UTF8&amp;hq=&amp;hnear=Central+Park,+New+York&amp;t=m&amp;ll=40.769606,-73.973372&amp;spn=0.014284,0.033023&amp;z=14&amp;output=embed">-->
<!--    </iframe>-->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2564.1045822564242!2d36.24110841607634!3d50.009394979417024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4127a0d961787bab%3A0x9588eeeb8c8b2c10!2z0JrQvtGB0YLQvtC80LDRgNGW0LLRgdGM0LrQsCDQstGD0LvQuNGG0Y8sIDUvNywg0KXQsNGA0LrRltCyLCDQpdCw0YDQutGW0LLRgdGM0LrQsCDQvtCx0LvQsNGB0YLRjA!5e0!3m2!1sru!2sua!4v1504646854273" width="600" height="450" frameborder="0" style="border:0"></iframe>
</div>



</body>
</html>