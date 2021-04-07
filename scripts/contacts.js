document.getElementById("CreateContactInput").addEventListener("click", function(event) {
    event.preventDefault()
    var email = document.getElementById("ContactEmailInput").value;
    var list = document.getElementById("CreateContactListing").value;
    if (email == "" || list == "") {
        alert("Please fill all the contact fields")
        return;
    }else {
        $.ajax({
            url: server + "/functions/contact/createContact.php",
            type: "POST",
            data: {
                'email': email,
                'list_id': list
            },
            success: function (data) {
                if (data == "true") {
                    contactsUpdated()            
                } else {
                    alert("Something went wrong when creating the new contact")
                }
            }
        });
    }
})

async function getAllContacts() {
    return new Promise(resolve => {
        fetch(server + "/functions/contact/getAllContacts.php")
            .then((response) => response.json())
            .then(function (response) {
                resolve(response)
        });
    });
}

function updateContactsList(contacts) {
    var listSection = document.getElementById("ContactList")
    listSection.innerHTML = ""
    
    for (var i = 0; i < contacts.length; i++) (function(i) {
        var ul = document.createElement("ul")
        ul.className = "card"
        listSection.appendChild(ul)

        var liEmail = document.createElement("li")
        liEmail.className = "one"
        ul.appendChild(liEmail)

        var pEmail = document.createElement("p")
        pEmail.innerHTML = contacts[i].email
        liEmail.appendChild(pEmail)

        var liList = document.createElement("li")
        liList.className = "two"
        ul.appendChild(liList)

        var pList = document.createElement("p")
        pList.innerHTML = contacts[i].name
        liList.appendChild(pList)

        var liEdit = document.createElement("li")
        liEdit.className = "four edit-btn"
        ul.appendChild(liEdit)

        var btnEdit = document.createElement("button")
        btnEdit.innerHTML = "Edit"
        liEdit.appendChild(btnEdit)
        btnEdit.addEventListener("click", function(){editContact(ul)}, false);

        var liDelete = document.createElement("li")
        liDelete.className = "five"
        ul.appendChild(liDelete)

        var btnDelete = document.createElement("button")
        btnDelete.innerHTML = "Delete"
        liDelete.appendChild(btnDelete)
        btnDelete.addEventListener("click", function(){deleteContact(ul)}, false);
    })(i);
}

function contactsUpdated() {
    const asyncContact = async () => {
        const result = await getAllContacts()
        return result
    }
    (async () => {
        const contacts = await asyncContact()
        updateContactsList(contacts)
    })()
}

function editContact(list) {
    console.log(list)
}

function deleteContact(list) {
    console.log(list)
}