<section>
    <div class="filter">
        Filters
        
    <div class="filters">
        <?php 
            $url = $_SERVER['REQUEST_URI'];
            $url = explode('/',$url);
            $month = array_pop($url);
            $year = array_pop($url);
            // print_r($year);
        ?>  
        <input type="text" id="inputYear"  value="<?=$year?>"  hidden>
        <input type="text" id="inputMonth" value="<?=$month?>" hidden>

        <div class="datefilterdiv">
            Date:
            <input type="date" name="startdate" id="startdate">
            to:
            <input type="date" name="enddate" id="enddate">
        </div>
        <div class="genderfilterdiv">
            <label for="genderfilter">Gender: </label>
            <select name="genderfilter" id="genderfilter">
                <option value="0">All</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        
        <div class="cityfilter">
            <label for="cityfilter">City: </label>
            <select name="cityfilter" id="cityfilter">
                <option value="0">All</option>
                <option value="mumbai">Mumbai</option>
                <option value="pune">Pune</option>
            </select>
        </div>

        <button id="filterbtn">Filter</button>
        <button id="refresh">Refresh</button>
    </div>  
    </div>

    <!-- <pre> -->
    <!-- <?php print_r($donation[0]);?> -->
    <div class="content">

        <table class="content w-full">
            <thead class="bg-slate-200">
                <tr>
                    <td>Date</td>
                    <td>Name</td>
                    <td>Gender</td>
                    <td>City</td>
                    <td>Recipients</td>
                    <td>Amount</td>
                    <td colspan=1>Action</td>
                </tr>
            </thead>
            <tbody>


                <?php foreach ($donation as $key => $value) {
                    
                    echo 
                    "<tr>
                        <td>$value->donation_date</td>
                        <td>$value->name</td>
                        <td>$value->gender</td>
                        <td>$value->city</td>
                        <td>$value->donated_for</td>
                        <td>$value->amount</td>
                        <td><a href='".base_url("admin/recipients/$value->donated_for")."'>View</a></td>
                    </tr>";

                }?>

            </tbody>
        </table>
        Content
    </div>
</section>


<script>
    $(document).ready(function () {
        let URL = $("#siteUrl").val()


        
    // FILTERS
    $("#refresh").click(function (e) { 
        e.preventDefault();
        window.location.reload()
    });
    $("#filterbtn").click(function (e) { 
            e.preventDefault();

            let currYear = $("#inputYear").val();
            let currMonth = $("#inputMonth").val();


            let gender = $("#genderfilter").val();
            let startdate = $("#startdate").val();
            let enddate = $("#enddate").val();
            let city = $("#cityfilter").val();

            console.log(gender,startdate,enddate == "")
            if(startdate == ""){
                startdate = 0
            }
            if(enddate == ""){
                enddate = 0
            }

            $.post(URL+"api/fetch_donations_by_year_filter/", {start:startdate,end:enddate,gender:gender,city:city,currYear:currYear,currMonth:currMonth},
                function (data, textStatus, jqXHR) {
                    console.log(data);

                    $("tbody").html("");

                    for (const i of data) {
                        content = `<tr>
                            <td>${i.donation_date}</td>
                            <td>${i.name}</td>
                            <td>${i.gender}</td>
                            <td>${i.city}</td>
                            <td>${i.donated_for}</td>
                            <td>${i.amount}</td>
                            <td><a href='".base_url("admin/recipients/${i.donated_for}")."'>View</a></td>
                        </tr>`
                        $("tbody").append(content);
                    }

                },
                "json"
            );
            
        });
    // FILTERS
    });
</script>