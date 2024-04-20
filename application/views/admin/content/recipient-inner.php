<!-- <?php var_dump($recipient);?> -->
<style>
    textarea,input{
        border:1px solid black;
    }
</style>


<section>
    
    <form action="" method="POST"
        class="flex flex-col m-10 space-y-4">

        <label for="name" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Full Name: </h4>
            <input type="text" name="fullname" id="fullname" placeholder="" class="">
        </label>

        
        <label for="birthdate" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Birthdate: </h4>
            <input type="date" name="birthdate" id="birthdate" placeholder="" class="">
        </label>
        
        <label for="address" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Address: </h4>
            <textarea name="address" id="" cols="30" rows="5"></textarea>
        </label>


        <label for="Contact" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Contact: </h4>
            <input type="number" name="Contact" id="Contact" placeholder="" class="">
        </label>
        
        <label for="income" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Income: </h4>
            <input type="number" name="income" id="income" placeholder="" class="">
        </label>

        <label for="fatheroccupation" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Father Occupation: </h4>
            <input type="text" name="fatheroccupation" id="fatheroccupation" placeholder="" class="">
        <!-- </label>
        
        <label for="motheroccupation" class="flex flex-col sm:flex-row"> -->
            <h4 class="w-[100px]">Mother Occupation: </h4>
            <input type="text" name="motheroccupation" id="motheroccupation" placeholder="" class="">
        </label>
        
        <label for="wish" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Wish: </h4>
            <input type="text" name="wish" id="wish" placeholder="" class="">
        </label>

        <!-- SPONSORED -->
        <label for="sponsored" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Sponsored: </h4>
            
            <label for="" class="flex  items-center">
                <p>Yes</p>
                <input type="radio" name="sponsored" id="sponsored" value="1" >
            </label>

            <label for="" class="flex  items-center">
                <p>No</p>
                <input type="radio" name="sponsored" id="sponsored" value="0" >
            </label>

        </label>

        
        <label for="sponsoredby" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Sponsored By: </h4>
            <input type="text" name="sponsoredby" id="sponsoredby" placeholder="" class="">
        </label>

        
        <!-- PHOTOS -->
        <label for="displayphoto" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Display Photo: </h4>
            <input type="text" name="displayphoto" id="displayphoto" placeholder="" class="">
        </label>

        
        <label for="UpcomingPhoto" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Upcoming Photo: </h4>
            <input type="text" name="UpcomingPhoto" id="UpcomingPhoto" placeholder="" class="">
        </label>

        
        <label for="BirthdayPhoto" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Birthday Photo: </h4>
            <input type="text" name="BirthdayPhoto" id="BirthdayPhoto" placeholder="" class="">
        </label>

        
        <label for="videolink" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Video Link: </h4>
            <input type="text" name="videolink" id="videolink" placeholder="" class="">
        </label>

        
        <label for="display" class="flex flex-col sm:flex-row">
            <h4 class="w-[100px]">Display on website: </h4>

            <label for="" class="flex  items-center">
                <p>Yes</p>
                <input type="radio" name="display" id="display" value="1" >
            </label>

            <label for="" class="flex  items-center">
                <p>No</p>
                <input type="radio" name="display" id="display" value="0" >
            </label>

        </label>


        
        <label for="Buttons" class="flex flex-col sm:flex-row">
            <!-- <button class="">Edit</button> -->
            <button class="">Delete</button>
            <button class="">Save</button>
        </label>
        

    </form>

</section>