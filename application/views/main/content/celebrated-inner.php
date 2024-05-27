<div class="celebrated-birthday-card py-5 mx-5">
    <h2 class="text-2xl font-bold  text-center">Birthday Celebrated</h2>

    <div class="card flex flex-col sm:flex-row mx-5 items-center justify-center">
        <div class="img-container ">
            <img src="../assets/images/profile_pictures/<?=$data['profile_pic']?>" alt="" 
             class="w-[230px] h-[198px]">
        </div>
        <ul class="p-5  space-y-2">
            <li><?=$data['name']?></li>
            <li>Sponsored By <?=$donation_arr[0]['name']?></li>
            <li><span>Birthdate: <?=$data['birthdate']?></span> <span>Age: <?=calculateAge($data['birthdate'])?></span> <span>Residence: <?=$data['address']?></span></li>
            <li><span>Father Occupation: <?=$data['father_occupation']?></span> <span>Mother Occupation: <?=$data['mother_occupation']?></span></li>
            <li><span>Yearly Income: <?=$data['household_income']?></span> <span>Birthday Wish: <?=$data['wish']?></span></li>
            <li>Bio: <?=$data['bio']?></li>

        </ul>
    </div>


    <div class="celerated-photos flex mx-5 p-5 flex-col items-center justify-around  sm:flex-row">
        <iframe width="230" height="198"
            src="https://www.youtube.com/embed/tgbNymZ7vqY"
            class="p-2 ">
        </iframe>        


        <div class="img-slider-cover relative">

            <div class="img-slider flex flex-col w-full justify-center items-center sm:space-x-10 sm:flex-row main">

                <!-- <img src="../assets/images/profile_pictures/Art1.jpg"  data-imgName="Art1.jpg"  alt="" class="w-[230px] h-[198px] imgSlider" >
                <img src="../assets/images/profile_pictures/Art2.jpg"  data-imgName="Art2.jpg" alt="" class="w-[230px] h-[198px] imgSlider">
                <img src="../assets/images/profile_pictures/Art3.jpg"  data-imgName="Art3.jpg" alt="" class="w-[230px] h-[198px] imgSlider">
                <img src="../assets/images/profile_pictures/Art4.jpg"  data-imgName="Art4.jpg" alt="" class="w-[230px] h-[198px] imgSlider"> -->

                <?php 
                foreach ($birthday_photos_array as $key => $value) {
                    if($value != "index.html"){
                        echo "<img src='../assets/images/recipients/$data[birthday_photos]/celebration_photos/$value'  data-imgName='Art4.jpg' alt='' class='w-[230px] h-[198px] imgSlider'>";
                    }
                }
                ?>

            </div>

            <!-- <div class="btn absolute top-1/2"> -->
                <button id="prevbtn" class="bg-[gray] h-full top-0 p-2 opacity-40 font-bold text-2xl btn absolute ">&#8678;</button>
                
                <button id="nextbtn" class="bg-[gray] h-full top-0 p-2 opacity-40 font-bold text-2xl btn absolute right-0">&#8680;</button>
            <!-- </div> -->

        </div>

    </div>

</div>

<script>
    $(document).ready(() => {

        let getImageNames = () => {
            imgClasses = $(".imgSlider")
            let names = []

            for (const ele of imgClasses) {
                // names.push($(ele).attr('data-imgName'))
                names.push($(ele).attr('src'))
            }

            return names
        }
        let ImgNameArray = getImageNames()

        start = 0
        end = ImgNameArray.length - 1
        sliderEnd = end-1


        
        let globalImgNo = 0

        $("#prevbtn").click(function (e) { 
            if(globalImgNo > start){
                globalImgNo--
            }
            setImages(globalImgNo)
            console.log(globalImgNo);
        });
        
        $("#nextbtn").click(function (e) { 
            if(globalImgNo < sliderEnd){

                globalImgNo++
            }
            setImages(globalImgNo)
            console.log(globalImgNo);
        });

        function setImages(no){
            let con = ""
            let noplus = no++

            ImgNameArray.forEach((element,index) => {
                if(no == index || noplus == index){
                    con += "<img src='"+element+"' class='w-[230px] h-[198px] imgSlider' >"
                }
            });
            $(".main").html(con);
        }

        setImages(0)

        
        setInterval(() => {

            if(globalImgNo == end){
                globalImgNo = -1
            }

            if(globalImgNo < sliderEnd){
                globalImgNo++
            }
            
            setImages(globalImgNo)
            
        }, 3000);




        

        console.log(ImgNameArray)
    });
</script>
