<div class="vc_contact-form">
  <h2> Contact <span class="vc_main-color"> Us </span> </h2>
  <div class="vc_splitter"> <span class="bg"> </span> </div>
  <div id="contact-form-result">
      <div id="success" class="alert alert-success hidden"><button type="button" class="close" data-dismiss="alert">&times;</button>We have <strong>successfully</strong> received your Message and will get Back to you as soon as possible.</div>
      <div id="error" class="alert alert-danger hidden"><button type="button" class="close" data-dismiss="alert">&times;</button> </div>
      <div id="empty" class="alert alert-danger hidden"><button type="button" class="close" data-dismiss="alert">&times;</button>Please <strong>Fill up</strong> all the Fields and Try Again.</div>
      <div id="unexpected" class="alert alert-danger hidden"><button type="button" class="close" data-dismiss="alert">&times;</button>An <strong>unexpected error</strong> occured. Please Try Again later.</div>                 
  </div>               
  <form action="functions/quick-contact.php" method="post" id="contact-form-widget" name="contact-form-widget" role="form">
    <input type="hidden" value="info@venmond.com" name="admin-email" id="admin-email">
    <input type="hidden" value="Venmond, Inc." name="admin-name" id="admin-name">
    <div class="form-group">
        <input type="text" onfocus="if(this.value=='Name:') this.value='';" onblur="if(this.value=='') this.value='Name:';" value="Name:" size="35" class="required" id="contact-form-name" name="contact-form-name">
    </div>
    <div class="form-group">
        <input type="email" onfocus="if(this.value=='E-mail:') this.value='';" onblur="if(this.value=='') this.value='E-mail:';" value="E-mail:" size="35" class="required email"  id="contact-form-email" name="contact-form-email">
    </div>
    <div class="form-group">
        <textarea onfocus="if(this.value=='Message:') this.value='';" onblur="if(this.value=='') this.value='Message:';" class="required" id="contact-form-message" name="contact-form-message"  cols="32" rows="10">Message:</textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Send Message" class="vc_btn" id="contact-form-submit" name="contact-form-submit">
        <div id="contact-form-loader"> </div>                
    </div>
    
  </form>
</div>