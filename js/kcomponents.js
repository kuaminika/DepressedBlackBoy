//log
(
   function(klib)
   {
       function donothing(){}
       klib.logger=  klib.logger || {};
       klib.logger.log = console.log || donothing;
       klib.logger.warn = console.warn || donothing;
       klib.logger.error = console.error || donothing;
   } 

)(kLib);


//k-bgImage

( 
function(klib)
{
     function KBgImage(el)
     {
        
       //  document.getElementsByClassName(this.className);
     this.backGroundImaeUrl =   el.getAttribute("data-url");

     if(! this.backGroundImaeUrl) 
     {
        klib.logger.warn("data-url attribute missing for this tag",el);
         return;
     }

     el.style.background = "url("+this.backGroundImaeUrl+")" ;
     el.style.backgroundRepeat= "no-repeat";
     el.style.backgroundSize="100% 100%";
    

    }

    KBgImage.className = "k-bgImage";

    var els = document.getElementsByClassName(KBgImage.className);
    klib.forEach(els,KBgImage)

 }
)(kLib)