<?php
namespace KThemeTools;

class KPostViewer
{
    
    function __construct(){}
    public function showPage($page)
    {
        $currentPageIsContactPage = strrpos( $page->post_name , "contact")>-1;
     /*   if(strrpos( $page->post_name , "contact")>-1)
            $this->showContactContent();*/
        ?>
        
        
    	<section class="resume-section  m-0 p-1 d-flex flex-column" id="<?php echo $page->post_name?>">
           	 <div class="row jumbotron  d-flex  flex-row-reverse align-items-end justify-content-start   k-bg-pic mb-5 ml-1 pr-2 py-0" id="<?php echo $page->post_name?>Banner" style="height: 286px">
           	 	 <h2 class="mb-0 k-page-title text-light" data-keyName="<?php echo $page->keyName ?> "><?php echo $page->post_title ?>hihi </h2>          	 
           	 </div>
           	<div class="row k-page-content mx-3 mt-2">    
          		<?php 
          		if(!$currentPageIsContactPage)
          		{
          		    echo ($page->post_content);
          		  
          		}
          		else
          		
          		      $this->showContactContent();
          		
          		?>          
           </div>
        </section>
    
        <hr class="m-0">
     
    <?php }
    
    
    
    public function showContactContent()
    {?>
    <div class="k-content-block col-md-12">
        <div class="k-content-block-title">
        	<h5>I can  be reached at loudemia@heartmindequation.com</h5>
        </div>
        <div class="k-content-block-body ">
        
             <form class="" id="hmeContactForm" name="hmeContactForm">
            	<div class="form-row mt-3">
                    <input type="text" id="visitorsNameField" name="visitorsName" required class="form-control">
                    <label class="k-required-field-label" for="visitorsNameField">Name</label>
                    <div class="invalid-feedback">Name is required</div>
                </div>
             	<div class="form-row">
             	    <input type="text" id="visitorsPhoneField" name="visitorsphone" class="form-control">
                    <label for="visitorsPhoneField">Phone</label>
                </div> 
               	<div class="form-row">
                	<input type="email" name="visitorsphone"  class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" required id="visitorsEmailField" >
                    <label class="k-required-field-label"  for="visitorsEmailField">Email</label>
                    <div class="invalid-feedback">Email is required</div>
                </div>
               	<div class="form-row k-hidden">
                	<input type="hidden" name="visitorsServiceSolicited"  value="not specified" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="visitorsServiceField" >
                    <label for="visitorsServiceField">Service</label>
                </div>
               	<div class="form-row">
               		 <label for="visitorsMessageField">Message</label>
                	<input  name="visitorsMessage"   type="email"  class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="visitorsMessageField" >
                </div>
                <div class="form-row">
                 	 <a id="submitBtn" type="submit" class="btn btn-primary mx-auto">SEND</a>
                </div>
             </form>   
         </div>  
     </div>
     <?php  
     
   
    }
}

