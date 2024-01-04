<?php
session::init();
if(session::get("saved")){
   
}else{
    session::set("saved",false);
}

?>


    <style>
        body{
            background-color: #f0f2f5;
        }
    </style>
    <div class="lg:flex max-w-5xl min-h-screen mx-auto p-6 py-10">
        <div class="flex flex-col items-center lg: lg:flex-row lg:space-x-10">

            <div class="lg:mb-12 flex-1 lg:text-left text-center">
                <img src="<?php echo URL; ?>public/images/logo.png" alt="" class="lg:mx-0 lg:w-52 mx-auto w-40"><p style="size: 0.6em;">Activation for 15th June, 2022</p>
                <p class="font-medium lg:mx-0 md:text-2xl mt-6 mx-auto sm:w-3/4 text-xl"> Daily Target of 4 activations expected</p>
            </div>
            <div class="lg:mt-0 lg:w-96 md:w-1/2 sm:w-2/3 mt-10 w-full">
              <div class="p-6 space-y-4 relative bg-white shadow-lg rounded-lg">
                
                <?php 
                    if(session::get("saved")){
                        echo '<div class="jqueryrespon" style="color:green";>
                            Your Activation successfully submitted
                        </div>';
                    }
                    

                ?>
                <form enctype="multipart/form-data" action="<?php URL ;?> activation/submit" method="post" class="p-6 space-y-4 relative bg-white shadow-lg rounded-lg">
                    <input type="text" placeholder="your Full Name" name="fname" class="with-border" required>
                    <input type="number" placeholder="your mobile number" name="mobile"  class="with-border" required>
                    <input type="number" placeholder="Client 1 (mobile number only)" name="client1"  class="with-border" required>
                    <input type="number" placeholder="Client 2 (mobile number only)" name="client2"  class="with-border" required>
                    <input type="number" placeholder="Client 3 (mobile number only)" name="client3"  class="with-border" required>
                    <input type="number" placeholder="Client 4 (mobile number only)" name="client4"  class="with-border" required>
                    <input type="number" placeholder="Client 5 (mobile number only)" name="client5"  class="with-border" required>
                    <input type="number" placeholder="Client 6 (mobile number only)" name="client6"  class="with-border" required >
                    <input type="number" placeholder="Client 7 (mobile number only)" name="client7"  class="with-border" required>
                    <input type="number" placeholder="Client 8 (mobile number only)" name="client8"  class="with-border" required>
                    <input type="number" placeholder="Client 9 (mobile number only)" name="client9"  class="with-border" required>
                    <input type="number" placeholder="Client 10 (mobile number only)" name="client10"  class="with-border" required>

                    <button type="submit" id="loginbtn" class="bg-blue-600 font-semibold p-3 rounded-md text-center text-white w-full">
                        Submit Activation Record
                    </button>                   
                   
                    
</div>

<div>List of Resgistered BA for 15th June, Activation</div>
<?php 
$n=0;
foreach ($this->listofactivations as $key => $value) {
    $n++;
    echo '
    <tr><td>'. $n . '  </td><td>  '. $value["fname"] .'</td></tr>



    ';

}

?>

