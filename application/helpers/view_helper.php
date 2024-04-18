<?php


function upcomingBirthday($name,$birthdate,$profile_pic,$sponsored,$id){

    $bgclass = "";
    if($sponsored){
        $bgclass = "bg-pink-200";
    }

    return "<a href='profile/$id'><div class='profile-card 
    flex flex-col items-center 
    my-2 
    border-2 border-white 
    rounded-md $bgclass'
    style='width:250;'
        >

        <div class='card-innter p-4 '>

            <img src='assets/images/profile_pictures/$profile_pic' alt='Art1.jpg' width=230
            style='height:198px;'
            class='rounded-md'
            >
            <div class='inner-card text-center'>
                <h4>$name</h4>
                <h4>$birthdate</h4>
            </div>      

        </div>
    </div></a>";

}

function celebratedBirthdays($name,$birthdate,$profile_pic,$sponsored_by,$id){

    return "<a href='profile/$id'><div class='profile-card 
    flex flex-col items-center 
    my-2 
    border-2 border-white 
    rounded-md'
    style='width:250;'
    >

        <div class='card-innter p-4 '>

            <img src='assets/images/profile_pictures/$profile_pic' alt='Art1.jpg' width=230
            style='height:198px;'
            class='rounded-md'
            >
            <div class='inner-card text-center'>
                <h4>$name</h4>
                <h4>Smile Sponsored by $sponsored_by</h4> 
                <h4>$birthdate</h4>
            </div>      

        </div>
    </div></a>";
}



// home
