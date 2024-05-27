
<div class="add-recipient my-4">
            <!-- <button id="display-add-form" data-id="1"
            class="p-2 border-2 border-blue-600 rounded-md text-blue-600 bg-white
            hover:bg-blue-600 hover:text-white">Add Recipients</button> -->

            <form action="<?=base_url("admin/add_recipient")?>" method="post" enctype="multipart/form-data"
                class="add-recipient-form grid sm:grid-cols-2 grid-cols-1" style="">
    


                <input type="text" name="name" placeholder="Enter Name" 
                class="mx-2 my-2 p-2 rounded-sm ">
                <input type="text" name="address" placeholder="Enter Address" 
                class="mx-2 my-2 p-2 rounded-sm ">
                <input type='text' name='email' placeholder='Enter Email' 
                class="mx-2 my-2 p-2 rounded-sm ">
                
                <input type='text' name='gender' placeholder='Enter Gender' 
                class="mx-2 my-2 p-2 rounded-sm ">

                <input type='text' name='father_occputation' placeholder="Enter Father's occputation" 
                class="mx-2 my-2 p-2 rounded-sm ">
                <input type='text' name='mother_occupation' placeholder="Enter Mother's occupation" 
                class="mx-2 my-2 p-2 rounded-sm ">
                <input type='text' name='household_income' placeholder='Enter Household income' 
                class="mx-2 my-2 p-2 rounded-sm ">
                <input type='text' name='contact' placeholder='Enter Contact' 
                class="mx-2 my-2 p-2 rounded-sm ">
                <input type='date' name='birthdate' placeholder='Enter Birthdate' 
                class="mx-2 my-2 p-2 rounded-sm ">
                <input type='text' name='wish' placeholder='Enter Wish' 
                class="mx-2 my-2 p-2 rounded-sm ">


                <div class="">
                    <div class=" text-red-400 mx-2 my-2">
                        <?php print_r($this->session->flashdata('FileForm'));?>
                    </div>

                    <input type="file" name="profile_pic" placeholder='Enter Profile Pic'
                    class="mx-2 my-2 p-2 rounded-sm">
                </div>
                
                <input type="submit" value="Add" 
                class="mx-2 my-2 p-2 rounded-sm ">
            </form>
        </div>