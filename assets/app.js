document.addEventListener("DOMContentLoaded", function() {


    // Live Search + Autocomplete

    const searchInput = document.getElementById("search");
    const eventsBody = document.getElementById("eventsBody");

    function fetchEvents(query = "") {
        fetch("search_events.php?q=" + encodeURIComponent(query))
            .then(response => response.text())
            .then(data => {
                eventsBody.innerHTML = data;
            });
    }

    if (searchInput && eventsBody) {
        fetchEvents();

        const suggestionBox = document.createElement("div");
        suggestionBox.className = "suggestion-box";
        suggestionBox.style.position = "absolute";
        suggestionBox.style.background = "#fff";
        suggestionBox.style.border = "1px solid #ccc";
        suggestionBox.style.zIndex = "1000";
        suggestionBox.style.display = "none";
        document.body.appendChild(suggestionBox);

        searchInput.addEventListener("keyup", function() {
            const query = this.value;
            fetchEvents(query);

            if (query.length > 0) {
                fetch("autocomplete.php?q=" + encodeURIComponent(query))
                    .then(response => response.json())
                    .then(suggestions => {
                        suggestionBox.innerHTML = "";
                        if (suggestions.length > 0) {
                            suggestionBox.style.display = "block";
                            suggestionBox.style.left = searchInput.getBoundingClientRect().left + "px";
                            suggestionBox.style.top = (searchInput.getBoundingClientRect().bottom + window.scrollY) + "px";
                            suggestionBox.style.width = searchInput.offsetWidth + "px";

                            suggestions.forEach(item => {
                                const div = document.createElement("div");
                                div.textContent = item;
                                div.className = "autocomplete-suggestion";
                                div.addEventListener("click", function() {
                                    searchInput.value = item;
                                    suggestionBox.style.display = "none";
                                    fetchEvents(item);
                                });
                                suggestionBox.appendChild(div);
                            });
                        } else {
                            suggestionBox.style.display = "none";
                        }
                    });
            } else {
                suggestionBox.style.display = "none";
            }
        });

        document.addEventListener("click", function(e) {
            if (e.target !== searchInput) {
                suggestionBox.style.display = "none";
            }
        });
    }


    // Live Validation (Add Event)

    const titleInput = document.querySelector("input[name='title']");
    if (titleInput) {
        titleInput.addEventListener("input", function() {
            fetch("validate_event.php?title=" + encodeURIComponent(this.value))
                .then(res => res.json())
                .then(data => {
                    let msg = document.getElementById("titleMsg");
                    if (!msg) {
                        msg = document.createElement("div");
                        msg.id = "titleMsg";
                        titleInput.insertAdjacentElement("afterend", msg);
                    }
                    msg.textContent = data.exists ? "Event already exists" : "Title available";
                    msg.className = data.exists ? "validation-msg error" : "validation-msg success";
                });
        });
    }


    // Ajax Delete

    document.addEventListener("click", function(e) {
        if (e.target.classList.contains("delete-btn")) {
            e.preventDefault(); //stop reload
            const row = e.target.closest("tr");
            fetch(e.target.href)
                .then(() => {
                    row.remove();
                });
        }
    });


    // Ajax Add (Optional Enhancement)

    const addForm = document.getElementById("addEventForm");
    if (addForm) {
        addForm.addEventListener("submit", function(e) {
            e.preventDefault(); //Stop reload
            const formData = new FormData(addForm);

            fetch(addForm.action, { method: "POST", body: formData })
                .then(res => res.text())
                .then(response => {
                    if (response.trim() === "success") { 
                        fetchEvents(); //refresh event list dynamically
                        addForm.reset(); //clear form  
                    } else { 
                        console.error("Failed to add event.")
                    }
                });
        });
    }


    // Live Search (Attendees)

    const attendeeSearch = document.getElementById("attendeeSearch");
    const attendeesBody = document.getElementById("attendeesBody");

    function fetchAttendees(query = "") {
        fetch("search_attendees.php?q=" + encodeURIComponent(query))
        .then(res => res.text())
        .then(data => {
            attendeesBody.innerHTML = data;
        });
    }

    if (attendeeSearch && attendeesBody) {
        fetchAttendees();

        attendeeSearch.addEventListener("input", function() {
            fetchAttendees(this.value);
        });
    }

});
