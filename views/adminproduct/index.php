<div style="display: none;" id="logindiv" class="animate-bottom">
<div class="adminproduct">
  <form enctype="multipart/form-data" action="<?php echo URL ;?>adminproduct/products" method="post">
  <input type="text" class="productname" name="productname" id="productname" placeholder="Enter the Product name" required="">
<textarea name="description" rows="2" cols="80"></textarea>
 <input type="file" name="file1"  id="file1" onchange="return fileValidation()" value="" >
 <div id="imagediv"></div>
        <script type="text/javascript">
        function fileValidation(){
        var fileInput = document.getElementById('file1');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        if(!allowedExtensions.exec(filePath)){
          alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
          fileInput.value = '';
          return false;
        }else{
          //Image preview
          if (fileInput.files && fileInput.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  document.getElementById('imagediv').innerHTML = '<img src="'+e.target.result+'" style=width:7em; />';
              };
              reader.readAsDataURL(fileInput.files[0]);
          }
        }
        }
        </script>

<input type="text" name="quantity" class="quantity" value="" placeholder="Quantity" required="">
<input type="text" name="price" class="price" value="" placeholder="Price" required="">
<input type="text" name="deposit" class="price" value="" placeholder="Initial Deposit" required="">
<input type="text" name="daily" class="price" value="" placeholder="Expected Daily Amount" required="">
<input type="submit" name="" value="Save">

</form>
</div>
</div>
