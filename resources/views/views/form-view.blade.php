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
                <h2>List Vehicle</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>EngineId</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Type</th>
                        <th>Type</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4 col-xs-12 form-section">
            <span style="text-align:center;margin-top:20px">Bagian Form</span>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    
    // CANCEL
    // document.addEventListener("DOMContentLoaded", function(event) { 

    //     getList();

    // });

    // function getList()
    // {
    //     let base_url = '{{ url() }}' + '/'
    //     var xhttp = new XMLHttpRequest();
        
    //     xhttp.open("GET", base_url + 'showData', true);
    //     xhttp.send();
    //     xhttp.onload = function() {
    //         console.log(xhttp)

    //         if(this.readyState == 4 && this.status == 200)
    //         {
    //             if(JSON.parse(this.response) != null)
    //             {
    //                 // NGEBALIKIN DATA KE HTML
    //             }

    //         } else {
    //             alert('failed get list data');
    //         }
    //     }

    // }



</script>