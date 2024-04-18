<div class="upcoming-birthday-card py-5">

    <h2 class="heading font-bold text-2xl text-center">Upcoming Birthdays</h2>

    <div class="card flex flex-col sm:flex-row justify-center items-center py-5">
        <div class="image-slider max-w-[408px] h-[230px] sm:w-[408px]" 
            style="">

            <img src="../assets/images/profile_pictures/Art1.jpg" alt=""
                style="width:100%;height:100%;"
                class="">
        </div>

        <ul class="p-5">
            <li><?=$data['name']?></li>
            <li class=" space-x-3"><span>Birthdate: <?=$data['birthdate']?></span><span>Age: <?=calculateAge($data['birthdate'])?></span></li>
            <li>Residence: <?=$data['address']?></li>
            <li>Father's Occupation: <?=$data['father_occupation']?></li>
            <li>Mother Occupation: <?=$data['mother_occupation']?></li>
            <li>Yearly Income: <?=$data['household_income']?></li>
            <li>Birthday Wish: <?=$data['wish']?></li>
            <li class=" my-3 ">
                <a href="../donate/<?=numhash($data['id'])?>"
                    class=" bg-slate-200  p-2 "
                    >Donate</a>
            </li>
            
        </ul>
    </div>
</div>
