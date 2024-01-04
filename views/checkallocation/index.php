<section id="main-content">
	<section class="wrapper">
		<div class="wthree-font-awesome">
			<div class="grid_3 grid_4 w3_agileits_icons_page">
						<div class="icons">
							<a style="float:right;" href="<?php echo URL."adminmenu/logout"; ?>"><i class="fa fa-power-off"></i></a>
							<a style="float:right; margin-right:20px;" class="btn btn-info"  href="<?php echo URL; ?>adminaddallocation">Add Allocation</a>
							<h2 class="w3ls_head">Allocations</h2>
              <div class="panel-body">
                          <div class="position-center">
                            <!-- <form class="" id="searchbyphone" method="post"> -->
                              <div class="form-group">
                                  <label for="phone" class="col-lg-4 col-sm-4 control-label">Phone Number</label>
                                  <div class="col-lg-10">
                                      <input type="text" class="form-control" name="phone" id="mobile" placeholder="Phone Number" style="display: block; width: 100%; height: 34px;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555;background-color: #fff;background-image: none;border: 1px solid #ccc;border-radius: 4px;-webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
                                      -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-lg-10">
                                    <button type="submit" class="btn btn-info" id="searchbtn" name="button">Search</button>
                                  </div>
                              </div>
                            <!-- </form> -->
                            <table>
                              <tr>
                                <th></th>
                                <th></th>
                              </tr>
                              <tr>
                                <th>Name:</th>
                                <td id="name_txt"></td>
                              </tr>
                              <tr>
                                <th>Moile:</th>
                                <td id="mobile_txt"></td>
                              </tr>
                              <tr>
                                <th>Site:</th>
                                <td id="site_txt"></td>
                              </tr>
                              <tr>
                                <th>Phase:</th>
                                <td id="phase_txt"></td>
                              </tr>
                              <tr>
                                <th>Block:</th>
                                <td id="block_txt"></td>
                              </tr>
                            </table>
                          </div>
                      </div>


	</div>
			</div>
		</div>
</section>
  </section>
  <script type="text/javascript">
  $(document).on('click', '#searchbtn', function(){
      var phone = $('#mobile').val();
      // alert(mobile);
      $.ajax({
        type: "GET",
        url: "<?php echo URL; ?>checkallocation/searchbyphone?phone=" + phone ,
        // data: new FormData(this),
        // dataType: "dataType";
        // processData: false,
        // contentType: false,
        success: function (response) {
          var res = jQuery.parseJSON(response);
          if (res.status == 404) {
          // $('#errorMessage').removeClass('d-none');
          // $('#errorMessage').text(res.message);
          alert(res.message)

      } else if (res.status == 200) {
        $('#name_txt').text(res.data.name);
        $('#mobile_txt').text(res.data.phone);
        $('#site_txt').text(res.data.site);
        $('#phase_txt').text(res.data.phase);
        $('#block_txt').text(res.data.block);
        $('#plot_txt').text(res.data.plot);

        // $('#addm').val(res.data.addm);
         }
        }
      });
});
  </script>
    <style>

    .panel-body {
        padding: 15px;
    }
    @media (max-width: 768px){
    .position-center {
        width: 100%;
        margin: 0 auto;
    }
  }
  .form-horizontal .form-group {
    margin-right: -15px;
    margin-left: -15px;
}

.form-group {
    margin-bottom: 15px;
}
    .position-center {
        width: 62%;
        margin: 0 auto;
    }
     .col-lg-2,  .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}

ul, label {
    margin: 0;
    padding: 0;
}
label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
}
    .wthree-font-awesome {
    background:#fff;
    padding: 2em;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
    box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
}
@media (min-width: 480px) and (max-width: 767px){
.wrapper {
    margin-top: 0px;
}
}
.wrapper {
    display: inline-block;
    margin-top: 50px;
    padding: 15px;
    width: 100%;
}
@media (min-width: 480px) and (max-width: 767px){
#main-content {
    margin-left: 0px;
}
}
#main-content {
    margin-left: 0px;
    -webkit-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out;
}
.input-group {
    margin-bottom: 20px;
}
.input-group {
    position: relative;
    display: table;
    border-collapse: separate;
}
.input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child>.btn, .input-group-btn:first-child>.btn-group>.btn, .input-group-btn:first-child>.dropdown-toggle, .input-group-btn:last-child>.btn-group:not(:last-child)>.btn, .input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle) {
    border-top-right-radius: 1;
    border-bottom-right-radius: 1;
}
.input-group .form-control, .input-group-addon, .input-group-btn {
    display: table-cell;
}
.input-group .form-control {
    position: relative;
    z-index: 2;
    float: right;
    width: 40%;
    margin-bottom: 0;
}
.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
button, input, select, textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
input {
    line-height: normal;
}
button, input, optgroup, select, textarea {
    margin: 0;
    font: inherit;
    color: inherit;
}

input[type="text" i] {
    padding: 1px 2px;
}
input {
    writing-mode: horizontal-tb !important;
    font-style: ;
    font-variant-ligatures: ;
    font-variant-caps: ;
    font-variant-numeric: ;
    font-variant-east-asian: ;
    font-weight: ;
    font-stretch: ;
    font-size: ;
    font-family: ;
    text-rendering: auto;
    color: -internal-light-dark(black, white);
    letter-spacing: normal;
    word-spacing: normal;
    line-height: normal;
    text-transform: none;
    text-indent: 0px;
    text-shadow: none;
    display: inline-block;
    text-align: start;
    appearance: auto;
    -webkit-rtl-ordering: logical;
    cursor: text;
    background-color: -internal-light-dark(rgb(255, 255, 255), rgb(59, 59, 59));
    margin: 0em;
    padding: 1px 2px;
    border-width: 2px;
    border-style: inset;
    border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
    border-image: initial;
}
.input-group {
    position: relative;
    display: table;
    border-collapse: separate;
}
.input-group-addon:last-child {
    border-left: 1;
}

.input-group .form-control:last-child, .input-group-addon:last-child, .input-group-btn:first-child>.btn-group:not(:first-child)>.btn, .input-group-btn:first-child>.btn:not(:first-child), .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group>.btn, .input-group-btn:last-child>.dropdown-toggle {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
.input-group-addon {
    padding: 6px 12px;
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    color: #555;
    text-align: center;
    background-color: #eee;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.input-group-addon, .input-group-btn {
    width: 1%;
    white-space: nowrap;
    vertical-align: middle;
}
.input-group .form-control, .input-group-addon, .input-group-btn {
    display: table-cell;
}
.btn-warning {
    color: #fff;
    background-color: #f0ad4e;
    border-color: #eea236;
}

.btn-info {
    color: #fff;
    background-color: blue;
    border-color: #46b8da;
    }
.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}
button, input, select, textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
button, html input[type=button], input[type=reset], input[type=submit] {
    -webkit-appearance: button;
    cursor: pointer;
}
button, select {
    text-transform: none;
}
button {
    overflow: visible;
}
button, input, optgroup, select, textarea {
    margin: 0;
    font: inherit;
    color: inherit;
}
button {
    appearance: auto;
    writing-mode: horizontal-tb !important;
    font-style: ;
    font-variant-ligatures: ;
    font-variant-caps: ;
    font-variant-numeric: ;
    font-variant-east-asian: ;
    font-weight: ;
    font-stretch: ;
    font-size: ;
    font-family: ;
    text-rendering: auto;
    color: -internal-light-dark(black, white);
    letter-spacing: normal;
    word-spacing: normal;
    line-height: normal;
    text-transform: none;
    text-indent: 0px;
    text-shadow: none;
    display: inline-block;
    text-align: center;
    align-items: flex-start;
    cursor: default;
    box-sizing: border-box;
    background-color: -internal-light-dark(rgb(239, 239, 239), rgb(59, 59, 59));
    margin: 0em;
    padding: 1px 6px;
    border-width: 2px;
    border-style: outset;
    border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
    border-image: initial;
}
.panel {
    border: none ! important;
}
.panel-default {
    border-color: #ddd;
}
.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
    box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
}
.panel-default>.panel-heading {
    color: #000000 ! important;
    background-color: #ddede0 ! important;
    border-color: #ddede0 ! important;
    font-size: 20px;
}
.panel-default>.panel-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
}
.panel-heading {
    position: relative;
    height: 57px;
    line-height: 57px;
    letter-spacing: 0.2px;
    color: #000;
    font-size: 18px;
    font-weight: 400;
    padding: 0 16px;
    background: #ddede0;
    border-top-right-radius: 2px;
    border-top-left-radius: 2px;
    text-transform: uppercase;
    text-align: center;
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}
table {
    background-color: transparent;
}
table {
    border-spacing: 0;
    border-collapse: collapse;
}
table {
    display: table;
    border-collapse: separate;
    box-sizing: border-box;
    text-indent: initial;
    border-spacing: 2px;
    border-color: grey;
}
thead {
    display: table-header-group;
    vertical-align: middle;
    border-color: inherit;
}
tbody {
    display: table-row-group;
    vertical-align: middle;
    border-color: inherit;
}
table {
    border-spacing: 0;
    border-collapse: collapse;
}
table {
    border-collapse: separate;
    text-indent: initial;
    border-spacing: 2px;
}
.table>caption+thead>tr:first-child>td, .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>td, .table>thead:first-child>tr:first-child>th {
    border-top: 0;
}

@media (max-width: 768px)
.table td, .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 6px!important;
}
@media (max-width: 800px)
.table td, .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 7px!important;
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    font-size: 0.9em;
    color: #999;
    border-top: none !important;
}
.table td, .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 15px!important;
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    border-top: none !important;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    border-bottom: 1px solid #e9e9e9 ! important;
}
.table>thead>tr>th {
    border-bottom: 1px solid #e1ab91 ! important;
}
.table>thead>tr>th {
    vertical-align: bottom;
    border-bottom: 2px solid #ddd;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
th {
    text-align: left;
}
td, th {
    padding: 0;
}
.mydisabled{
  pointer-events: none;
  border-color: transparent !important;
  color: #fff;
  background-color: #6777ef;
  box-shadow: 0 2px 6px #acb5f6;
}

    </style>
