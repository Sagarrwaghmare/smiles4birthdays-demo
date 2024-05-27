<?php


function upcomingBirthday($name,$birthdate,$profile_pic,$sponsored,$id){

    $bgclass = "";
    $smilesSponsored = "";
    if($sponsored){
        // $bgclass = "bg-[#f5ab35]";
        $bgclass = "bg-pink-200";
        $smilesSponsored = "Smile Sponsored";
    }

    
    $name = explode(" ",$name);
    $name = $name[0];

    return "<div class='upcoming-birthday-card' data-id='$id'><a href='".base_url("profile/$id")."' class='flex justify-center '><div class='profile-card 
    flex flex-col items-center 
    my-2 
    border-2 border-white 
     $bgclass'
    style='border:1px solid gray;'
        >

        <div class='card-innter  flex flex-col justify-center items-center'>

            <img src='".base_url("assets/images/profile_pictures/".$profile_pic)."' alt='$profile_pic' width=230
            style='height:250px;width:350px;'
            class=' py-3 px-2'
            >
            <div class='inner-card text-center my-3 h-[50px]'>
                <div class='flex flex-row justify-center  text-xl text-[#f5ab35] font-semibold'>
                    <h4>$name - &nbsp;</h4>
                    <h4>$birthdate</h4>
                </div>
                <h4 class=' text-md text-[#f5ab35] font-semibold' >$smilesSponsored</h4>
                
            </div>      

        </div>
    </div></a></div>";

}

function celebratedBirthdays($name,$birthdate,$profile_pic,$sponsored_by,$id){

    $name = explode(" ",$name);
    $name = $name[0];
    return "<div class='celebrated-birthday-card' data-id='$id'><a href='".base_url("profile/$id")."' class='flex justify-center'><div class='profile-card 
    flex flex-col items-center 
    my-2 
    border-2 border-white 
    '
    style='border:1px solid gray;'
    >

        <div class='card-innter  flex flex-col justify-center items-center'>

            <img src='".base_url("assets/images/profile_pictures/".$profile_pic)."' alt='$profile_pic' width=230
            style='height:250px;width:350px;'
            class=' py-3 px-2'
            >
            <div class='inner-card text-center my-3'>
                <div class='flex flex-row justify-center  text-xl text-[#f5ab35] font-semibold'>
                    <h4>$name - &nbsp;</h4>
                    <h4>$birthdate</h4>
                </div>
                <h4 class='text-gray-400'>Smile Sponsored by $sponsored_by</h4> 
            </div>      

        </div>
    </div></a></div>";
}


function divideDataByOffset(&$arr,$offset,$limit){
    $output = array_slice($arr,$offset,$limit);

    return $output;
}


function idToNameDonations(&$arr,$id){
    $row = $arr[$id];
    return $row['name'];
}


// home
