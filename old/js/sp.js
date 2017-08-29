
var lang = [
    {id: "grn", val: "\u0433\u0440\u043d"},
    {id: "catTitle", val: "\u041a\u0430\u0442\u0435\u0433\u043e\u0440\u0438\u0438"},
    {id: "hairdresser", val: "\u041f\u0430\u0440\u0438\u043a\u043c\u0430\u0445\u0435\u0440\u0430\u043c"},
    {id: "napkinsTowels", val: "\u0421\u0430\u043b\u0444\u0435\u0442\u043a\u0438\u002c\u043f\u043e\u043b\u043e\u0442\u0435\u043d\u0446\u0430"},
    {id: "siteTitle", val: "\u0420\u0430\u0441\u0445\u043e\u0434\u043d\u044b\u0435 \u043c\u0430\u0442\u0435\u0440\u0438\u0430\u043b\u044b \u0434\u043b\u044f \u0441\u0430\u043b\u043e\u043d\u043e\u0432 \u043a\u0440\u0430\u0441\u043e\u0442\u044b"},
    {id: "meta_1", val: "\u006b\u0068\u0061\u0072\u006b\u0069\u0076\u002c \u0077\u0065\u0062 \u0073\u0074\u006f\u0072\u0065\u002c \u006d\u0061\u006b\u0065\u0075\u0070\u002c \u006d\u0061\u0071\u0075\u0069\u006c\u006c\u0061\u0067\u0065 \u0445\u0430\u0440\u044c\u043a\u043e\u0432\u002c \u0440\u0430\u0441\u0445\u043e\u0434\u043d\u044b\u0435 \u043c\u0430\u0442\u0435\u0440\u0438\u0430\u043b\u044b \u0434\u043b\u044f \u0441\u0430\u043b\u043e\u043d\u043e\u0432 \u043a\u0440\u0430\u0441\u043e\u0442\u044b\u002c \u0446\u0435\u043d\u0442\u0440 \u043e\u0431\u0435\u0441\u043f\u0435\u0447\u0435\u043d\u0438\u044f \u0441\u0430\u043b\u043e\u043d\u043e\u0432"},
    {id: "meta_2", val: "\u0445\u0430\u0440\u044c\u043a\u043e\u0432\u002c \u0440\u0430\u0441\u0445\u043e\u0434\u043d\u044b\u0435 \u043c\u0430\u0442\u0435\u0440\u0438\u0430\u043b\u044b \u0434\u043b\u044f \u0441\u0430\u043b\u043e\u043d\u043e\u0432 \u043a\u0440\u0430\u0441\u043e\u0442\u044b\u002c \u0446\u0435\u043d\u0442\u0440 \u043e\u0431\u0435\u0441\u043f\u0435\u0447\u0435\u043d\u0438\u044f \u0441\u0430\u043b\u043e\u043d\u043e\u0432"}

];

var catIDsList = ['334170685', '1027010937', '1882604320', '1906864609', '1087128356', '1118201728','1654510439', '743433958', '1192337617', '1852602572', '1146572200', '789329404', '323779058'];


function applyLanguage() {
    for (var i = 0; i < lang.length; i++) {
        var item = lang[i];
        var element = jQuery('#' + item.id);
        if (element.length == 1) {
            element.html(item.val);
        }
    }
}

function changeContent(categoryId) {
    var url;
    var title;
    var price;
    jQuery("#content").empty();
    getProductsForCategory(categoryId);
}



function setCategoryContent(content) {
    for(var i = 0; i < content.length; i++) {
        var obj = content[i];
        jQuery("#content").append("<div class='col col_14 product_gallery'>" +
        "<a href='" + obj.url + "'><img class='thumbImage' src='" + obj.thumb_image_url + "' /></a>" +
        "<div class='productTitle'>" + obj.title + "</div>" +
        "<p class='product_price'>" + obj.price + " " + lang[0].val + "</p>" +
        //"<a href='" + obj.url + "' class='add_to_cart'>\u041f\u043e\u0434\u0440\u043e\u0431\u043d\u0435\u0435</a>" +
        "</div>");
    }
}

function initSlider(content) {
    jQuery("#SlideItMoo_items").empty();
    var catIndex = getRandomInt(0, catIDsList.length);
    getProductsForCategory(catIDsList[catIndex], setSliderContent);
}

function setSliderContent(content) {
    for(var i = 0; i < content.length; i++) {
        var obj = content[i];
        jQuery("#SlideItMoo_items").append("<div class='SlideItMoo_element'>" +
        "<a target='_parent' href='" + obj.url + "'><img class='thumbImage' src='" + obj.thumb_image_url + "' /></a>" +
        "</div>");
    }
    initSliderEvents();
}

function initSliderEvents() {
    window.addEvents({
        'domready': function(){
            /* thumbnails example , div containers */
            new SlideItMoo({
                overallContainer: 'SlideItMoo_outer',
                elementScrolled: 'SlideItMoo_inner',
                thumbsContainer: 'SlideItMoo_items',
                itemsVisible: 5,
                elemsSlide: 2,
                duration: 200,
                itemsSelector: '.SlideItMoo_element',
                itemWidth: 171,
                showControls:1});
        }
    });
}


function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function getProductsForCategory(categoryId, callback) {
    jQuery.ajax({
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
        },
        error: function (err_data) {
            console.log(err_data);
        }
    });

}