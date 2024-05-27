<style>
    .pagination ul button{
        background-color:orange;
        border: 1px solid black;
        padding: 5px 10px;
        margin:0px 5px;
    }
</style>

<section>
    <div class="recipient-table">
        
        <h2 class="text-4xl font-semibold">Recipients</h2>


        <table class="w-full">
            <thead class=" bg-slate-200">
                <tr>
                    <th>Name</th>
                    <th>Birthdate</th>
                    <th>Address</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <?php 

                     foreach ($recipients as $key => $value) {
                        # code...

                        // echo "
                        // <tr>
                        //     <td>$value[name]</td>
                        //     <td>$value[birthdate]</td>
                        //     <td>$value[address]</td>
                            
                        //     <td><a href='recipients/$value[id]'>View</a></td>
                        //     <td><button class='delete-recipient-btn' data-id='$value[id]' data-unique-key='$value[profile_pic]' id='delete-recipient-btn'>Delete</button></td>

                        //     </tr>";

                     }
                ?>
                <!-- <tr>
                    <td>Name</td>
                    <td>Birthdate</td>
                    <td>Address</td>
                    <td>View</td>
                    <td>Edit</td>
                </tr> -->

            </tbody>
        </table>

        <div class="pagination-container my-4 px-4 justify-self-center sm:justify-self-start ">
            <div class="pagination">
                <ul class="flex pagination-nav">
                    
                    <li class="px-4 py-2"><button id="firstPaginationBtn">First</button></li>
                    <li class="px-4 py-2" ><button   id="prevPaginationBtn">Prev</button></li>
                    <li class="px-4 py-2 ">1</li>
                    <li class="px-4 py-2 ">2</li>
                    <li class="px-4 py-2 ">3</li>
                    <li class="px-4 py-2" ><button id="nextPaginationBtn">Next</button></li>
                    <li class="px-4 py-2"><button id="lastPaginationBtn">Last</button></li>
                </ul>
            </div>
        </div>
        

    </div>

</section>


<script>
    $(document).ready(function () {
        let URL = $("#siteUrl").val()
        

        let arr = []
        $.ajax({
            'async': false,
            'type': "GET",
            'global': false,
            'dataType': 'json',
            'url': URL+"api/fetch_recipients_desc",
            'data': {},
            'success': function (data) {
                arr = data;
            }
        });
        let TotalRecords = arr.length
        const PerPage = 10
        const Pages = Math.ceil(TotalRecords/PerPage)

        const StartPage = 0
        const EndPage = Pages - 1
        let CurrentPageNo = 0
        console.log(TotalRecords,PerPage,Pages,StartPage,EndPage);
            


        
        
        function displayPaginationBtns(){
            // CurrentPageNo
            // .pagination-nav
            $(".pagination-nav").html("");
                
            // <button class="pagination-btns" id="firstPaginationBtn">First</button>
            // <button class="pagination-btns" id="prevPaginationBtn">Prev</button>
            // <button class="pagination-btns numberPaginationBtn" id="noPaginationBtn" data-num="1">1</button>
            // <button class="pagination-btns" id="nextPaginationBtn">Next</button>
            // <button class="pagination-btns" id="lastPaginationBtn">Last</button>

            // 1 first
            if(CurrentPageNo != StartPage){

                if(CurrentPageNo != StartPage +1){
                    $(".pagination-nav").append(`<button class="pagination-btns" id="firstPaginationBtn">First</button>`);
                }
            
            // 2 prev
                $(".pagination-nav").append(`<button class="pagination-btns" id="prevPaginationBtn">Prev</button>`);
            }
            
            // 3 number
            // first, last, middle
            for (let i = StartPage; i <= EndPage; i++) {
                let disableElement = ""
                if(i == CurrentPageNo){
                    // disableElement = 
                    disableElement = "text-white"
                }
                let minRange = CurrentPageNo - 2
                let maxRange = CurrentPageNo + 2
                
                if(i > minRange && i < maxRange){
                    $(".pagination-nav").append(`<button class="pagination-btns numberPaginationBtn ${disableElement}" id="noPaginationBtn" data-num="${i}">${i+1}</button>`); 
                }
            }

            // next

            if(CurrentPageNo != EndPage){
                $(".pagination-nav").append(`<button class="pagination-btns" id="nextPaginationBtn">Next</button>`);

            // last
                if(CurrentPageNo != EndPage - 1){
                    $(".pagination-nav").append(`<button class="pagination-btns" id="lastPaginationBtn">Last</button>`);
                }
            }

            
            // if(Pages == 1){$(".pagination-nav").html("")}
        }
        
        function displayRecords(){
            $("tbody").html("");
            let pageStart = CurrentPageNo * PerPage
            let pageEnd = (CurrentPageNo * PerPage) + PerPage

            if(CurrentPageNo < StartPage || CurrentPageNo > EndPage){
                return 0
            }


            $.get(URL+"api/fetch_recipients_desc", {},
                function (data, textStatus, jqXHR) {
                    
                    for (let i = pageStart; i < pageEnd; i++) {
                        // if(arr.length > i){
                            content = `
                            <tr>
                                <td>${data[i].name}</td>
                                <td>${data[i].birthdate}</td>
                                <td>${data[i].address}</td>
                                <td><a href='recipients/${data[i].id}'>View</a></td>
                                <td><button class='delete-recipient-btn' data-id='${data[i].id}' data-unique-key='${data[i].profile_pic}' id='delete-recipient-btn'>Delete</button></td>
                            </tr>`
                            $("tbody").append(content);

                        // }
                    }    
                },
                "json"
            ); 

            

            displayPaginationBtns()
            
            return 1
        }

    // PAGINATION BTNS
        $(".pagination-nav").on("click","#nextPaginationBtn",function (e) { 
            e.preventDefault();
            CurrentPageNo++
            console.log(CurrentPageNo);
            displayRecords()
        });
            
        $(".pagination-nav").on("click","#prevPaginationBtn",function (e) { 
            e.preventDefault();
            CurrentPageNo--
            console.log(CurrentPageNo);
            displayRecords()
        });

        $(".pagination-nav").on("click","#lastPaginationBtn",function (e) { 
            e.preventDefault();
            CurrentPageNo = EndPage
            console.log(CurrentPageNo);
            displayRecords()
        });

        
        $(".pagination-nav").on("click","#firstPaginationBtn",function (e) { 
            e.preventDefault();
            CurrentPageNo = StartPage
            console.log(CurrentPageNo);
            displayRecords()
        });


        $(".pagination-nav").on("click",".numberPaginationBtn",function (e) { 
            e.preventDefault();
            let dataNum = $(this).attr('data-num')
            CurrentPageNo = Number(dataNum)
            console.log(CurrentPageNo);
            displayRecords()
        });
    // PAGINATION BTNS

        displayRecords()
        
        
    // DELETE RECIPIENT
        $("#table-body").on("click",".delete-recipient-btn", function (e) {
            e.preventDefault()
            let flag = window.confirm("Are you sure you want to delete this record?")
            
            let id = $(this).attr('data-id')
            let unique_key = $(this).attr('data-unique-key')
            console.log(flag,URL,id,unique_key)

            if(flag){
                $.get(URL+"api/delete_recipient"+"/"+id+"/"+unique_key,
                    function (data, textStatus, jqXHR) {
                      console.log(data);  
                    },
                );

                // fetchAllRecipients(offset,perPage)
                // fetchAllRecipients(offset,perPage)
                // hidePaginationBtnsEvent()
                displayRecords()
                displayRecords()
            } 
        });
    // SHOW FORM
    // $("#display-add-form").click(function (e) { 
    //     e.preventDefault();
        
    //     $(".add-recipient-form").toggle();

    //     if($(this).attr('data-id') == 1){

    //         $(this).attr('data-id', 0);
    //         $('#display-add-form').text("Close");

    //     }else{
    //         $(this).attr('data-id', 1)
    //         $('#display-add-form').text("Add Recipients");

    //     }
    // }); 
    // END




    })
</script>