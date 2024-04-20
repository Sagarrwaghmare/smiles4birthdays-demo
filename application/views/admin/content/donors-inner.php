<!-- <?php var_dump("sass");?> -->
<style>
    textarea,input{
        border:1px solid black;
    }
</style>


<section>
    
    <form action="" method="POST"
        class="flex flex-col m-10 space-y-4">

        <label for="name" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Donor's Name: </h4>
            <input type="text" name="fullname" id="fullname" placeholder="" class="">
        </label>

        
        <label for="donationdate" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Date of Donation: </h4>
            <input type="date" name="donationdate" id="donationdate" placeholder="" class="">
        </label>
        
        <label for="address" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Address: </h4>
            <textarea name="address" id="" cols="30" rows="5"></textarea>
        </label>

        <label for="city" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">City: </h4>
            <input type="text" name="city" id="city" placeholder="" class="">
        </label>

        <label for="Contact" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Contact: </h4>
            <input type="number" name="Contact" id="Contact" placeholder="" class="">
        </label>
        

        <label for="email" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Email: </h4>
            <input type="email" name="email" id="email" placeholder="" class="">
        </label>
        
        <label for="donationfor" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Donation For: </h4>
            <input type="text" name="donationfor" id="donationfor" placeholder="" class="">
        </label>
        
        <label for="amount" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Amount: </h4>
            <input type="text" name="amount" id="amount" placeholder="" class="">
        </label>

        
        <label for="noofdonation" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">No of donation: </h4>
            <input type="text" name="noofdonation" id="noofdonation" placeholder="" class="">
        </label>

        <!-- SPONSORED -->
        <label for="discloseidentity" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Disclose Identity: </h4>
            
            <label for="" class="flex  items-center">
                <p>Yes</p>
                <input type="radio" name="discloseidentity" id="discloseidentity" value="1" >
            </label>

            <label for="" class="flex  items-center">
                <p>No</p>
                <input type="radio" name="discloseidentity" id="discloseidentity" value="0" >
            </label>

        </label>

        <label for="attendbirthday" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Attend Birthday: </h4>
            
            <label for="" class="flex  items-center">
                <p>Yes</p>
                <input type="radio" name="attendbirthday" id="attendbirthday" value="1" >
            </label>

            <label for="" class="flex  items-center">
                <p>No</p>
                <input type="radio" name="attendbirthday" id="attendbirthday" value="0" >
            </label>

        </label>

        

        
        <!-- PHOTOS -->
        <label for="photo" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Photo: </h4>
            <input type="text" name="photo" id="photo" placeholder="" class="">
        </label>

        
        
        <label for="panno" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Pan No: </h4>
            <input type="text" name="panno" id="panno" placeholder="" class="">
        </label>

        
        <label for="tdsstatus" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Tds Status: </h4>

            <label for="" class="flex  items-center">
                <p>Yes</p>
                <input type="radio" name="tdsstatus" id="tdsstatus" value="1" >
            </label>

            <label for="" class="flex  items-center">
                <p>No</p>
                <input type="radio" name="tdsstatus" id="tdsstatus" value="0" >
            </label>

        </label>


        
        <label for="Buttons" class="flex flex-col sm:flex-row">
            <!-- <button class="">Edit</button> -->
            <button class="">Delete</button>
            <button class="">Save</button>
        </label>
        

    </form>

</section>