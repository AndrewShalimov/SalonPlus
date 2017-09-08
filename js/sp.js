
var thumbPath = 'images/products/thumbs/';
var productsPath = 'images/products/';

var lang = [
    {id: "grn", val: "\u0433\u0440\u043d"},
    {id: "catTitle", val: "\u041a\u0430\u0442\u0435\u0433\u043e\u0440\u0438\u0438"},
    {id: "hairdresser", val: "\u041f\u0430\u0440\u0438\u043a\u043c\u0430\u0445\u0435\u0440\u0430\u043c"},
    {id: "napkinsTowels", val: "\u0421\u0430\u043b\u0444\u0435\u0442\u043a\u0438\u002c\u043f\u043e\u043b\u043e\u0442\u0435\u043d\u0446\u0430"},
    {id: "siteTitle", val: "\u0420\u0430\u0441\u0445\u043e\u0434\u043d\u044b\u0435 \u043c\u0430\u0442\u0435\u0440\u0438\u0430\u043b\u044b \u0434\u043b\u044f \u0441\u0430\u043b\u043e\u043d\u043e\u0432 \u043a\u0440\u0430\u0441\u043e\u0442\u044b"},
    {id: "meta_1", val: "\u006b\u0068\u0061\u0072\u006b\u0069\u0076\u002c \u0077\u0065\u0062 \u0073\u0074\u006f\u0072\u0065\u002c \u006d\u0061\u006b\u0065\u0075\u0070\u002c \u006d\u0061\u0071\u0075\u0069\u006c\u006c\u0061\u0067\u0065 \u0445\u0430\u0440\u044c\u043a\u043e\u0432\u002c \u0440\u0430\u0441\u0445\u043e\u0434\u043d\u044b\u0435 \u043c\u0430\u0442\u0435\u0440\u0438\u0430\u043b\u044b \u0434\u043b\u044f \u0441\u0430\u043b\u043e\u043d\u043e\u0432 \u043a\u0440\u0430\u0441\u043e\u0442\u044b\u002c \u0446\u0435\u043d\u0442\u0440 \u043e\u0431\u0435\u0441\u043f\u0435\u0447\u0435\u043d\u0438\u044f \u0441\u0430\u043b\u043e\u043d\u043e\u0432"},
    {id: "meta_2", val: "\u0445\u0430\u0440\u044c\u043a\u043e\u0432\u002c \u0440\u0430\u0441\u0445\u043e\u0434\u043d\u044b\u0435 \u043c\u0430\u0442\u0435\u0440\u0438\u0430\u043b\u044b \u0434\u043b\u044f \u0441\u0430\u043b\u043e\u043d\u043e\u0432 \u043a\u0440\u0430\u0441\u043e\u0442\u044b\u002c \u0446\u0435\u043d\u0442\u0440 \u043e\u0431\u0435\u0441\u043f\u0435\u0447\u0435\u043d\u0438\u044f \u0441\u0430\u043b\u043e\u043d\u043e\u0432"},
    {id: "contacts", val: "\u041a\u043e\u043d\u0442\u0430\u043a\u0442\u044b"},
    {id: "contactsInfo", val: "\u041a\u043e\u043d\u0442\u0430\u043a\u0442\u044b"},
    {id: "postAddress", val: "\u041f\u043e\u0447\u0442\u043e\u0432\u044b\u0439 \u0430\u0434\u0440\u0435\u0441"},
    {id: "info_0", val: "\u0421\u0434\u0435\u043b\u0430\u0442\u044c \u0437\u0430\u043a\u0430\u0437\u002c \u043e\u0444\u043e\u0440\u043c\u0438\u0442\u044c \u043a\u0443\u0440\u044c\u0435\u0440\u0441\u043a\u0443\u044e \u0434\u043e\u0441\u0442\u0430\u0432\u043a\u0443\u002c\n" +
    "                \u043f\u043e\u043b\u0443\u0447\u0438\u0442\u044c \u043a\u043e\u043d\u0441\u0443\u043b\u044c\u0442\u0430\u0446\u0438\u044e \u043f\u043e \u0438\u043d\u0442\u0435\u0440\u0435\u0441\u0443\u044e\u0449\u0435\u0439 \u0412\u0430\u0441 \u043f\u0440\u043e\u0434\u0443\u043a\u0446\u0438\u0438\u002c\n" +
    "                \u0437\u0430\u0434\u0430\u0442\u044c \u0432\u043e\u043f\u0440\u043e\u0441\u044b\u002c \u0441\u0432\u044f\u0437\u0430\u043d\u043d\u044b\u0435 \u0441 \u043e\u0444\u043e\u0440\u043c\u043b\u0435\u043d\u0438\u0435\u043c \u0437\u0430\u043a\u0430\u0437\u0430\u002c\n" +
    "                \u043e\u043f\u043b\u0430\u0442\u043e\u0439 \u0438 \u0434\u043e\u0441\u0442\u0430\u0432\u043a\u043e\u0439\u002c \u0432\u044b \u043c\u043e\u0436\u0435\u0442\u0435 \u043f\u043e \u0442\u0435\u043b\u0435\u0444\u043e\u043d\u0430\u043c\u003a"},
    {id: "info_1", val: "\u0412\u0441\u0435 \u0442\u043e\u0432\u0430\u0440\u044b \u043f\u0440\u043e\u0434\u0430\u044e\u0442\u0441\u044f \u0441 \u0434\u043e\u0441\u0442\u0430\u0432\u043a\u043e\u0439 \u043f\u043e \u0425\u0430\u0440\u044c\u043a\u043e\u0432\u0443 \u0438 \u043f\u043e \u0432\u0441\u0435\u0439 \u0423\u043a\u0440\u0430\u0438\u043d\u0435 \u0441\u043b\u0443\u0436\u0431\u0430\u043c\u0438 \u0434\u043e\u0441\u0442\u0430\u0432\u043a\u0438 \n" +
    "\u0022\u041d\u043e\u0432\u0430\u044f \u043f\u043e\u0447\u0442\u0430\u0022 \u0438\u043b\u0438 \u0022\u0418\u043d\u002d\u0442\u0430\u0439\u043c\u0022\u002e\u003c\u0062\u0072\u003e \n" +
    "\u0414\u043b\u044f \u0436\u0438\u0442\u0435\u043b\u0435\u0439 \u0438 \u0433\u043e\u0441\u0442\u0435\u0439 \u0433\u002e \u0425\u0430\u0440\u044c\u043a\u043e\u0432\u0430 \u0435\u0441\u0442\u044c \u0432\u043e\u0437\u043c\u043e\u0436\u043d\u043e\u0441\u0442\u044c \u0441\u0430\u043c\u043e\u0432\u044b\u0432\u043e\u0437\u0430\u002e"},
    {id: "info_2", val: "\u0433\u002e\u0425\u0430\u0440\u044c\u043a\u043e\u0432\u002c \u0423\u043b\u002e \u041a\u043e\u0441\u0442\u043e\u043c\u0430\u0440\u043e\u0432\u0441\u043a\u0430\u044f \u0035\u002f\u0037<br>" +
                        "\u0417\u0430\u0435\u0437\u0434 \u0441 \u0443\u043b\u002e\u041c\u0438\u0440\u043e\u043d\u043e\u0441\u0438\u0446\u043a\u043e\u0439 \u0438\u043b\u0438 \u0441 \u0443\u043b\u002e\u0427\u0435\u0440\u043d\u044b\u0448\u0435\u0432\u0441\u043a\u043e\u0433\u043e \u0432 \u0430\u0440\u043a\u0443\u002e"},
    {id: "homeTitle", val: "\u0414\u043e\u043c\u043e\u0439"},
    {id: "productsTitle", val: "\u041f\u0440\u043e\u0434\u0443\u043a\u0442\u044b"},
    {id: "aboutTitle", val: "\u0418\u043d\u0444\u043e\u0440\u043c\u0430\u0446\u0438\u044f"},
    {id: "helpTitle", val: "\u041f\u043e\u043c\u043e\u0449\u044c"},
    {id: "exitTitle", val: "\u0412\u044b\u0445\u043e\u0434"},
    {id: "info_3", val: "\u003c\u0062\u0072\u003e\u003c\u0062\u0072\u003e\t\t\t\t\t\t\n" +
                        "\u0413\u0440\u0430\u0444\u0438\u043a \u0440\u0430\u0431\u043e\u0442\u044b \u0438\u043d\u0442\u0435\u0440\u043d\u0435\u0442\u002d\u043c\u0430\u0433\u0430\u0437\u0438\u043d\u0430\u003a\u003c\u0062\u0072\u003e\n" +
                        "\u041f\u043d\u002e\u002d\u0412\u0441\u002e\u003a  \u0441 \u0031\u0030\u002e\u0030\u0030 \u0434\u043e \u0032\u0030\u002e\u0030\u0030\u003c\u0062\u0072\u003e\n"}
];
var currentProduct;

function showProducts() {
    $("#content").empty();
    getProductsForCategory(categories[0].id);
    highlightCategoryMenu(categories[0].id);
}

function highlightCategoryMenu(categoryId) {
    $("a").removeClass("menu_active");
    $("#" + categoryId).addClass("menu_active");
}

function showAbout() {
    $("a").removeClass("menu_active");
}

function showHelp() {
    $("a").removeClass("menu_active");
}

function goExit() {
    $("a").removeClass("menu_active");
}

function applyLanguage() {
    for (var i = 0; i < lang.length; i++) {
        var item = lang[i];
        var element = jQuery('#' + item.id);
        if (element.length == 1) {
            element.html(item.val);
        }
    }
    refreshElements();
}

function changeContent(categoryId, link) {
    var url;
    var title;
    var price;
    $("a").removeClass("menu_active");
    $(link).addClass("menu_active");
    $("#content").empty();
    getProductsForCategory(categoryId);
}

function goHome() {
    $("#content").empty();
    getProductsForCategory(categories[0].id);
    highlightCategoryMenu(categories[0].id);
}

function showContacts() {
    $("a").removeClass("menu_active");
    $("#content").empty();
    var contactsContant = $("#contactsContent").html();
    $("#content").append(contactsContant);
}

var categoryContent = {};

function setCategoryContent(content) {
    categoryContent = {};
    categoryContent = JSON.parse(JSON.stringify(content)).products;
    for(var i = 0; i < categoryContent.length; i++) {
        var obj = categoryContent[i];
        $("#content").append("<div class='col col_14 product_gallery'>" +
        "<a id='productDetails_" + obj.id + "' data-remodal-target='modal' class='thumbLink' onclick='modalInit(); findProductAndShow(" + obj.id + ");'><img class='thumbImage' src='" + thumbPath + obj.imageNames[0] + "' /></a>" +
        //"<img class='thumbImage' src='" + thumbPath + obj.image_name + "' />" +
        "<div class='productTitle'>" + obj.title + "</div>" +
        "<p class='product_price'>" + obj.price + " " + lang[0].val + "</p>" +
        //"<a href='" + obj.url + "' class='add_to_cart'>\u041f\u043e\u0434\u0440\u043e\u0431\u043d\u0435\u0435</a>" +
        "</div>");
    }
}

function findProductAndShow(productId) {
    var product = $.grep(categoryContent, function(e){ return e.id == productId; })[0];
    showProductDetails(product);
}

function showProductDetails(product) {
    var details = product.description;
    var imageLink = productsPath + product.imageNames[0];
    $("#productDetailsTitle").html(product.title);
    var grn = $.grep(lang, function(e){ return e.id == 'grn'; })[0].val;
    $("#productDetailsPrice").html(product.price + '&nbsp' + grn + '.');

    $("#productDetails_" + product.id).data("text", details);
    //details = '<div>' + details.replace('. ', '<br>').replace('\n', '<br>') + '</div>';
    details = "<div class='productDetailsText'>" + details + "</div>";



    var productImageBlock = "<div><img id='fullImageModal' imageName='" + product.imageNames[0] + "' class='fullImage' src='" + imageLink + "'/>";
    if (product.imageNames.length > 1) {
        currentProduct = product;
        "right"
        var netxArrowBlock = "<div class='paginator'><span id='paginatorNext' class='next' onclick='goAnotherImage(\"right\");'></span></div>";
        var prevArrowBlock = "<div class='paginator'><span id='paginatorPrev' class='prev' onclick='goAnotherImage(\"left\");'></span></div>";
        productImageBlock = prevArrowBlock + netxArrowBlock + productImageBlock;
    }
    productImageBlock = productImageBlock.concat("</div>");
    details = productImageBlock + details;
    $("#modalMain").width('50%');
    modalInit(details);
}

function goAnotherImage(direction) {
    var shift = 0;
    switch (direction) {
        case "right": {shift = 1; break;}
        case "left": {shift = -1; break;}
    }
    var currentImageName = $("#fullImageModal").attr("imageName");
    var nextImage;
    currentProduct.imageNames.forEach(function(imageName, i) {
        if (imageName == currentImageName) {
            nextImage = currentProduct.imageNames[i + shift];
            if (!nextImage) {
                if (shift == 1) {
                    nextImage = currentProduct.imageNames[0];
                } else {
                    nextImage = currentProduct.imageNames[currentProduct.imageNames.length - 1];
                }
            }
            $("#fullImageModal").attr("imageName", nextImage);
            return;
        } else {

        }
    });

    $("#fullImageModal").attr('src', productsPath + nextImage);
}

function initSlider() {
    $("#liSliderContent").empty();
    getRandomProducts(20, setSliderContent);
}

function setSliderContent(products) {
    for(var i = 0; i < products.length; i++) {
        var product = products[i];
        $("#liSliderContent").append("<li><div class='SlideItMoo_element'>" +
        "<a id='sliderLink_" + product .categoryId + "_" + product .id + "' data-remodal-target='modal' class='categoryLink' onclick='getProductFromServerAndShow(" + product .categoryId + ", " + product .id + ");' ><img class='sliderImage' title='" + product.title + "' src='" + thumbPath + product.imageNames[0] + "' border='0'/></a>" +
        "</div></li>");
    }
    $('#scrollable').liquidcarousel({
            height: 129,
            duration: 100,
            hidearrows: false
        }
    );
    modalInit();
 }

 function clearModal() {
     $('#modal-content').html("");
 }

function getProductFromServerAndShow(categoryId, productId) {
    $.ajax({
        url: "getProduct.php",
        type: "GET",
        data: {
            catID: categoryId,
            productID: productId
        },
        dataType: "json",
        success: function (product) {
            showProductDetails(product);
        },
        error: function (err_data) {
            console.log(err_data.responseText);
        }
    });
}

function refreshElements() {
    $("#siteLogo").addClass("hidden");
    $("#siteLogo").css({ 'height': '25%' });
    $("#siteLogo").removeClass("hidden");
    $("#siteLogo").css({ 'height': '26%' });
}


function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function getProductsForCategory_old(categoryId, callback) {
    $.ajax({
        url: "getProducts.php",
        type: "GET",
        data: {
            catID: categoryId
        },
        dataType: "json",
        success: function (responseData) {
            if (callback) {
                callback(responseData);
            } else {
                setCategoryContent(responseData);

            }
            refreshElements();
        },
        error: function (err_data) {
            console.log(err_data.responseText);
        }
    });
}


function getProductsForCategory(categoryId, callback) {
    $("#" + categoryId).addClass("menu_active");
    $.ajax({
        url: "getProducts.php",
        type: "GET",
        data: {
            catID: categoryId,
            action: 'products_by_category'
        },
        dataType: "json",
        success: function (responseData) {
            if (callback) {
                callback(responseData);
            } else {
                setCategoryContent(responseData);

            }
            refreshElements();
        },
        error: function (err_data) {
            console.log(err_data.responseText);
        }
    });
}


function getRandomProducts(productsCount, callback) {
    $.ajax({
        url: "getProducts.php",
        type: "GET",
        data: {
            count: productsCount,
            action: 'random_products'
        },
        dataType: "json",
        success: function (responseData) {
            if (callback) {
                callback(responseData);
            } else {
                setCategoryContent(responseData);

            }
            refreshElements();
        },
        error: function (err_data) {
            console.log(err_data.responseText);
        }
    });
}


function getProduct(categoryId, productId, callback) {
    $.ajax({
        url: "getProduct.php",
        type: "GET",
        data: {
            catID: categoryId,
            productID: productId
        },
        dataType: "json",
        success: function (responseData) {
            if (callback) {
                callback(responseData);
            }
            console.log(responseData);

        },
        error: function (err_data) {
            console.log(err_data.responseText);
        }
    });
}

function modalInit(modalContent) {
    //var modalContent;

    // $('[data-remodal-target]').on('click', function(){
    //     modalContent = $(this).data('text');
    // });

    $(document).on('opening', '.remodal', function () {
        if(modalContent) {
            $('#modal-content').html(modalContent);
        }
    });

    $('[data-remodal-id^=modal]').remodal({
        hashTracking: false
    });
    if(modalContent) {
        $('#modal-content').html(modalContent);
    };
}
