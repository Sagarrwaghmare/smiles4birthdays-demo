<head>
    <title><?php echo $page_title;?></title>
</head>
<style>
    table,tr,td,thead,tbody,th{
        border:1px solid black;
    }
    textarea,input{
        border:1px solid black;
    }
    tr:hover{
        background: darkgray;
        color:white
    }
    body{
        background: var(--dashboardMain );
        height:100vh;
    }
</style>

<nav class="flex items-center justify-start bg-[var(--dashboardNav)]">     

    <div class="sm:w-1/6 bg-[var(--dashboardNav)]">
        <!-- <div class="logo "> -->
            
            <a href="<?=base_url();?>">
                <img src="<?=base_url('assets/images/website-images/smiles4birthday_logo.png')?>" alt="smiles4birthdays Logo" width=200
                class="rounded-full p-2">
            </a>
        <!-- </div> -->
    </div>

    <div class="options w-full flex items-center justify-end  bg-[var(--dashboardNav)] space-x-2">
        <h2 class="text-3xl font-semibold">Dashboard</h2>
        <a href="<?=base_url('main/logout')?>" class="">
            Sign Out
        </a>
    </div>
</nav>




        
      