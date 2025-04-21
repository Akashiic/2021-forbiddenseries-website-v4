<?php

session_start();

?>

<head>
    <title>User Manage Modal</title>
</head>

<style>
    body{
        background-image: url("");
        width: 100%;
        height: 100%;
    }

    .usermanage-flash-interface{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.5);
    }

    .exit-interface{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: transparent;
    }

    .usermanage-flash-interface-modal{
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 600px;
        height: 400px;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 6px;
        box-shadow: 4px 4px;
    }

    .avatar-usermanage-target{
        position: relative;
        width: 100%;
        height: 100%;
    }

    .avatar-usermanage-target img{
        position: relative;
        border-radius: 50%;
        width: 130px;
        height: 130px;
        left: 50%;
        top: -65px;
        transform: translate(-50%);
    }

    .avatar-usermanage-target h1{
        position: absolute;
        font-family:Verdana, Geneva, Tahoma, sans-serif;
        left: 50%;
        top: 45px;
        transform: translate(-50%);
        -webkit-text-stroke: 1px black;
        color: white;
        padding-left: 10px;
        padding-right: 10px;
    }

</style>

<div class="usermanage-flash-interface">

    <div class="exit-interface"></div>

    <div class="usermanage-flash-interface-modal">

        <nav>
            <ul>

            </ul>
        </nav>

        <div class="avatar-usermanage-target">
            <img src="https://mc-heads.net/avatar/<?php echo $_SESSION['UserLevel']; ?>"></img>
            <h1><?php echo $_SESSION['UserLevel']; ?></h1>
        </div>

        

    </div>

</div>

