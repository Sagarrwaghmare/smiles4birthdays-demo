<!-- <div class="bg-[#f5ab35]"> -->

<main class="mx-5 my-10  flex flex-col">


    <div class="video flex self-center 
    flex-col md:flex-row justify-center items-center
"
    style="max-width: 800px;">
        <iframe width="300" height="200"
        src="https://www.youtube.com/embed/tgbNymZ7vqY">
        </iframe>
        <div class="about p-5">
            <h2 class="text-center">About smiles4birthdays</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores perspiciatis architecto dolor sapiente beatae nemo deserunt unde expedita natus libero debitis consequuntur porro laborum, voluptas iste! Temporibus, obcaecati inventore. Minus officiis dignissimos obcaecati iure quos nam, aut id sapiente! Impedit?</p>
        </div>
    </div>


    <div class="upcomingBirthdays flex flex-col justify-items-center items-center">
        <h2 class="text-center">Upcoming Birthdays</h2>

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
                        class="flex space-x-4">
                        View More
                    </a>
                </div>
            </div>
        
        

    </div>











    
    <div class="upcomingBirthdays flex flex-col justify-items-center items-center">
        <h2 class="text-center">Celebrated Birthdays</h2>

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
                        class="flex space-x-4">
                        View More
                    </a>
                </div>
            </div>
        
        

    </div>

</main>

<!-- </div> -->
