jQuery.extend(jQuery.fn.dataTableExt.oSort, {
    "currency-pre" : function(a) {
        a = (a === "-") ? 0 : a.replace(/[^\d\-\.]/g, "");
        return parseFloat(a);
    },

    "currency-asc" : function(a, b) {
        return a - b;
    },

    "currency-desc" : function(a, b) {
        return b - a;
    }
});

//Once doc has loaded, sort table .. price by default 
jQuery(document).ready(function() {
    jQuery('.product-table').dataTable({
        "aoColumns" : 
            [null,
            {"sType" : "currency"},
            {"sType" : "currency"},
            null,
            {"bSortable" : false}
            ],
        "aaSorting" : [[0, 'asc']],
        //"aaSorting" : [],
        "bPaginate" : false,
        "bLengthChange" : false,
        "bFilter" : true,
        "bSort" : true,
        "bInfo" : false,
        "bAutoWidth" : false,
        "sDom": '<"top"f>rt<"bottom"><"clear">',
        "oLanguage": {
             "sSearch": "Looking for a specific product?&nbsp;"
        }
    });
}); 

jQuery(document).ready(function() {
    jQuery('.product-table-search').dataTable({
        "aoColumns" : 
            [null,
            null,
            {"sType" : "currency"},
            null,
            {"bSortable" : false}
            ],
        //"aaSorting" : [[1, 'asc']],
        "aaSorting" : [],
        "bPaginate" : false,
        "bLengthChange" : false,
        "bFilter" : true,
        "bSort" : true,
        "bInfo" : false,
        "bAutoWidth" : false,
        "sDom": '<"top"f>rt<"bottom"><"clear">',
        "oLanguage": {
             "sSearch": "Looking for a specific product?&nbsp;"
        }
    });
}); 