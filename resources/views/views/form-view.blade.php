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
									<th class="cell100 column1">Engine ID</th>
									<th class="cell100 column2 text-center">Name</th>
                                    <th class="cell100 column3 text-center">Type</th>
                                    <th class="cell100 column4 text-center">Displacement Value</th>
									<th class="cell100 column5 text-center">Price</th>
									<th class="cell100 column6 text-center">Location</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
								<tr class="row100 body">
									<td class="cell100 column1">Like a butterfly</td>
									<td class="cell100 column2">Boxing</td>
									<td class="cell100 column3">9:00 AM - 11:00 AM</td>
									<td class="cell100 column4">Aaron Chapman</td>
                                    <td class="cell100 column5">10</td>
                                    <td class="cell100 column5">10</td>
                                </tr>
                                <tr class="row100 body">
									<td class="cell100 column1">Like a butterfly</td>
									<td class="cell100 column2">Boxing</td>
									<td class="cell100 column3">9:00 AM - 11:00 AM</td>
									<td class="cell100 column4">Aaron Chapman</td>
                                    <td class="cell100 column5">10</td>
                                    <td class="cell100 column5">10</td>
                                </tr>
                                <tr class="row100 body">
									<td class="cell100 column1">Like a butterfly</td>
									<td class="cell100 column2">Boxing</td>
									<td class="cell100 column3">9:00 AM - 11:00 AM</td>
									<td class="cell100 column4">Aaron Chapman</td>
                                    <td class="cell100 column5">10</td>
                                    <td class="cell100 column5">10</td>
                                </tr>
                                <tr class="row100 body">
									<td class="cell100 column1">Like a butterfly</td>
									<td class="cell100 column2">Boxing</td>
									<td class="cell100 column3">9:00 AM - 11:00 AM</td>
									<td class="cell100 column4">Aaron Chapman</td>
                                    <td class="cell100 column5">10</td>
                                    <td class="cell100 column5">10</td>
								</tr>
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
                    <form action="" method="POST" encypt="multipart" class=>
                        <div class="form-group">
                            <label>Vehicle Name</label>
                            <input type="text" class="form-input" name="vname" value="" placeholder="Toyota Pajero" required/>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select name="vtype">
                                <option value="1">Cars</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Engine Displacement Value</label>
                            <div class=""> 
                                <div class="col-xs-8" style="display:inline-block;flex-row:row wrap;">
                                    <input type="text" class="form-input" name="enDisVal" value="" placeholder="" required/>
                                </div>
                                <div class="col-xs-4" style="display:inline-block">
                                    <select name="vUnit" style="width:100%">
                                        <option value="1">CC</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Engine Power (HP)</label>
                            <input type="number" class="form-input" name="enPower" value="" placeholder="250" min="0" required/>
                        </div>
                        <div class="form-group">
                            <label>Price ($)</label>
                            <input type="number" class="form-input" name="price" value="" placeholder="3000" min="0" required/>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <textarea name="location"></textarea>
                        </div>
                        

                        <input type="submit" value="Add">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    
    // CANCEL
    document.addEventListener("DOMContentLoaded", function(event) { 

        getList();

    });

    function getList()
    {
        let base_url = '{{ url() }}' + '/'
        var xhttp = new XMLHttpRequest();
        
        xhttp.open("GET", base_url + 'showData', true);
        xhttp.send();
        xhttp.onload = function() {
            console.log(xhttp)

            if(this.readyState == 4 && this.status == 200)
            {
                if(JSON.parse(this.response) != null)
                {
                    // NGEBALIKIN DATA KE HTML
                }

            } else {
                alert('failed get list data');
            }
        }

    }



</script>