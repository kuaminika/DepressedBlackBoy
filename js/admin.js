function validateMailingListFormProcedure ()
{
    var currentForm = this;
    var currentFormElement = currentForm.findFormEl();
   kLib.addClasstoElement(currentFormElement,"was-validated");
   var result = currentFormElement.checkValidity();
   return result;           
}
let app = {};

app.properties = {};
app.properties.sendSettingsUrl = "";
app.currentSettings  = {"settingsName":"none"};

function activatePage(settingsName)
{
    app.currentSettings.settingsName = settingsName;
    let navBar = document.getElementById("kAdminNav");
    navBar.getElementsByClassName("nav-link" );

    kLib.removeClassToAllWithClassName("nav-link","active");
    kLib.addClasstoElement(event.target,"active");

    let settingsNameHasContact = settingsName.indexOf("Contact")>-1;

    if(settingsNameHasContact) 
    {
        
        let courrierForForm = kLib.activeCourriers.courrierForForm;
        let currentKForm = kLib.activeForms.kAdminForm;
        currentKForm.showLoading();
        kLib.removeClassToAllWithClassName("kAdminContainer-panel","active");
        let contactSettingsformPage = document.getElementById("contactSettingsformPage");

        courrierForForm.get("/"+settingsName).then((result)=>{
            currentKForm.takeOffLoading();
            kLib.iterateObject(result.data, currentKForm.setFormData);


        });
        
        kLib.addClasstoElement(contactSettingsformPage,"active");
    }
    else
    {
        kLib.removeClassToAllWithClassName("kAdminContainer-panel","active");
        let generalSettingsformPage = document.getElementById("generalSettingsformPage");
    
        kLib.addClasstoElement(generalSettingsformPage,"active");
        
    }
}



function initApp(kform)
{
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

}