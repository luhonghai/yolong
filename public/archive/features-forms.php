<?php require_once('templates/headers/opening.tpl.php'); ?>

<!-- Data to be passed to templates/headers/header-x.tpl.php -->
<?php $title = 'Form Features - Multipurpose Responsive HTML5 Themes with Animated Metro Slider'; ?>
<?php $keywords = 'HTML5 Template, CSS3, Metro Slider, Elegant HTML5 Theme'; ?>
<?php $description = 'Multipurpose Responsive HTML5 Themes with Animated Metro Slider - Vencorp'; ?>
<?php $page = 'features';   // To set active on the same id of primary menu ?>
<!-- End of Data -->

<?php require_once('templates/headers/'.$header.'.tpl.php'); ?>





<!-- Middle Content Start -->
  <div class="vc_banner-title <?php if (isset($banner_title_bg)) echo $banner_title_bg; ?> block">
    <div class="wrapper">
      <div class="container">
        <h1>Forms</h1>
        <ul class="breadcrumb">
          <li><a href="index.php">Home</a> </li>
          <li><a href="features-typography.php">Features</a> </li>
          <li class="active">Forms</li>
        </ul>
      </div>
    </div>
    <!-- wrapper --> 
  </div>
  <!-- vc_banner -->
  
  <div class="vc_forms">
    <div class="wrapper">
      <div class="container">
        <div class="row block">
          <div class="form-elements">
            <div class="col-md-6">
            	<h3>Form Elements Example</h3>
                <section>
                  <form class="form-horizontal" action="#" role="form">
                     <div class="form-group">
                      <label class="col-md-4 control-label">Input</label>
                      <div class="col-md-7 controls">
                        <input type="text" placeholder="small">
                        <span class="help-inline">Some hint here</span> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Disabled Input</label>
                      <div class="col-md-7 controls">
                        <input type="text" disabled="" placeholder="Disabled input here..." >
                        <span class="help-inline">Some hint here</span> </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Readonly Input</label>
                      <div class="col-md-7 controls">
                        <input type="text" disabled=""  placeholder="Readonly input here..." readonly >
                        <span class="help-inline">Some hint here</span> </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Prepend Input</label>
                      <div class="col-md-7 controls">
                        <div class="input-group">
                          <span class="input-group-addon">@</span>
                          <input type="text" placeholder="Username">
                        </div>                  
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Append Input</label>
                      <div class="col-md-7 controls">
                          <div class="input-group">
                             <input type="text" placeholder="Price">
                             <span class="input-group-addon">.00</span>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Dropdown</label>
                      <div class="col-md-7 controls">
                            <select>
                              <option>Choice 1</option>
                              <option>Choice 2</option>
                              <option>Choice 3</option>
                              <option>Choice 4</option>
                              <option>Choice 5</option>
                            </select>
                      </div>
                    </div>   
                    <div class="form-group">
                      <label class="col-md-4 control-label">Multiple Dropdown</label>
                      <div class="col-md-7 controls">
                            <select multiple>
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Radio Buttons</label>
                      <div class="col-md-7 controls">
                        <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                            Option one is this and that&mdash;be sure to include why it's great
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            Option two can be something else and selecting it will deselect option one
                          </label>
                        </div>
                      </div>
                    </div>                                                           
                    <div class="form-group">
                      <label class="col-md-4 control-label">Radio Buttons Inline</label>
                      <div class="col-md-7 controls">
                        <label class="radio-inline">
                          <input type="radio" name="optionsRadios3" id="optionsRadios3" value="option3" checked>
                          3 </label>
                        <label class="radio-inline">
                          <input type="radio" name="optionsRadios4" id="optionsRadios4" value="option4">
                          4 </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Checkbox</label>
                      <div class="col-md-7 controls">
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Option one is this and that—be sure to include why it's great </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Option one is this and that—be sure to include why it's great </label>
                      </div>
                    </div>                    
                    <div class="form-group">
                      <label class="col-md-4 control-label">Checkbox Inline</label>
                      <div class="col-md-7 controls">
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox1" value="option1">
                          1 </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox2" value="option2">
                          2 </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckbox3" value="option3">
                          3 </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Default</label>
                      <div class="col-md-7 controls">
                        <input type="file">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Small Textarea</label>
                      <div class="col-md-7 controls">
                        <textarea rows="3"  class="vc_input-sm"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Medium Textarea</label>
                      <div class="col-md-7 controls">
                        <textarea rows="3" class="vc_input-md"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Large Textarea</label>
                      <div class="col-md-7 controls">
                        <textarea rows="3" class="vc_input-lg"></textarea>
                      </div>
                    </div>
                    <div class="form-group form-actions">
                      <div class="col-md-4">
                      </div>
                      <div class="col-md-7">
                          <button class="vc_btn" type="submit"><i class="icon-ok"></i> Save</button>
                          <button class="vc_btn btn-grey" type="button">Cancel</button>
                      </div>
                    </div>
                  </form>
                </section>
          </div>
          <!-- .col-md-6 -->
            <div class="col-md-6">
            	<h3>Form Elements Inverse Color</h3>            
                <section>
                  <form class="form-horizontal" action="#" role="form">
                     <div class="form-group">
                      <label class="col-md-4 control-label">Input</label>
                      <div class="col-md-7 controls">
                        <input type="text" placeholder="small" class="vc_input-inverse">
                        <span class="help-inline">Some hint here</span> 
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Disabled Input</label>
                      <div class="col-md-7 controls">
                        <input type="text" disabled="" placeholder="Disabled input here..."  class="vc_input-inverse">
                        <span class="help-inline">Some hint here</span> </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Readonly Input</label>
                      <div class="col-md-7 controls">
                        <input type="text" disabled=""  placeholder="Readonly input here..." readonly  class="vc_input-inverse">
                        <span class="help-inline">Some hint here</span> </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Prepend Input</label>
                      <div class="col-md-7 controls">
                        <div class="input-group">
                          <span class="input-group-addon">@</span>
                          <input type="text" placeholder="Username" class="vc_input-inverse">
                        </div>                  
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Append Input</label>
                      <div class="col-md-7 controls">
                          <div class="input-group">
                             <input type="text" placeholder="Price" class="vc_input-inverse">
                             <span class="input-group-addon">.00</span>
                          </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Dropdown</label>
                      <div class="col-md-7 controls">
                            <select  class="vc_input-inverse">
                              <option>Choice 1</option>
                              <option>Choice 2</option>
                              <option>Choice 3</option>
                              <option>Choice 4</option>
                              <option>Choice 5</option>
                            </select>
                      </div>
                    </div>   
                    <div class="form-group">
                      <label class="col-md-4 control-label">Multiple Dropdown</label>
                      <div class="col-md-7 controls">
                            <select multiple  class="vc_input-inverse">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Radio Buttons</label>
                      <div class="col-md-7 controls">
                        <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadiosInverse1" value="option1" checked>
                            Option one is this and that&mdash;be sure to include why it's great
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadiosInverse2" value="option2">
                            Option two can be something else and selecting it will deselect option one
                          </label>
                        </div>
                      </div>
                    </div>                                                           
                    <div class="form-group">
                      <label class="col-md-4 control-label">Radio Buttons Inline</label>
                      <div class="col-md-7 controls">
                        <label class="radio-inline">
                          <input type="radio" name="optionsRadios3" id="optionsRadiosInverse3" value="option3" checked>
                          3 </label>
                        <label class="radio-inline">
                          <input type="radio" name="optionsRadios4" id="optionsRadiosInverse4" value="option4">
                          4 </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Checkbox</label>
                      <div class="col-md-7 controls">
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Option one is this and that—be sure to include why it's great </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Option one is this and that—be sure to include why it's great </label>
                      </div>
                    </div>                    
                    <div class="form-group">
                      <label class="col-md-4 control-label">Checkbox Inline</label>
                      <div class="col-md-7 controls">
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckboxInverse1" value="option1">
                          1 </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckboxInverse2" value="option2">
                          2 </label>
                        <label class="checkbox-inline">
                          <input type="checkbox" id="inlineCheckboxInverse3" value="option3">
                          3 </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Default</label>
                      <div class="col-md-7 controls">
                        <input type="file" class="vc_input-inverse" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Small Textarea</label>
                      <div class="col-md-7 controls">
                        <textarea rows="3"  class="vc_input-sm vc_input-inverse"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Medium Textarea</label>
                      <div class="col-md-7 controls">
                        <textarea rows="3" class="vc_input-md vc_input-inverse"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-4 control-label">Large Textarea</label>
                      <div class="col-md-7 controls">
                        <textarea rows="3" class="vc_input-lg vc_input-inverse"></textarea>
                      </div>
                    </div>
                    <div class="form-group form-actions">
                      <div class="col-md-4">
                      </div>
                      <div class="col-md-7">
                          <button class="vc_btn" type="submit"><i class="icon-ok"></i> Save</button>
                          <button class="vc_btn btn-grey" type="button">Cancel</button>
                      </div>

                    </div>
                  </form>
                </section>
          </div>                
          </div>
          <!-- .form-elements --> 
        </div>
        <!-- .row --> 
      </div>
      <!-- .container --> 
    </div>
    <!-- .wrapper --> 
  </div>
  <!-- .vc_forms --> 
<!-- Middle Content End -->
  
  
  
  
  
<?php require_once('templates/footers/'.$footer.'.tpl.php'); ?>



<!-- Specific Page Scripts Put Here -->




<!-- Specific Page Scripts END -->



<?php require_once('templates/footers/closing.tpl.php'); ?>