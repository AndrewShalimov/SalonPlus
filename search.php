<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <link type='text/css' rel='stylesheet' href='css/search.css'/>
</head>


<body id="home">

<div class="aa-input-container" id="aa-input-container">
    <input type="search" id="aa-search-input" class="aa-input-search" placeholder="Search for players or teams..."
           name="search" autocomplete="off"/>
    <svg class="aa-input-icon" viewBox="654 -372 1664 1664">
        <path d="M1806,332c0-123.3-43.8-228.8-131.5-316.5C1586.8-72.2,1481.3-116,1358-116s-228.8,43.8-316.5,131.5  C953.8,103.2,910,208.7,910,332s43.8,228.8,131.5,316.5C1129.2,736.2,1234.7,780,1358,780s228.8-43.8,316.5-131.5  C1762.2,560.8,1806,455.3,1806,332z M2318,1164c0,34.7-12.7,64.7-38,90s-55.3,38-90,38c-36,0-66-12.7-90-38l-343-342  c-119.3,82.7-252.3,124-399,124c-95.3,0-186.5-18.5-273.5-55.5s-162-87-225-150s-113-138-150-225S654,427.3,654,332  s18.5-186.5,55.5-273.5s87-162,150-225s138-113,225-150S1262.7-372,1358-372s186.5,18.5,273.5,55.5s162,87,225,150s113,138,150,225  S2062,236.7,2062,332c0,146.7-41.3,279.7-124,399l343,343C2305.7,1098.7,2318,1128.7,2318,1164z"/>
    </svg>
</div>

<!-- Include AlgoliaSearch JS Client and autocomplete.js jQuery plugin after the jQuery dependency -->
<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.jquery.min.js"></script>

<!-- Initialize autocomplete menu -->
<script>
    var client = algoliasearch('YourApplicationID', 'YourSearchOnlyAPIKey');
    var index = client.initIndex('YourIndex');

    //initialize autocomplete on search input (ID selector must match)
    $('#aa-search-input').autocomplete(
        {hint: false}, [
            {
                source: $.fn.autocomplete.sources.hits(index, {hitsPerPage: 5}),
                //value to be displayed in input control after user's suggestion selection
                displayKey: 'name',
                //hash of templates used when rendering dataset
                templates: {
                    //'suggestion' templating function used to render a single suggestion
                    suggestion: function (suggestion) {
                        return '<span>' +
                            suggestion._highlightResult.name.value + '</span><span>' +
                            suggestion._highlightResult.team.value + '</span>';
                    }
                }
            }
        ]);
</script>


</body>
</html>