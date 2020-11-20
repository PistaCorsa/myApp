<!DOCTYPE html>
<html>

<head>
<title>MyApp Frontend</title>
<link rel="stylesheet" href="{{ url() }}/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ url() }}/assets/custom.css">
</head>

<body>
    <div class="row">
        <div class="col-md-8 col-xs-12 table-section">
            <div class="container">
                <h2 class="text-center mb20" >List Vehicle</h2>
                <div class="table100 ver3 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column2 text-center">Engine ID</th>
									<th class="cell100 column3 text-center">Vehicle Name</th>
                                    <th class="cell100 column4 text-center">Type</th>
                                    <th class="cell100 column5 text-center">Displacement Value</th>
									<th class="cell100 column6 text-center">Price</th>
									<th class="cell100 column7 text-center">Location</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody id="bodyContent">
                                
							</tbody>
						</table>
					</div>
				</div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12 form-section">
            <div class="container">
                <h2 class="text-center mb20" >Add List</h2>
                <div class="black-card">
                    <form action="" method="POST" encypt="multipart" id="myForm">
                        <div class="form-group">
                            <label>Vehicle Name</label>
                            <input type="text" class="form-input" name="vname" value="" placeholder="ex:Toyota Pajero" required/>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select name="vtype">
                                @foreach ($type as $ty)
                                    <option value="{{ $ty->id_type }}">{{ $ty->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Engine Displacement Value</label>
                            <div class=""> 
                                <div class="col-xs-6" style="display:inline-block;flex-row:row wrap;">
                                    <input type="number" class="form-input" name="enDisVal" value="" placeholder="ex:125" required/>
                                </div>
                                <div class="col-xs-6" style="display:inline-block">
                                    <select name="vUnit" style="width:100%">
                                        @foreach ($value as $val)
                                            <option value="{{ $val->id_value }}">{{ $val->value_unit }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Engine Power (HP)</label>
                            <input type="number" class="form-input" name="enPower" value="" placeholder="ex:250" min="0" required/>
                        </div>
                        <div class="form-group">
                            <label>Price ($)</label>
                            <input type="number" class="form-input" name="price" value="" placeholder="ex:3000" min="0" required/>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <textarea name="location" placeholder="ex:Jakarta"></textarea>
                        </div>
                        
                        <button type="button" class="btnAdd" id="addBtn"><span id="textAdd">Add</span><span id="loader" style="display:none"><img src="{{ url() }}/assets/loader3.svg" style="width:25px;"/></span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
    
    // CANCEL
    // document.addEventListener("DOMContentLoaded", function(event) { 

    //     getList();

    // });
    $( document ).ready(function() {
        getList()

        <?php if(count($type) == 0) { ?>
            alert('Need Value, Please do [ php artisan db:seed --class=NeededRow ] first !')
        <?php }?>
    });

    $('#addBtn').on('click', function() {
        var validation = $("#myForm").valid();
        let base_url = '{{ url() }}' + '/'


        if(validation === true)
        {
            $("#addBtn").attr('disabled')
            $("#textAdd").hide()
            $("#loader").show()

            $.ajax({
                url		: base_url + 'insertData',
                data	: {
                    "vehicle_name":$("input[name=vname]").val(),
                    "id_type":$("select[name=vtype]").val(),
                    "id_value":$("select[name=vUnit]").val(),
                    "engine_power":$("input[name=enPower]").val(),
                    "engine_displacement_value":$("input[name=enDisVal]").val(),
                    "price":$("input[name=price]").val(),
                    "location":$("textarea[name=location]").val()
                },
                type    : "POST",
                async	: true,
                dataType: 'json',
                success	: function(data){
                    console.log(data)

                    if(data.statusCode == 0)
                    {
                        alert('Data Success Insert into EID#' + data.data.EngineId)
                        getList()
                        document.getElementById("myForm").reset();
                    } else {
                        alert(data.message);
                    }

                    $("#loader").hide()
                    $("#textAdd").show()
                    $("#addBtn").removeAttr('disabled')
                }
            });
        }
    });

    function getList()
    {
        let base_url = '{{ url() }}' + '/'

        $("#bodyContent").html('<tr>' +
                                    '<td class="text-center" colspan="6">' +
                                        '<img src="{{ url() }}/assets/loader2.svg" style="width:120px"/>' +
                                    '</td>' +
                                '</tr>')
        $.ajax({
            url		: base_url + 'showData',
            data	: "",
            async	: true,
            dataType: 'json',
            success	: function(data){
                console.log(data)
                $("#bodyContent").empty()
                $("#bodyContent").hide()

                if(data.length > 0)
                {
                    for(isi in data)
                    {
                        var unit = data[isi].value_unit;
                        if(unit === 'cm')
                        {
                            unit = 'cm<sup>3</sup>';
                        }
                        $("#bodyContent").append(
                            '<tr class="row100 body">' +
                                '<td class="cell100 column2 text-center">EID#' + data[isi].id + '</td>' +
                                '<td class="cell100 column3 text-center">' + data[isi].vehicle_name + '</td>' +
                                '<td class="cell100 column4 text-center">' + data[isi].type_name + '</td>' +
                                '<td class="cell100 column5 text-center">' + data[isi].engine_displacement_value + ' ' + unit + '</td>' +
                                '<td class="cell100 column6 text-center">$ ' + data[isi].price + '</td>' +
                                '<td class="cell100 column7 text-center">' + data[isi].location + '</td>' +
                            '</tr>' 
                        ).fadeIn(1000)
                    }
                }
            }
        });

    }



</script>