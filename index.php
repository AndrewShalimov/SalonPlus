<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
// I18N support information here
include_once('g_API.php');
include_once('messagesUtils.php');
include_once('statisticsUtils.php');

countVisitor();
$categories = getCategories_cached();
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
            categories.push(new Category(<?php echo $category -> id;?>, '<?php echo $category -> title;?>'));
        <?php endforeach; ?>
        $(document).ready(function( $ ) {
            //applyLanguage();
            //getProductsForCategory('<?php echo $categories[0] -> id; ?>');
            goHome();
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
</head>


<body id="home">

<div id="templatemo_wrapper">
	<div id="header" class="divRow">
    	<div class="divColumn">
                <a href=""> <img id="siteLogo" class="siteLogo" src="images/sp_logo.jpg" /></a>
        </div>

        <div id="siteTitle" class="divColumn siteTitle">
            <?php echo getMessage('siteTitle')?>
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
            <li><a class="categoryLink" onclick="goHome();" id="homeTitle"><?php echo getMessage('homeTitle')?></a></li>
            <li><a class="categoryLink" onclick="showProducts();" id="productsTitle"><?php echo getMessage('productsTitle')?></a></li>
            <li><a class="categoryLink" onclick="showAbout();" id="infoTitle"><?php echo getMessage('infoTitle')?></a></li>
            <li><a class="categoryLink" onclick="showShare();" id="shareTitle"><?php echo getMessage('shareTitle')?></a></li>
            <li><a class="categoryLink" onclick="showContacts();" id="contactsTitle"><?php echo getMessage('contactsTitle')?></a></li>
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
        	<h3 id="catTitle"><?php echo getMessage('catTitle')?></h3>
            <ul class="sidebar_menu">
                <?php foreach($categories as $category): ?>
                    <li><a id="<?php echo $category -> id; ?>"
                           class="categoryLink"
                           onclick="javascript:changeContent(<?php echo $category -> id; ?>, this)">
                            <?php if (runLocally())
                                    {echo mb_convert_encoding($category -> title, "windows-1251", "utf-8");}
                                  else {echo $category -> title;}
                            ?></a>
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
    <div id="titleWraper" style="display: inline-table;">
        <div id="productDetailsTitle" class="productDetailsTitle"></div>
        <div id="productDetailsPrice" class="titlePrice"></div>
    </div>

    <div id="modal-content" style="display: block"></div>
</div>

<div id="contactsContent" class="hidden">
    <h2><p id="contactsInfo"><?php echo getMessage('contactsInfo')?></p></h2>

    <div class="col col_13">
        <p id="info_1">
            <?php echo getMessage('info_1')?>
        </p>

        <div>
            <p id="info_3">
                <br><br>
                <?php echo getMessage('info_3')?>
            </p>
        </div>
    </div>
    <div class="col col_13">
        <p id="info_0">
            <?php echo getMessage('info_0')?>:
        </p>
        +38(050)938-28-03<br>
        +38(098)509-36-96<br>
        <strong>Email:</strong> <a href="mailto:salon.plus.info@gmail.com">salon.plus.info@gmail.com</a> <br />
        <div class="cleaner divider"></div>

        <div class="cleaner h30"></div>

        <h5><p id="postAddress"><?php echo getMessage('postAddress')?></p></h5>
        <p id="info_2">
            <?php echo getMessage('info_2')?>
        </p>
    </div>

    <div class="cleaner h30"></div>

<!--    <iframe width="660" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"-->
<!--            src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=new+york+central+park&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=60.158465,135.263672&amp;vpsrc=6&amp;ie=UTF8&amp;hq=&amp;hnear=Central+Park,+New+York&amp;t=m&amp;ll=40.769606,-73.973372&amp;spn=0.014284,0.033023&amp;z=14&amp;output=embed">-->
<!--    </iframe>-->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2564.1045822564242!2d36.24110841607634!3d50.009394979417024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4127a0d961787bab%3A0x9588eeeb8c8b2c10!2z0JrQvtGB0YLQvtC80LDRgNGW0LLRgdGM0LrQsCDQstGD0LvQuNGG0Y8sIDUvNywg0KXQsNGA0LrRltCyLCDQpdCw0YDQutGW0LLRgdGM0LrQsCDQvtCx0LvQsNGB0YLRjA!5e0!3m2!1sru!2sua!4v1504646854273" width="600" height="450" frameborder="0" style="border:0"></iframe>
</div>

<div id="welcomeContent" class="hidden">
    <h2><p id="welcomeInfo"><?php echo getMessage('welcome_0')?>!</a></p></h2>

    <div class="col col_23">
        <p>
            <?php echo getMessage('welcome_1')?>
        </p>
        <p>
            <?php echo getMessage('welcome_2')?>:
            <ul>
                <li><?php echo getMessage('welcome_li_0')?></li>
                <li><?php echo getMessage('welcome_li_1')?></li>
                <li><?php echo getMessage('welcome_li_2')?></li>
                <li><?php echo getMessage('welcome_li_3')?></li>
                <li><?php echo getMessage('welcome_li_4')?></li>
                <li><?php echo getMessage('welcome_li_5')?></li>
                <li><?php echo getMessage('welcome_li_6')?></li>
            </ul>
        </p>
        <p>
            <?php echo getMessage('welcome_3')?>
        </p>
        <p>
            <?php echo getMessage('welcome_4')?>
        </p>
        <p class="importantBlock">
            <?php echo getMessage('welcome_5')?>!<br>
            <?php echo getMessage('welcome_6')?>!
        </p>
    </div>

    <div class="cleaner h30"></div>
</div>

<div id="sharesContent" class="hidden">
    <h2><p class="importantBlock shares" id="sharesInfo"><?php echo getMessage('shares_0')?> !!!</a></p></h2>

    <div class="col col_23 sharesText">
        <p>
            <div id="sharesTitle">
            </div>
        </p>
        <p>
            <div id="sharesText">
            </div>
        </p>
    </div>

    <div class="cleaner h30"></div>
</div>


</body>
</html>