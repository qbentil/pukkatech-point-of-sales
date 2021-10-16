$(function(){
    $("#tb").delegate(".pid", "mouseover", function(){
        $(this).select2()
    })
    addNewRow();
    $("#add").on("click", function(){
        addNewRow()
    })
    function addNewRow(){
        $.ajax({
            url : "./public_html/includes/orders.php",
            method: "POST",
            data: {getNewOrderItem:1},
            // success: function(data){
            //     alert(data);
            // }
        }).done(function(data){
            $("#tb").append(data)
            var n = 0;
            $(".num").each(function(){
                $(this).html(++n)
            })
        })
    }
    function calculate(){
        var sub_total = 0;
        var discount = 0;
        var net_total = 0
        $(".totalPrice").each(function(){
            sub_total = sub_total + ($(this).html()*1)
        })
        $('#discount').on("keyup", function(){
            discount = (($(this).val() *1) / 100) * sub_total;
            $('#net_total').val(sub_total - discount);
        
        })

        $('#sub_total').val(sub_total)
        $('#discount').val(discount)
        $('#payment_method')
        $('#net_total').val(sub_total - discount)
    }
    // remove row from basket
    $("#tb").delegate(".remove", "click", function(){
        var rows = document.getElementsByClassName("remove");
        if(rows.length > 1){
            var row = $(this).parent().parent();
            row.remove();
            calculate()
        }else{
            alert("Can't remove last element")
        }
    })
    // calculate total price
    $("#tb").delegate(".qty", "keyup", function(){
        var qty = $(this);
        var tr = $(this).parent().parent();
        if(qty.val() <= tr.find(".tqty").val()){
            tr.find(".totalPrice").html(tr.find(".uprice").val() * tr.find(".qty").val())
            calculate()
        }else{
            if((qty.val()- 0) > (tr.find(".tqty").val()-0)){
                alert("Sorry this much of quatity is not available") 
                qty.val(tr.find(".tqty").val())
            }else{
                tr.find(".totalPrice").html(tr.find(".uprice").val() * tr.find(".qty").val())
                calculate()
            }
        }
    })
    $("#tb").delegate(".qty", "change", function(){
        var tr = $(this).parent().parent();
        tr.find(".totalPrice").html(tr.find(".uprice").val() * tr.find(".qty").val())
        calculate()
    })
    // populate basket date
    $("#tb").delegate(".pid", "change", function(){
        var pid = $(this).val();
        var tr = $(this).parent().parent();
        $.ajax({
            url : "./public_html/includes/orders.php",
            method: "POST",
            dataType: "json",
            data: {getPriceAndQty:1, id:pid},
        }).done(function(result){
            // alert(result[0].product_name)
            tr.find(".tqty").val(result[0].stock);
            tr.find(".qty").val(1);
            // control quantity inputs
            tr.find(".qty").attr("max", result[0].stock);
            tr.find(".qty").attr("min", 1);
            tr.find(".pro_names").val(result[0].product_name);
            tr.find(".uprice").val(result[0].selling_price);
            tr.find(".totalPrice").html(tr.find(".uprice").val() * tr.find(".qty").val());
            // console.log(result);
            calculate()
        })
    })

    // submit order 
    // $("#gInvoice").on("click", function(e){
    //     // e.preventDefault();
    //     var invoice = $("#orderData").serialize();
    //     var cName = $("#customerName")
    //     var discount = $("#discount")
    //     // alert(invoice)
    //     // if(cName.val() != ""){
    //     //     alert("Enter customer name")
    //     // }
    //     // if(discount.val() != ""){
    //     //     alert("Enter discount")
    //     // }
    //     if(cName.val() != "" & discount.val() != ""){
    //         $.ajax({
    //             url : "./public_html/includes/orders.php",
    //             method: "POST",
    //             data: $("#orderData").serialize(),
    //         }).done(function(result){
    //             // alert(result);
    //             if(result <= 0){
    //                 alert(result)
    //             }else{
    //                 window.location.href = "./public_html/includes/bill.php?&invoice_no="+result+"&"+invoice;
    //                 // $("#orderData").trigger("reset")
    //             }
    //         })
    //     }
    // })


    // sales calc
})

