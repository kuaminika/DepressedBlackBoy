class AdminPage
{

    constructor(options)
    {
        options = options ||{};

        this.validateOptions(options,["app","settingsName","id"]);
        //required 
        this.app = options.app ;
        this.settingsName = options.settingsName;
        this.id = options.id;
        //optional
        this.navBarId= options.navBarId ||"kAdminNav";
        this.navBarItemClassName = options.navBarItemClassName ||"nav-link" ;         

    }

    validateOptions(options,requiredAttributes)
    {
        kLib.forEach(requiredAttributes,attribute=>{

            let itsThere = options[attribute];
            if(!itsThere)
            {
                throw "the "+attribute+" is needed in order to continue";
            }
        });
        
    }

    activate()
    {        

        this.app.currentSettings.settingsName = this.settingsName;
        let navBar = document.getElementById(this.navBarId);
        navBar.getElementsByClassName(this.navBarItemClassName);
        let btn = document.getElementById(this.settingsName+"_btn");
        kLib.removeClassToAllWithClassName(this.navBarItemClassName,AdminPage.activeItemClassName );
        kLib.addClasstoElement(btn,AdminPage.activeItemClassName );
    }
}
AdminPage.PageClassName = "kAdminContainer-panel";
AdminPage.activeItemClassName = "active";

/// running the different types of Pages in the app
//init homePage 
function initHomePage(currentApp,pageName)
{
    pageName = pageName || "home";
    kLib.Pages = kLib.Pages || {};

    let homePage = new AdminPage({app:currentApp, settingsName:pageName,id:"generalSettingsformPage"});

    homePage.activate =( function(initialFn)
    {
        function result()
        {
            initialFn();
            kLib.removeClassToAllWithClassName(AdminPage.PageClassName,AdminPage.activeItemClassName);
            let generalSettingsformPage = document.getElementById(this.id);
        
            kLib.addClasstoElement(generalSettingsformPage,AdminPage.activeItemClassName );
        }
        return result;
    })(homePage.activate.bind(homePage))

    kLib.Pages[pageName] = homePage;
}


function initBlendFormPage(currentApp,form,pageName)
{
    let page = new AdminPage({app:currentApp, settingsName:pageName,id:pageName});

    let kform =form;
    if(!kform) {throw 'this page needs a form'}
     //setting the submit and validation procedures of the form
     kform.setSubmitProcedure(function(e)
     {
         var currentForm = this;
         
         var currentFormElement = currentForm.findFormEl();
         kLib.removeClassToElement(currentFormElement,"was-validated");
         var formData = currentForm.getFormObj();
         formData.settingsName = app.currentSettings.settingsName;
         console.log(formData);
         let courrierForForm = kLib.activeCourriers["courrierForForm"];
         courrierForForm.post(app.properties.sendSettingsUrl,formData)
         .then((data)=>{return JSON.stringify(data)})
         .then(alert);
     });
     kform.setValidationPocedure(validateMailingListFormProcedure);

    page.form = kform;
    page.activate =(function(initialFn)
    {
        function activateMore()
        {
            initialFn();
            
            let courrierForForm = kLib.activeCourriers.courrierForForm;
            let currentKForm = kLib.activeForms[pageName];
            currentKForm.showLoading();
            kLib.removeClassToAllWithClassName(AdminPage.PageClassName,AdminPage.activeItemClassName);
            let settingsformPage = document.getElementById(this.settingsName);

            courrierForForm.get("/"+this.settingsName).then((result)=>{
                currentKForm.takeOffLoading();
                kLib.iterateObject(result.data, currentKForm.setFormData);
            });
            
            kLib.addClasstoElement(settingsformPage,AdminPage.activeItemClassName);
        }

        return activateMore;

    })(page.activate.bind(page));
    kLib.Pages[pageName] = page;

    function validateMailingListFormProcedure ()
    {
        var currentForm = this;
        var currentFormElement = currentForm.findFormEl();
        kLib.addClasstoElement(currentFormElement,"was-validated");
        var result = currentFormElement.checkValidity();
        return result;           
    }
}



function initColorFormPage(currentApp,form,pageName)
{
    initBlendFormPage(currentApp,form,pageName);

    let createdPage = kLib.Pages[pageName];

    form.setFormData = initChooser;
    let tmpPage = new AdminPage({app:currentApp, settingsName:pageName,id:pageName});

     
    createdPage.activate =(function(initialFn)
    {
        function activateMore()
        {
            initialFn();
            
            let courrierForForm = kLib.activeCourriers.courrierForForm;
            let currentKForm = kLib.activeForms[pageName];
            currentKForm.showLoading();
            kLib.removeClassToAllWithClassName(AdminPage.PageClassName,AdminPage.activeItemClassName);
            let settingsformPage = document.getElementById(this.settingsName);

            courrierForForm.get("/"+this.settingsName).then((result)=>{
                currentKForm.takeOffLoading();
                kLib.iterateObject(result.data, currentKForm.setFormData);
                initVirginChoosers();
            });
            
            kLib.addClasstoElement(settingsformPage,AdminPage.activeItemClassName);
        }

        return activateMore;

    })(tmpPage.activate.bind(createdPage));


    function initChooser(chooserId,value)
    {
        kLib.log(chooserId);
        let el = document.querySelector("#"+chooserId);
        
        if(!el)return ;

        let parent = el.parentNode;
        let newEl = document.createElement("div");
        newEl.id = chooserId;

        parent.replaceChild(newEl,el);
        el = newEl;
        
        let options  = {};
        options.color = value;
        var colorWheel = new iro.ColorPicker(el, options);
            colorWheel.on('color:change', (color, changes)=>{
            ipt.value = color.hexString;
            });
        let ipt =document.getElementById(el.id+"_input")|| function(){ let rslt = document.createElement("input");
                                                                rslt.id = el.id+"_input";
                                                                el.parentNode.insertBefore(rslt, el.nextSibling);
                                                                return rslt;
                                                            }();
            ipt.type = "text";
            ipt.name = el.id;
            ipt.readOnly = true;
            ipt.required = true;
            ipt.value = value;
    }

    function initVirginChoosers()
    {
       let virginChooserClassName = "color-chooser";
        let virginChoosers = document.getElementsByClassName(virginChooserClassName);
        kLib.forEach(virginChoosers,el => {

            var colorWheel = new iro.ColorPicker(el, {});
            colorWheel.on('color:change', (color, changes)=>{
                ipt.value = color.hexString;
            });
          
            
            let ipt =document.getElementById(el.id+"_input")|| function(){ let rslt = document.createElement("input");
                                                                            rslt.id = el.id+"_input";
                                                                            el.parentNode.insertBefore(rslt, el.nextSibling);
                                                                            return rslt;
                                                                            }();
                ipt.type = "text";
                ipt.name = el.id;
                ipt.readOnly = true;
                ipt.required = true;
                ipt.value = value;

          
        });  

    }

}