<style>
    textarea,input{
        border:1px solid black;
        
    }
</style>

<?php 

?>

<main class="m-4">
    <h2 class="text-2xl font-bold text-center">Donate Now</h2>

    <form action="<?=base_url('main/process_donation_form')?>" method="POST"
    class="flex flex-col m-10 space-y-4">

        <label for="name" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Full Name: </h4>
            <input type="text" name="fullname" id="fullname" placeholder="" class="">
        </label>
        
        <label for="address" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Address: </h4>

            <textarea name="address" id="" cols="30" rows="5"></textarea>
        </label>

        <label for="contact" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Contact no: </h4>
            <input type="text" name="contact" id="contact" placeholder="">
        </label>

        <label for="email" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Email: </h4>
            <input type="text" name="email" id="email" placeholder="">
        </label>

        <label for="gender" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Gender: </h4>
            <!-- <input type="text" name="gender" id="gender" placeholder=""> -->
            <select name="gender" id="">
                <option value="MALE">Male</option>
                <option value="FEMALE">Female</option>
            </select>
        </label>
        
        <label for="donateTo" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Donate To: </h4>

            <select name="donationTo" id="donationTo" <?php if($default==0){ echo "";}?>>

                <?php 

            

                    if($default == 1){
                        // default

                        foreach ($non_sponsoreds as $key => $value) {
                            echo "<option value='".numhash($value['id'])."'>$value[name]</option>";
                        }
                        
                    }else{
                        // no default
                        $name = $recipient[0]['name'];
                        $id = $recipient[0]['id'];

                        echo "<option value='".numhash($id)."'>$name</option>";

                    }
                ?>

                <!-- <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option> -->
            </select>

        </label>

        
        <label for="donationAmount" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Donation: </h4>

            <div class="flex flex-col">

                <div>
                    <input type="radio" id="1000" name="donationAmount" value="1000">
                    <label for="1000">1000</label>
                </div>
                
                
                <div>
                    <input type="radio" id="2000" name="donationAmount" value="2000">
                    <label for="2000">2000</label>
                </div>
                
                <div>
                    <input type="radio" id="3000" name="donationAmount" value="3000">
                    <label for="3000">3000</label>
                </div>
                
                <!-- <input type="text" name="donationAmount" id="donationAmount" placeholder=""> -->
            </div>
            
        </label>
        
        <label for="pan" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Pan no: </h4>
            <input type="text" name="pan" id="pan" placeholder="">
        </label>

        <!-- <label for="tds" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Tds Status: </h4>
            <input type="text" name="tds" id="tds" placeholder="">
        </label> -->



        
        <label for="contactus" class="flex flex-col sm:flex-row">
            <h4 class="">If you want to sponsore more than 3 children please call us on +91 xxxxxxxx </h4>

            <!-- <input type="text" name="donationAmount" id="donationAmount" placeholder=""> -->
            
        </label>
        
        <label for="donationAmount" class="flex flex-col sm:flex-row">
            <h4 class="">Do you want to Video Call?</h4>

            <!-- <input type="text" name="donationAmount" id="donationAmount" placeholder=""> -->

                <div>
                    <input type="radio" id="3000" name="attendBirthday" value="1">
                    <label for="yes">Yes</label>
                </div>
                
                <div>
                    <input type="radio" id="3000" name="attendBirthday" value="0">
                    <label for="no">No</label>
                </div>
            
            
        </label>
        
        <label for="donationAmount" class="flex flex-col sm:flex-row">
            <h4 class="">Do you want to disclose your identity on our website/social media? </h4>

            <!-- <input type="text" name="donationAmount" id="donationAmount" placeholder=""> -->

            
                <div>
                    <input type="radio" id="3000" name="discloseIdentity" value="1">
                    <label for="yes">Yes</label>
                </div>
                
                <div>
                    <input type="radio" id="3000" name="discloseIdentity" value="0">
                    <label for="no">No</label>
                </div>
            
        </label>


        <div >
            <input class="donate-btn bg-[#f5ab35] text-white 
            py-2 px-3 rounded-[5px]"
            type="submit" value="Donate">
        </div>

        


    </form>
</main>


