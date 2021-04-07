document.getElementById("CreateCampaignInput").addEventListener("click", function(event) {
    event.preventDefault()
    var formData = new FormData(document.getElementById("FormCampaign"))
    for (var value of formData.values()) {
        if (value == "") {
            alert("Please fill all the contact fields")
            return;
        }
    }
    $.ajax({
        url: server + "/functions/getMailChimp.php",
        type: "POST",
        dataType: "script",
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        success: function (data) {
            if (data == "true") {
                campaignsUpdated()
            } else {
                alert("Something went wrong when creating the new campaign")
            }
        }
    });
});

async function getAllCampaigns() {
    return new Promise(resolve => {
        fetch(server + "/functions/campaign/getAllCampaigns.php")
            .then((response) => response.json())
            .then(function (response) {
                resolve(response)
        });
    });
}

function updateCampaignsList(campaigns) {
    var campaignSection = document.getElementById("CampaignList")
    campaignSection.innerHTML = ""

    for (var i = 0; i < campaigns.length; i++) (function(i) {
        var ul = document.createElement("ul")
        ul.className = "card"
        campaignSection.appendChild(ul)

        var liObject = document.createElement("li")
        liObject.className = "one"
        ul.appendChild(liObject)

        var pObject = document.createElement("p")
        pObject.innerHTML = campaigns[i].object
        liObject.appendChild(pObject)

        var liList = document.createElement("li")
        liList.className = "two"
        ul.appendChild(liList)

        var pList = document.createElement("p")
        pList.innerHTML = campaigns[i].name
        liList.appendChild(pList)

        var liContent = document.createElement("li")
        liContent.className = "three"
        ul.appendChild(liContent)

        var pContent = document.createElement("p")
        pContent.innerHTML = "Content"
        liContent.appendChild(pContent)

        var liTime = document.createElement("li")
        liTime.className = "four"
        ul.appendChild(liTime)

        var pTime = document.createElement("p")
        pTime.innerHTML = campaigns[i].time
        liTime.appendChild(pTime)

        var liDate = document.createElement("li")
        liDate.className = "five"
        ul.appendChild(liDate)

        var pDate = document.createElement("p")
        pDate.innerHTML = campaigns[i].date
        liDate.appendChild(pDate)

        var liPublish = document.createElement("li")
        liPublish.className = "button-one"
        ul.appendChild(liPublish)

        var btnPublish = document.createElement("button")
        btnPublish.innerHTML = "Publish"
        liPublish.appendChild(btnPublish)
        btnPublish.addEventListener("click", function(){publishCampaign(ul)}, false);

        var liEdit = document.createElement("li")
        liEdit.className = "button-two"
        ul.appendChild(liEdit)

        var btnEdit = document.createElement("button")
        btnEdit.innerHTML = "Edit"
        liEdit.appendChild(btnEdit)
        btnEdit.addEventListener("click", function(){editCampaign(ul)}, false);

        var liDelete = document.createElement("li")
        liDelete.className = "button-three"
        ul.appendChild(liDelete)

        var btnDelete = document.createElement("button")
        btnDelete.innerHTML = "Delete"
        liDelete.appendChild(btnDelete)
        btnDelete.addEventListener("click", function(){deleteCampaign(ul)}, false);
    })(i);
}

function campaignsUpdated() {
    const asynCampaigns = async () => {
        const result = await getAllCampaigns()
        return result
    }
    (async () => {
        const contacts = await asynCampaigns()
        updateCampaignsList(contacts)
    })()
}

function publishCampaign(list) {
    $.ajax({
        url: server + "/functions/campaign/publishCampaign.php",
        type: "POST",
        // dataType: "script",
        // cache: false,
        // contentType: false,
        // processData: false,
        // data: formData,
        success: function (data) {
            if (data == "true") {
                // campaignsUpdated()
                alert("Publishing finished")
            } else {
                alert("Something went wrong when publishing the campaign")
            }
        }
    });
}

function editCampaign(list) {
    console.log(list)
}

function deleteCampaign(list) {
    console.log(list)
}