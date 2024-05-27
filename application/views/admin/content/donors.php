<!-- <?php print_r($donors[0]);?> -->
<section>
    <div class="recipient-table">
        
        <h2 class="text-4xl font-semibold">Donors</h2>

        <table class="w-full">
            <thead class=" bg-slate-200">
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody id="donor-table-body">


                <?php foreach ($donors as $key => $value) {
                    
                    echo "<tr>
                            <td>$value[created_at]</td>
                            <td>$value[name]</td>
                            <td>$value[donation_amount]</td>
                            <td><a href=".base_url("admin/donors/$value[id]").">View</a></td>
                            <td><a href=".base_url("admin/donors/$value[id]").">Edit</a></td>
                        </tr>";
                }?>


            </tbody>
        </table>

        <div class="pagination-container my-4 px-4 justify-self-center sm:justify-self-start		">
            <div class="pagination">
                <ul class="flex space-x-4">
                    <!-- <li>First</li> -->
                    <!-- <li>Prev</li> -->
                    <li class="px-4 py-2 ">1</li>
                    <li class="px-4 py-2 ">2</li>
                    <li class="px-4 py-2 ">3</li>
                    <li class="px-4 py-2 ">Next</li>
                    <li class="px-4 py-2 ">Last</li>
                </ul>
            </div>
        </div>
        

    </div>

</section>

<script>
    $(document).ready(function () {
        let URL = $("#siteUrl").val()

        // let DATA = []

        // $.get("admin/fetch_donors", ,
        //     function (data, textStatus, jqXHR) {
                
        //     },
        //     "dataType"
        // );
        // console.log(DATA)

        // function fetchDonors(){
        //     $.get(URL+"api/fetch_donors", {},
        //         function (data, textStatus, jqXHR) {

        //             if(jqXHR.status == 200){
        //                 // console.log( textStatus, jqXHR.status);
        //                 let content = ""
        //                 for (const i of data) {
        //                     content +=  `<tr> \
        //                                     <td>${i.created_at}</td> \
        //                                     <td>${i.name}</td> \
        //                                     <td>${i.donation_amount}</td> \
        //                                     <td><a href="${URL}admin/donors/${i.id}">View</a></td> \
        //                                     <td><a href="${URL}admin/donors/${i.id}">Edit</a></td> \
        //                                 </tr>`
        //                 }
        //                 $("#donor-table-body").html(content);
        //             }
        //         },
        //         "json"
        //     );

        // }
        // fetchDonors()
    });
</script>