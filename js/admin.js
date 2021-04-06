
let app = {};

app.properties = {};
app.properties.sendSettingsUrl = "";
app.currentSettings  = {"settingsName":"none"};

function activatePage(settingsName)
{
    let pageToActivate = kLib.Pages[settingsName];

    if(!pageToActivate)
    {
        throw "cannot find page :"+settingsName;
    }

    pageToActivate.activate();

    
}


