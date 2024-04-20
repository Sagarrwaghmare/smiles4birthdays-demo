

<section>
    <div class="recipient-table">
        
        <h2>Recipients</h2>

        <table class="w-full">
            <thead class=" bg-slate-200">
                <tr>
                    <th>Name</th>
                    <th>Birthdate</th>
                    <th  >Address</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    // var_dump($recipients);

                    foreach ($recipients as $key => $value) {
                        # code...

                        echo "
                        <tr>
                            <td>$value[name]</td>
                            <td>$value[birthdate]</td>
                            <td>$value[address]</td>
                            <td><a href='recipients/$value[id]'>View</a></td>
                            <td><a href='recipients/$value[id]'>Edit</a></td>
                        </tr>";


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
