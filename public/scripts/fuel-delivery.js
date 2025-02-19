function addRow() {
    const tableBody = document.getElementById("table-body");
    const newRow = document.createElement("tr");

    newRow.innerHTML = `
        <td><input type="text" placeholder="Date"></td>
        <td><input type="text" placeholder="Description"></td>
        <td><input type="number" placeholder="Quantity"></td>
        <td><input type="text" placeholder="Unit"></td>
        <td><input type="number" placeholder="Unit Price"></td>
        <td><input type="number" placeholder="Amount"></td>
        <td><input type="number" placeholder="Ewura Levy"></td>
        <td><input type="number" placeholder="Net Amount"></td>
    `;

    tableBody.appendChild(newRow);
}
