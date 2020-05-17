<!DOCTYPE html>
<html>

<head>
    <title>Table</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>

<body onload="addRow()">

    <div class="container">
        <div class="row">
            <div class="form col-md-12">
                <br><br>
                <input type="button" class="btn btn-info" id="addRow" value="Add New Row" onclick="addRow()" />
                <br><br>
                <table class="table" id="_table" class="table">
                    <thead>
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Age</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                </table>
                <br>
                <input type="submit" class="btn btn-primary" id="bt" value="Submit Data" onclick="submit()" />
            </div>
        </div>
    </div>
</body>

<script>
    var arrHead = new Array();
    arrHead = ['First Name', 'Last Name', 'Age', '']; // table headers.

    // // first create a TABLE structure by adding few headers.
    // function createTable() {
    //     var empTable = document.createElement('table');
    //     empTable.setAttribute('id', 'empTable'); // table id.
    //     empTable.setAttribute('class', 'table');

    //     var tr = empTable.insertRow(-1);

    //     for (var h = 0; h < arrHead.length; h++) {
    //         var th = document.createElement('th'); // the header object.
    //         th.innerHTML = arrHead[h];
    //         tr.appendChild(th);
    //     }

    //     var div = document.getElementById('cont');
    //     div.appendChild(empTable); // add table to a container.
    // }

    // function to add new row.
    function addRow() {
        var empTab = document.getElementById('_table');

        var rowCnt = empTab.rows.length; // get the number of rows.
        var tr = empTab.insertRow(rowCnt); // table row.
        tr = empTab.insertRow(rowCnt);

        for (var c = 0; c < arrHead.length; c++) {
            var td = document.createElement('td'); // TABLE DEFINITION.
            td = tr.insertCell(c);

            if (c == 3) { // if its the first column of the table.
                // add a button control.
                var button = document.createElement('input');

                // set the attributes.
                button.setAttribute('type', 'button');
                button.setAttribute('value', 'Remove');
                button.setAttribute('class', 'btn btn-danger');

                // add button's "onclick" event.
                button.setAttribute('onclick', 'removeRow(this)');

                td.appendChild(button);
            } else {
                // the 2nd, 3rd and 4th column, will have textbox.
                var ele = document.createElement('input');
                ele.setAttribute('type', 'text');
                ele.setAttribute('value', '');
                ele.setAttribute('class', 'form-control');
                ele.setAttribute('required', '');


                td.appendChild(ele);
            }
        }
    }

    // function to delete a row.
    function removeRow(oButton) {
        var empTab = document.getElementById('_table');
        empTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // buttton -> td -> tr
    }

    // function to extract and submit table data.
    function submit() {
        var myTab = document.getElementById('_table');
        var arrValues = new Array();

        // loop through each row of the table.
        for (row = 1; row < myTab.rows.length - 1; row++) {
            // loop through each cell in a row.
            for (c = 0; c < myTab.rows[row].cells.length; c++) {
                var element = myTab.rows.item(row).cells[c];
                if (element.childNodes[0].getAttribute('type') == 'text') {


                    arrValues.push("'" + element.childNodes[0].value + "'");
                }
            }
        }

        // finally, show the result in the console.
        console.log(arrValues);
    }
</script>

</html>