    // VALIDATION with chosen fix
    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Please check your input."
    );

    // some extra rules for custom fields
    if($('.cf_decimal_fields').length != 0)
        var $decimal = $(".cf_decimal_fields").attr("name");
    if($('.cf_integer_fields').length != 0)
        var $integer = $(".cf_integer_fields").attr("name");
    
    var $params = {rules:{}, messages:{}};
    $params['rules'][$integer] = {regex: "^[0-9]{1,18}([,.]{1}[0-9]{1,3})?$"};
    $params['messages'][$integer] = "Format is incorect";
    $params['rules'][$decimal] = {regex: "^[0-9]{1,18}([,.]{1}[0-9]{1,3})?$"};
    $params['messages'][$decimal] = "Format is incorect";
    $params['rules']['price'] = {regex: "^[0-9]{1,18}([,.]{1}[0-9]{1,3})?$"};
    $params['messages']['price'] = "Format is incorect";

    var $form = $(".post_new");
    $form.validate($params
        // {
        // errorLabelContainer: $(".post_new div.error"),
        // wrapper: 'div',
        // rules: {
        //     title: {minlength:2},
        //     price: {regex:"^[0-9]{1,18}([,.]{1}[0-9]{1,3})?$"}
        // },
        // messages: {
        //     price:{regex: "Format is incorect"}
        // }
    // }
    );
    
    //chosen fix
    var settings = $.data($form[0], 'validator').settings;
    settings.ignore += ':not(#location)'; // post_new location(any chosen) texarea
    settings.ignore += ':not([name="description"])'; // post_new description texarea
    
    // $('.chosen-container a').ready(function(){
        
    //     // $('.chosen-single').hasClass('chosen-default').addClass('has-error');
    //     if($(this).hasClass('chosen-default'))
    //     {
    //         $(this).addClass('has-error');
    //     }
    //     else
    //     {
    //         $(this).removeClass('has-error');
    //     }
    // });
    
    // end VALIDATION

    //datepicker in case date field exists
    if($('.cf_date_fields').length != 0){
        $('.cf_date_fields').datepicker();}


    // custom fields set to categories
    $( "input[name=category]" ).on( "click", function() {
        showCustomFieldsByCategory(this);
    });

    showCustomFieldsByCategory($("input[name=category]:checked"));
    
    function showCustomFieldsByCategory(element){
        id_categ = $(element).val();
        // only custom fields have class data-custom
        $(".data-custom").each(function(){
            // get data-category, contains json array of set categories
            field = $(this);
            dataCategories = field.attr('data-categories');
            // show if cf fields if they dont have categories set
            if(dataCategories.length != 2){
                field.parent().parent().css('display','none');
                field.prop('disabled', true);
            }
            else{
                field.parent().parent().css('display','block');
                field.prop('disabled', false);
            }
            if(dataCategories !== undefined)  
                if(dataCategories != "")
                {
                    // apply if they have equal id_category 
                    $.each($.parseJSON(dataCategories), function (index, value) { 
                        if(id_categ == value){
                            field.parent().parent().css('display','block');
                            field.prop('disabled', false);
                        }
                    });
                }
        });
    }