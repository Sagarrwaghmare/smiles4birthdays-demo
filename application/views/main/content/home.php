<!-- <div class="bg-[#f5ab35]"> -->

<main class="mx-5 my-10  flex flex-col">


    <div class="video flex self-center 
    flex-col md:flex-row justify-center items-center "
    style="max-width: 800px;">
        <iframe width="400" height="250"
        src="https://www.youtube.com/embed/tgbNymZ7vqY">
        </iframe>
        <div class="about p-5 flex  flex-col ">
            <h2 class="text-center  font-semibold text-2xl my-5">About smiles4birthdays</h2>

                <p>CFTI weaves dreams into reality, offering wings to aspirations and breaking barriers that hinder progress. Through our multifaceted initiatives, we strive to make a difference in the society and leave those whom we serve with a trail of hope, empowerment and joy.</p>
                <!-- <p>We were established in 2009 and are registered under the Indian Trusts Act, 1882. Our trustees are young passionate individuals from diverse backgrounds. It includes an MD of a prominent newspaper, businessmen, and foreign-educated graduates. With a committed team of 700-plus volunteers, we primarily engage in the fields of education and women empowerment. We also undertake activities to alleviate poverty, and provide disaster-relief and medical aid, etc.</p> -->
                <p>CFTI boasts of a team of like-minded people who believe that change begins when individuals take responsibility for their fellow citizens and nation at large. We are committed to transforming rural India towards a better, healthier and happier tomorrow.</p>
        </div>
    </div>


    <div class="upcomingBirthdays flex flex-col justify-items-center items-center">
        <h2 class="text-center font-semibold text-2xl my-10">Upcoming Birthdays</h2>

        <div class="card-container grid sm:grid-cols-2 md:grid-cols-3 "
        style="max-width: 800px;"
        >

            <?php 
                $i=0;
                foreach ($upcoming_birthdays as $key => $value) {
                    if ($i == 6) {break;}
                    $i++;

                    echo upcomingBirthday($value['name'],changeToMonthlyFormate($value['birthdate']),$value['profile_pic'],$value['sponsored'],numhash($value['id']));
                }
            ?>

        </div>
            <div class="pagination-container my-4 px-4 justify-self-center sm:justify-self-start		">
                <div class="pagination">
                    <a href="upcoming"
                        class="view-more-btn
                        flex space-x-4
                        bg-[#f5ab35] text-white 
                        py-2 px-3 rounded-[5px]">
                        View More
                    </a>
                </div>
            </div>
        
        

    </div>











    
    <div class="upcomingBirthdays flex flex-col justify-items-center items-center">
        <h2 class="text-center  font-semibold text-2xl my-10">Celebrated Birthdays</h2>

        <div class="card-container grid sm:grid-cols-2 md:grid-cols-3 "
        style="max-width: 800px;"
        >
                
            <?php 
                $i=0;
                foreach ($celebrated_birthdays as $key => $value) {
                    if ($i == 3) {break;}
                    
                    echo celebratedBirthdays($value['name'],changeToMonthlyFormate($value['birthdate']),$value['profile_pic'],"Juluis Prapati",numhash($value['id']));
                    
                    $i++;
                }
            ?>

        </div>
            <div class="pagination-container my-4 px-4 justify-self-center sm:justify-self-start		">
                <div class="pagination">
                    <a href="celebrated"
                        class="view-more-btn
                        flex space-x-4
                        bg-[#f5ab35] text-white 
                        py-2 px-3 rounded-[5px]  ">
                        View More
                    </a>
                </div>
            </div>
        
        

    </div>

</main>

<!-- </div> -->
