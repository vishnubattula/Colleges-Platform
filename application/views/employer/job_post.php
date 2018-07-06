<html>
<head><!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
<script>
    $(document).ready(function(){
      var date_input=$('input[name="job_deadline"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>
</head>
<body>
<div class="clearfix"></div>
<!-- Titlebar
================================================== -->
				<div id="titlebar" class="single">
					<div class="container">

				<div class="sixteen columns">
					<h1>Post a Job</h1>
								        <nav id="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
						<ul>
				        	<!-- Breadcrumb NavXT 6.1.0 -->
<li class="home"><span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Job Portal." href="http://simplyprint.in" class="home"><span property="name">Job Portal</span></a><meta property="position" content="1"></span></li>
<li class="post post-page current-item"><span property="itemListElement" typeof="ListItem"><span property="name">Post a Job</span><meta property="position" content="2"></span></li>
				        </ul>
					</nav>
									</div>
			</div>
		</div>
	
<div class="container full-width">
	<article id="post-89" class="sixteen columns post-89 page type-page status-publish hentry not-claimed">
	<div class="submit-page">
<?php echo form_open_multipart('employee/jo_post'); 	?>  

	
	
			<div class="notification notice closeable margin-bottom-40">
		
		<p><span>Welcome to Job Portal</span><br>
			You are currently signed in as <strong>chris123</strong>.		</p>
		<a class="button" href="http://simplyprint.in/wp-login.php?action=logout&amp;redirect_to=http%3A%2F%2Fsimplyprint.in%2Fpost-a-job%2F&amp;_wpnonce=1d12790095">Sign out</a>
	</div>
	

	
	
		<!-- Job Information Fields -->
		
					<fieldset class="form fieldset-job_title">
				<label for="job_title">Job Title</label>
				<div class="field required-field">
					<input type="text" class="input-text" name="job_title" id="job_title" placeholder="" value="" maxlength="" required />
				</div>
			</fieldset>
					<fieldset class="form fieldset-job_location">
				<label for="job_location">Location <small>(optional)</small></label>
				<div class="field ">
					<input type="text" class="input-text" name="job_location" id="job_location" placeholder="e.g. &quot;London&quot;" value="" maxlength=""  />
<small class="description">Leave this blank if the location is not important</small>				</div>
			</fieldset>
					<fieldset class="form fieldset-job_type">
				<label for="job_type">Job type</label>
				<div class="field required-field">
					<select  name='job_type' id='job_type' class='chosen-select-no-single' >
	<option class="level-0" value="5" >Freelance</option>
	<option class="level-0" value="2">Full Time</option>
	<option class="level-0" value="6">Internship</option>
	<option class="level-0" value="3">Part Time</option>
	<option class="level-0" value="4">Temporary</option>
</select>
				</div>
			</fieldset>
					<fieldset class="form fieldset-job_category">
				<label for="job_category">Job category</label>
				<div class="field required-field">
					<select name='job_category[]' id='job_category' class="selectpicker" multiple data-width="100%" data-height="100%" data-placeholder='Choose a category&hellip;' data-no_results_text='No results match' data-multiple_text='Select Some Options'>
					<option value="" selected></option>
	<option class="level-0" value="58">Accounting / Finance</option>
	<option class="level-0" value="66">Animation</option>
	<option class="level-0" value="60">Automotive Jobs</option>
	<option class="level-0" value="57">Construction / Facilities</option>
	<option class="level-0" value="62" >Education Training</option>
	<option class="level-0" value="53">Healthcare</option>
	<option class="level-0" value="91">IT/Software</option>
	<option class="level-0" value="55">Market &amp; Customer Research</option>
	<option class="level-0" value="54">Restaurant / Food Service</option>
	<option class="level-0" value="56">Sales &amp; Marketing</option>
	<option class="level-1" value="63">&nbsp;&nbsp;&nbsp;Display Advertising</option>
	<option class="level-1" value="64">&nbsp;&nbsp;&nbsp;Marketing Strategy</option>
	<option class="level-1" value="65">&nbsp;&nbsp;&nbsp;Public Relations</option>
	<option class="level-0" value="59">Telecommunications</option>
	<option class="level-0" value="61">Transportation / Logistics</option>
</select>
				</div>
			</fieldset>
					<fieldset class="form fieldset-job_tags">
				<label for="job_tags">Job tags <small>(optional)</small></label>
				<div class="field ">
					<input type="text" class="input-text" name="job_tags" id="job_tags" placeholder="e.g. PHP, Social Media, Management" value="" maxlength=""  />
<small class="description">Comma separate tags, such as required skills or technologies, for this job.</small>				</div>
			</fieldset>
					<fieldset class="form fieldset-job_description">
				<label for="job_description">Description</label>
				<div class="field required-field">
					<div id="wp-job_description-wrap" class="wp-core-ui wp-editor-wrap tmce-active"><link rel='stylesheet' id='dashicons-css'  href='http://simplyprint.in/wp-includes/css/dashicons.min.css?ver=4.9.6' type='text/css' media='all' />
<link rel='stylesheet' id='editor-buttons-css'  href='http://simplyprint.in/wp-includes/css/editor.min.css?ver=4.9.6' type='text/css' media='all' />
<div id="wp-job_description-editor-container" class="wp-editor-container"><textarea class="wp-editor-area" rows="8" autocomplete="off" cols="40" name="job_description" id="job_description"></textarea></div>
</div>

				</div>
			</fieldset>
					<fieldset class="form fieldset-application">
				<label for="application">Application email/URL</label>
				<div class="field required-field">
					<input type="text" class="input-text" name="application" id="application" placeholder="Enter an email address or website URL" value="" maxlength="" required />
				</div>
			</fieldset>
					<fieldset class="form fieldset-job_deadline">
				<label for="job_deadline">Closing date <small>(optional)</small></label>
				<div class="field ">
					<input type="text" class="form-control input-text bootstrap-iso form " id="date" name="job_deadline"  placeholder="yyyy-mm-dd" value="" maxlength=""  />
<small class="description">Deadline for new applicants.</small>				</div>
			</fieldset>
					<fieldset class="form fieldset-apply_link">
				<label for="apply_link">External &quot;Apply for Job&quot; link <small>(optional)</small></label>
				<div class="field ">
					<input type="text" class="input-text" name="apply_link" id="apply_link" placeholder="http://" value="" maxlength=""  />
				</div>
			</fieldset>
					<fieldset class="form fieldset-header_image">
				<label for="header_image">Header Image <small>(optional)</small></label>
				<div class="field ">
					
<label class="fake-upload-btn">
	<div class="job-manager-uploaded-files">
			</div>
	<input type="file" class=""   name="header_image" id="header_image" value="Browse" placeholder="" />
    <div  class="upload-btn"><i class="fa fa-upload"></i> Browse</div>
</label>


<small class="description">
			The header image size should be at least 1750x425px	</small>				</div>
			</fieldset>
		
		
		<!-- Company Information Fields -->
					<div class="divider"><h3>Company Details</h3></div>

			
							<fieldset class="form fieldset-company_name">
					<label for="company_name">Company name</label>
					<div class="field required-field">
						<input type="text" class="input-text" name="company_name" id="company_name" placeholder="Enter the name of the company" value="" maxlength="" required />
					</div>
				</fieldset>
							<fieldset class="form fieldset-company_website">
					<label for="company_website">Website <small>(optional)</small></label>
					<div class="field ">
						<input type="text" class="input-text" name="company_website" id="company_website" placeholder="http://" value="" maxlength=""  />
					</div>
				</fieldset>
							<fieldset class="form fieldset-company_tagline">
					<label for="company_tagline">Tagline <small>(optional)</small></label>
					<div class="field ">
						<input type="text" class="input-text" name="company_tagline" id="company_tagline" placeholder="Briefly describe your company" value="" maxlength="64"  />
					</div>
				</fieldset>
							<fieldset class="form fieldset-company_video">
					<label for="company_video">Video <small>(optional)</small></label>
					<div class="field ">
						<input type="text" class="input-text" name="company_video" id="company_video" placeholder="A link to a video about your company" value="" maxlength=""  />
					</div>
				</fieldset>
							<fieldset class="form fieldset-company_twitter">
					<label for="company_twitter">Twitter username <small>(optional)</small></label>
					<div class="field ">
						<input type="text" class="input-text" name="company_twitter" id="company_twitter" placeholder="@yourcompany" value="" maxlength=""  />
					</div>
				</fieldset>
							<fieldset class="form fieldset-company_logo">
					<label for="company_logo">Logo <small>(optional)</small></label>
					<div class="field ">
						
<label class="fake-upload-btn">
	<div class="job-manager-uploaded-files">
			</div>
	<input type="file" class=""   name="company_logo" id="company_logo" placeholder="" />
    <div  class="upload-btn"><i class="fa fa-upload"></i> Browse</div>
</label>


<small class="description">
			Maximum file size: 512 MB.	</small>					</div>
				</fieldset>
			
					
		
		<p class="send-btn-border">
			<input type="hidden" name="job_manager_form" value="submit-job" />
			<input type="hidden" name="job_id" value="268" />
			<input type="hidden" name="step" value="0" />
			<input type="submit" name="submit_job" class="button big" value="Preview" />
		</p>

	</form>
</div>
</body>
</html>