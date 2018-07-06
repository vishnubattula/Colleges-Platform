<html>
<head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
</head>
<body>
<button id="myBtn">Open Modal</button>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
<?php
								echo form_open_multipart('employee/emp_reg');
							?>	
            <p class="status"></p>
            <fieldset>
                <p>
                    <label for="workscout_user_login">Username                    <i class="ln ln-icon-Male"></i><input name="workscout_user_login" id="workscout_user_login" class="required" type="text"/>
                    </label><?php echo form_error('workscout_user_login');?>
                </p>
                <p>
                    <label for="workscout_user_email">Email                    <i class="ln ln-icon-Mail"></i><input name="workscout_user_email" id="workscout_user_email" class="required" type="email"/>
                    </label><?php echo form_error('workscout_user_email');?>
                </p>
                                <p>
                <label for="workscout_user_role">I want to register as</label><select name="workscout_user_role" id="workscout_user_role" class="input chosen-select"><option value="employer">Employer</option><option value="candidate">Candidate</option></select> 
<?php echo form_error('workscout_user_role');?>				</p>
                                                <p style="display:none">
                    <label for="confirm_email">Please leave this field empty</label>
                    <input type="text" name="confirm_email" id="confirm_email" class="input" value="">
                </p>
                <p>
                    <input type="hidden" name="workscout_register_nonce" value="3aa69028c8"/>
                    <input type="hidden" name="workscout_register_check" value="1"/>
                    <input type="hidden" id="security" name="security" value="c991811d2e" /><input type="hidden" name="_wp_http_referer" value="/" />                    <input type="submit" name="submit" value="Register Your Account" />
                </p>
            </fieldset>
        </form>
		</div></div>
		<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
		</body>
		</html>
