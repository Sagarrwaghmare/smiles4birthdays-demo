<style>
    /* Pagination Style */

    .pagination ul a,strong{
        padding:10px 15px;
        border-radius:4px;

        display: flex;
        justify-content:center;
        align-items:center;

        font-size:18px;
    }
    
    .pagination ul a{
        background-color:#f5ab35;
        color:white;
    }

    .pagination ul strong{
        color:#f5ab35;
        border: 2px solid #f5ab35;
    }

    .pagination ul a:hover,.donate-btn:hover,.view-more-btn:hover{
        color: #000;
        box-shadow:  2px 2px black;
    }
</style>

<head>
    <title><?php echo $page_title;?></title>
</head>


<nav class="flex md:flex-row flex-col items-center justify-around">
    <a href="<?=base_url()?>">
        <img src="<?=base_url('assets/images/website-images/CFTI_LOGO.png')?>" alt="cfti logo" 
        width=170
        class="
        "
        >
    </a>

    
    <ul class="flex flex-col md:flex-row 
        justify-center items-center
        mx-20 my-10 space-x-6
        text-center
      ">

        <li class="my-1 text-md font-semibold hover:text-[#f5ab35]"> <a href="#">About Smiles4Birthdays</a> </li>
        <li class="my-1 text-md font-semibold hover:text-[#f5ab35]"> <a href="<?=base_url()?>">How it works</a> </li>
        <li class="my-1 text-md font-semibold hover:text-[#f5ab35]"> <a href="<?=base_url('upcoming')?>">Upcoming Birthdays</a></li>
        <li class="my-1 text-md font-semibold hover:text-[#f5ab35]"> <a href="<?=base_url('celebrated')?>">Birthdays Celebrated</a></li>
        
        <li class="my-5 sm:my-1">            
            <a href="<?=base_url('donate')?>"
            class="donate-btn bg-[#f5ab35] text-white 
            py-3 px-3 rounded-[5px] w-[120px] inline-block
            ">Donate Now</a>
        </li>
    </ul>
</nav>

