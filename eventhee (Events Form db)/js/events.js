$(document).ready(function() {
    // Define addEventData function
    function addEventData(Activity_ID, Club_ID, Activity_Name, Date, Venue, Persons_Involved) {
        $.ajax({
            url: "php/add_event.php",
            method: "POST",
            data: {
                Activity_ID: Activity_ID,
                Club_ID: Club_ID,
                Activity_Name: Activity_Name,
                Date: Date,
                Venue: Venue,
                Persons_Involved: Persons_Involved
            },
            success: function(response) {
                console.log("Event added successfully:", response);
                // Refresh the events data after adding a new event
                fetchEventsData();
            },
            error: function(error) {
                console.error("Error adding event:", error);
            }
        });
    }

    // Define fetchEventsData function
    function fetchEventsData() {
        $.ajax({
            url: "php/events.php",
            method: "POST",
            data: { transaction: "GET_EVENTS_DATA" },
            success: function(data) {
                var events = JSON.parse(data);
                $("#tableBorrower tbody").empty();

                events.forEach(function(item) {
                    var row = `<tr>
                    <td>${item.Activity_ID}</td>
                    <td>${item.Club_ID}</td>
                    <td><span class="editable">${item.Activity_Name}</span></td>
                    <td><span class="editable">${item.Date}</span></td>
                    <td><span class="editable">${item.Venue}</span></td>
                    <td><span class="editable">${item.Persons_Involved}</span></td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="save-btn" style="display: none;">Save</button>
                        <button class="delete-btn">Delete</button>
                    </td>
                    </tr>`;
                    $("#tableBorrower tbody").append(row);
                });
            },
            error: function(error) {
                console.error("Error fetching events data:", error);
            }
        });
    }

    // Handle form submission
    $("#events-form").submit(function(event) {
        event.preventDefault(); // Prevent default form submission behavior

        var Activity_ID = $("#txtActivityID").val();
        var Club_ID = $("#txtClubID").val();
        var Activity_Name = $("#txtActivityName").val();
        var Date = $("#txtDate").val();
        var Venue = $("#txtVenue").val();
        var Persons_Involved = $("#txtPersonsInvolved").val();

        // Log form submission data
        console.log("Form submitted with data:", Activity_ID, Club_ID, Activity_Name, Date, Venue, Persons_Involved);

        // Call the function to add data to the database
        addEventData(Activity_ID, Club_ID, Activity_Name, Date, Venue, Persons_Involved);
    });

    // Edit button click event handler
    $(document).on("click", ".edit-btn", function() {
        var row = $(this).closest("tr");
        row.find(".editable").attr("contenteditable", true).addClass("editable-active");
        row.find(".edit-btn").hide();
        row.find(".save-btn").show();
    });

    // Save button click event handler
    $(document).on("click", ".save-btn", function() {
        var row = $(this).closest("tr");
        var Activity_ID = row.find("td:eq(0)").text();
        var Club_ID = row.find("td:eq(1)").text();
        var Activity_Name = row.find("td:eq(2) .editable").text(); // Corrected selector
        var Date = row.find("td:eq(3) .editable").text(); // Corrected selector
        var Venue = row.find("td:eq(4) .editable").text(); // Corrected selector
        var Persons_Involved = row.find("td:eq(5) .editable").text(); // Corrected selector

        // Send updated data to the server for saving
        $.ajax({
            url: "php/update_events.php",
            method: "POST",
            data: {
                Activity_ID: Activity_ID,
                Club_ID: Club_ID,
                Activity_Name: Activity_Name,
                Date: Date,
                Venue: Venue,
                Persons_Involved: Persons_Involved
            },
            success: function(response) {
                console.log("Event updated successfully:", response);
                row.find(".editable").attr("contenteditable", false).removeClass("editable-active");
                row.find(".edit-btn").show();
                row.find(".save-btn").hide();
            },
            error: function(error) {
                console.error("Error updating event:", error);
            }
        });
    });

    // Delete button click event handler
    $(document).on("click", ".delete-btn", function() {
        var row = $(this).closest("tr");
        var Activity_ID = row.find("td:eq(0)").text();

        // Confirm deletion
        if (confirm("Are you sure you want to delete this event?")) {
            // Send request to delete the event
            $.ajax({
                url: "php/delete_event.php",
                method: "POST",
                data: { Activity_ID: Activity_ID },
                success: function(response) {
                    console.log("Event deleted successfully:", response);
                    // Remove the row from the table
                    row.remove();
                },
                error: function(error) {
                    console.error("Error deleting event:", error);
                }
            });
        }
    });

    // Fetch events data when the page loads
    fetchEventsData();
});