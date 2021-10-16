    <footer class="footer mt-auto py-3">
    <div class="container text-center align-items-center justify-content-center">
        <span class="text-muted text-center ml-5">&COPY; <script>document.write(new Date().getFullYear())</script>, Pukka Web Services</span>
    </div>
    </footer>

<!-- script libraries -->

    <script src="./public_html/lib/jquery.min.js"></script>
    <script src="./public_html/lib/popper.min.js"></script>
    <script src="./public_html/lib/bootstrap.min.js"></script>
    <script src="./public_html/lib/datatables.min.js"></script>
    <script src="./public_html/lib/chosen.jquery.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src='./public_html/lib/select2.min.js' type='text/javascript'></script>

    <!-- local -->
    <script src='./public_html/lib/highChart.js' type='text/javascript'></script>
    <script src="./public_html/lib/data.js"></script>
    <script src="./public_html/lib/exporting.js"></script>
    <script src="./public_html/lib/accessibility.js"></script>

    <!-- cdn -->
    <!-- <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->

    <!-- <script src="./public_html/lib/all.js"></script> -->
    <script src="./public_html/js/core.js"></script>
    <script src="./public_html/js/order.js"></script>
    <!-- <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script> -->
    <script>
            // alert("Hello")
            // $(document).on("click", ".browse", function() {
            //     var file = $(this).parents().find(".file");
            //     file.trigger("click");
            // });
            $('input[type="file"]').change(function(e) {
                var fileName = e.target.files[0].name;
                $("#file").val(fileName);

                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("preview").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });

        function setTime() {
            var d = new Date(),
            el = document.getElementById("time");

            el.innerHTML = formatAMPM(d);

            setTimeout(setTime, 1000);
        }

        function formatAMPM(date) {
            var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
            var
                year = date.getFullYear(),
                day = date.getDate(),
                month = months[date.getMonth()],
                hours = date.getHours(),
                minutes = date.getMinutes(),
                seconds = date.getSeconds(),
                ampm = hours >= 12 ? 'pm' : 'am';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0'+minutes : minutes;
            var strTime = month + '&nbsp;' + day + ',&nbsp;' + year + '&nbsp;' + hours + ':' + minutes + ':' + seconds + ' ' + ampm;
            return strTime;
        }

        setTime();



            // Products Scripting
    $("#category").on("change", function(){
        var cat = $("#category :selected").text().toLowerCase();
        if(cat == "motorcycles" || cat == "tricycles")
        {
            $("#chasisNumber").attr("required", "true")
            $("#cr").text("*")

            // remove parts required attr
            $("#partNumber").removeAttr("required")
            $("#pr").text("")
        }
        else if(cat == "spare parts")
        {
            // remove chasis required attr
            $("#chasisNumber").removeAttr("required")
            $("#cr").text("")

            $("#partNumber").attr("required", "true")
            $("#pr").text("*")
        }
        else{
            $("#chasisNumber").removeAttr("required")
            $("#cr").text("")
            $("#partNumber").removeAttr("required")
            $("#pr").text("")
        }
    })




    function showLogModal(data)
    {
        let desc = $(data).data("desc")
        let date = $(data).data("date")
        $("#desc").html(desc);
        $("#date").html(date);
        $(".modal").modal()
    }
    function showeCatModal(data)
    {
        let cat = $(data).data("cat")
        let id = $(data).data("id")
        let e = $(data).data("e")  
        $(".e").html(e);
        $("#category_name").val(cat);
        $("#category_id").val(id);
        $("#editCate").modal()
    }
    function delCatModal(data)
    {
        let id = $(data).data("id");
        let tb = $(data).data("tb");
        $("#cid").val(id);
        $("#table").val(tb);
        $("#delCat").modal()
    }
    function viewProduct(data)
    {
        $("#pname").val($(data).data("name"))
        $("#sell").val("¢"+$(data).data("sp"))
        $("#cost").val("¢"+$(data).data("cp"))
        $("#stock").val($(data).data("qty"))
        $("#b").val($(data).data("brand"))
        $("#cate").val($(data).data("cat"))
        $("#date").val($(data).data("date"))
        $("#chasis").val($(data).data("chasis"))
        $("#part").val($(data).data("part"))
        $("#viewProductModal").modal()
        // alert(tb)
    }
    function viewEmployee(data)
    {
        $("#fname").val($(data).data("fname"))
        $("#lname").val($(data).data("lname"))
        $("#phone").val($(data).data("phone"))
        $("#email").val($(data).data("email"))
        $("#addres").val($(data).data("address"))
        $("#use").val($(data).data("user"))
        $("#date").val($(data).data("date"))
        $("#viewEmployeeModal").modal()
        // alert(tb)
    }
    function editProduct(data)
    {
        $("#id").val($(data).data("id"))
        $("#name").val($(data).data("name"))
        $("#sp").val($(data).data("sp"))
        $("#cp").val($(data).data("cp"))
        $("#qty").val($(data).data("qty"))
        $("#echasis").val($(data).data("chasis"))
        $("#epart").val($(data).data("part"))
        let option = new Option($(data).data("brand"), $(data).data("bid"), true, true); 
        $('#bb').append($(option))
        let option2 = new Option($(data).data("cat"), $(data).data("cid"), true, true); 
        $('#cat').append($(option2))
        // $("#brand").append("<option selected>First</option>")
        // let cat = $(data).data("cat");
        // $("#cid").val(id);
        // $("#table").val(tb);
        $("#editProductModal").modal()
        // alert(tb)
    }
    function editEmployee(data)
    {
        $("#uid").val($(data).data("id"))
        $("#first_name").val($(data).data("fname"))
        $("#last_name").val($(data).data("lname"))
        $("#uphone").val($(data).data("phone"))
        $("#uemail").val($(data).data("email"))
        $("#uaddress").val($(data).data("address"))
        // $("#user_type").val($(data).data("user"))
        if($(data).data("user") == "Admin")
        {
            let option1 = new Option($(data).data("user"), $(data).data("user"), true, true); 
            let option2 = new Option("Employee", "Employee", false, false); 
            $('#user_type').append($(option1))
            $('#user_type').append($(option2))
        }else{
            let option1 = new Option($(data).data("user"), $(data).data("user"), true, true); 
            let option2 = new Option("Admin", "Admin", false, false); 
            $('#user_type').append($(option1))
            $('#user_type').append($(option2))
        }

        // $("#brand").append("<option selected>First</option>")
        // let cat = $(data).data("cat");
        // $("#cid").val(id);
        // $("#table").val(tb);
        $("#editEmployeeModal").modal()
        // alert(tb)
    }



    // reports
    let sales = 0;
    let pro = 0;
    $(".tsales").each(function(){
        sales = sales + ($(this).html()*1)
    })
    $(".tprofits").each(function(){
        pro = pro + ($(this).html()*1)
    })
    $("#tsales").html("GH¢ "+Number(Math.round(parseFloat(sales + 'e' + 2)) + 'e-' + 2).toFixed(2))
    $("#tprofits").html("GH¢ "+Number(Math.round(parseFloat(pro + 'e' + 2)) + 'e-' + 2).toFixed(2))


    Highcharts.chart('chart', {
    data: {
        table: 'reportTable'
    },
    style: {
     fontFamily: 'Source Sans Pro, arial, helvetica, sans-serif'
   },
    chart: {
        type: 'column'
    },
    title: {
        text: 'Sales Report Graph'
    },
    yAxis: {
        allowDecimals: true,
        title: {
        text: 'Total Amount'
        }
    },
    tooltip: {
        formatter: function () {
        return '<b>' + this.series.name + '</b><br/>' +
            this.point.y + ' ' + this.point.name.toLowerCase();
        }
    }
    });


    </script>
    
</body>

</html>