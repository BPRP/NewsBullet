document.getElementById("InputCreateListing").addEventListener("click", function(event) {
    event.preventDefault()
    var name = document.getElementById("ListNameInput").value;
    if (name == "") {
        alert("Please set a name for the list")
        return;
    }else {
        $.ajax({
            url: server + "/functions/listing/createListing.php",
            type: "POST",
            data: {
                "list_name": name
            },
            success: function (data) {
                if (data == "true") {
                    listingUpdated()            
                } else {
                    alert("Something went wrong when creating a new list")
                }
            }
        });
    }
});

async function getAllListings() {
    return new Promise(resolve => {
        fetch(server + "/functions/listing/getAllListings.php")
        .then((response) => response.json())
        .then(function (response) {
            resolve(response)
        });
    });
}

function updateListingList(lists) {
    var listSection = document.getElementById("AllLists")
    listSection.innerHTML = ""

    for (var i = 0; i < lists.length; i++) (function(i) {
        var ul = document.createElement("ul")
        ul.className = "card"
        listSection.appendChild(ul)

        var liName = document.createElement("li")
        liName.className = "three"
        ul.appendChild(liName)

        var pName = document.createElement("p")
        pName.innerHTML = lists[i].name
        liName.appendChild(pName)

        var liEdit = document.createElement("li")
        liEdit.className = "four edit-btn"
        ul.appendChild(liEdit)

        var btnEdit = document.createElement("button")
        btnEdit.innerHTML = "Edit"
        liEdit.appendChild(btnEdit)
        btnEdit.addEventListener("click", function(){editList(ul)}, false);

        var liDelete = document.createElement("li")
        liDelete.className = "five"
        ul.appendChild(liDelete)

        var btnDelete = document.createElement("button")
        btnDelete.innerHTML = "Delete"
        liDelete.appendChild(btnDelete)
        btnDelete.addEventListener("click", function(){deleteList(ul)}, false);
    })(i);
}

function updateContactSelect(lists) {
    var contactSelect = document.getElementById("CreateContactListing");
    contactSelect.innerHTML = "";
    
    var campaignSelect = document.getElementById("CreateCampaignListing");
    campaignSelect.innerHTML = "";

    var blankOption = document.createElement("option");;
    blankOption.value = "";
    blankOption.innerHTML = "";

    contactSelect.appendChild(blankOption);
    campaignSelect.appendChild(blankOption.cloneNode(true));

    lists.forEach(element => {
        var option = document.createElement("option");
        option.value = element.id;
        option.innerHTML = element.name;

        contactSelect.appendChild(option);
        campaignSelect.appendChild(option.cloneNode(true));
    });
}

function listingUpdated() {
    const asyncListing = async () => {
        const result = await getAllListings()
        return result
    }
    (async () => {
        const listings = await asyncListing()
        updateListingList(listings)
        updateContactSelect(listings)
    })()
}

function editList(list) {
    console.log(list)    
}

function deleteList(list) {
    console.log(list)    
}