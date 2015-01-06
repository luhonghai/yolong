<div class="vc_newsletter-form">
    <h3> Newsletter </h3>
    <div id="vc_newsletter-form-success" class="alert alert-success hidden"> <strong> Success! </strong> You've been added to our email list. </div>
    <div id="vc_newsletter-form-error" class="alert alert-error hidden"> </div>
    <div class="info">                
        <p> Keep up-to-date with our awesome products and news. Enter your e-mail and subscribe to our newsletter. </p>
    
        <form  id="newsletter" method="POST" action="functions/newsletter-subscribe.php" class="form-inline">
          <div class="control-group row">
          	<div class="col-xs-7 form-input" >
            	<input type="email" id="email" name="email" placeholder="Email Address" required  />
            </div>
            <div class="col-xs-5 form-btn">
            	<button type="submit" class="vc_btn"> Go ! </button>
            </div>
          </div>
        </form>
    </div>
</div>