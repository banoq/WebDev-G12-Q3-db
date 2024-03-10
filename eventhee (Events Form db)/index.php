<!DOCTYPE html>
<html>

<head>
    <style>
        #question {
            width: 95%;
            overflow: hidden;
            padding: 10px;
            font-size: 40px;
            margin-top: 20px
        }

        /* Add some basic CSS design */
        body {
            background-color: #f0f0f0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        input[type="text"] {
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
        }

        .edit-btn,
        .save-btn,
        .delete-btn {
            padding: 5px 10px;
            cursor: pointer;
            border: none;
            border-radius: 3px;
        }

        .edit-btn {
            background-color: #007bff;
            color: white;
        }

        .edit-btn:hover {
            background-color: #0056b3;
        }

        .save-btn {
            background-color: #28a745;
            color: white;
        }

        .save-btn:hover {
            background-color: #218838;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
    <title>Events</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    <!-- Your HTML content here -->

    <div class="overlay"></div>
    <div id="events-input" class="box">
        <div class="container">
            <form id="events-form" class="needs-validation">
                <div class="row g-4">
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="txtActivityID" required placeholder="-">
                            <label for="txtActivityID">Activity ID</label>
                            <div class="invalid-feedback">Please provide an Activity ID</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="txtClubID" required placeholder="-">
                            <label for="txtClubID">Club ID</label>
                            <div class="invalid-feedback">Please provide a Club ID</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="txtActivityName" required placeholder="-">
                            <label for="txtActivityName">Activity Name</label>
                            <div class="invalid-feedback">Activity Name is Required</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="txtDate" required placeholder="-">
                            <label for="txtDate">Date</label>
                            <div class="invalid-feedback">Date is Required</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="txtVenue" required placeholder="-">
                            <label for="txtVenue">Venue</label>
                            <div class="invalid-feedback">Venue is Required</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="txtPersonsInvolved" required placeholder="-">
                            <label for="txtPersonsInvolved">Persons Involved</label>
                            <div class="invalid-feedback">Persons Involved is Required</div>
                        </div>
                    </div>
                    <div class="col-md-3 mx-auto">
                        <button id="submit-btn" class="btn btn-primary" type="submit">Submit form</button>
                        <button id="reset-btn" type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table id="tableBorrower">
        <thead>
            <tr>
                <th class="ActivityID">Activity_ID</th>
                <th class="Club_ID">Club_ID</th>
                <th class="Activity_Name">Activity_Name</th>
                <th class="Date">Date</th>
                <th class="Venue">Venue</th>
                <th class="Persons_Involved">Persons_Involved</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="scheduleData"></tbody>
    </table>

    <script src="js/jquery-min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/events.js"></script>
</body>

</html>
