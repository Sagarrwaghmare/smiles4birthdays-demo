<main class="flex flex-col justify-center items-center bg-slate-500" style="height:100vh;width:100vw;">

<form action="<?=base_url('main/process_login')?>" method="post" class="flex flex-col w-fit p-5 space-y-4 rounded-md bg-slate-400">
    <div class="title text-2xl font-semibold rounded-md text-center">
        <h2>Admin Login</h2>
    </div>
        <input type="text"   placeholder="Enter Username" name="username" class="p-2 w-[300px] rounded-md">
        <input type="text"   placeholder="Enter Password" name="password" class="p-2 w-[300px] rounded-md">
        <input type="submit" value="Login" class="p-2 w-[300px] rounded-md cursor-pointer border-2 border-slate-500 hover:bg-slate-500 hover:text-white">
    </form>
</main>