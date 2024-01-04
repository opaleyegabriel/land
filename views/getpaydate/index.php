<div class="lg:flex max-w-5xl min-h-screen mx-auto p-6 py-10">
    <div class="flex flex-col items-center lg: lg:flex-row lg:space-x-10">

      <div class="lg:mt-0 lg:w-96 md:w-1/2 sm:w-2/3 mt-10 w-full">
          <div class="p-6 space-y-4 relative bg-white shadow-lg rounded-lg">
            <form enctype="multipart/form-data" action="<?php URL ;?> getpaydate/alluserpay" method="post" class="p-6 space-y-4 relative bg-white shadow-lg rounded-lg">
                <input type="number" placeholder="Phone Number" name="mobile" id="mobile" class="with-border">
                <button id="loginbtn" class="bg-blue-600 font-semibold p-3 rounded-md text-center text-white w-full">
                    Get data
                </button>
              </form>
</div>
     </div>
        </div>

    </div>
    <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
    </style>
