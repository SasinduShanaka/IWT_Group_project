document.getElementById("policyForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const policyNumber = document.getElementById("policyNumber").value;
    const policyName = document.getElementById("policyName").value;
    const premium = document.getElementById("premium").value;
    const coverage = document.getElementById("coverage").value;

    // Check if policy already exists to update or create new
    const existingPolicyRow = document.querySelector(`#policy-${policyNumber}`);
    if (existingPolicyRow) {
        // Update policy
        existingPolicyRow.querySelector('.name').textContent = policyName;
        existingPolicyRow.querySelector('.premium').textContent = premium;
        existingPolicyRow.querySelector('.coverage').textContent = coverage;
    } else {
        // Add new policy
        addPolicyToTable(policyNumber, policyName, premium, coverage);
    }

    // Reset form
    document.getElementById("policyForm").reset();
});

function addPolicyToTable(policyNumber, policyName, premium, coverage) {
    const tableBody = document.getElementById("policyTableBody");

    const row = document.createElement("tr");
    row.setAttribute("id", `policy-${policyNumber}`);
    row.innerHTML = `
        <td>${policyNumber}</td>
        <td class="name">${policyName}</td>
        <td class="premium">${premium}</td>
        <td class="coverage">${coverage}</td>
        <td class="actions">
            <button class="update" onclick="updatePolicy('${policyNumber}')">Update</button>
            <button onclick="deletePolicy('${policyNumber}')">Delete</button>
        </td>
    `;

    tableBody.appendChild(row);
}

function updatePolicy(policyNumber) {
    const policyRow = document.getElementById(`policy-${policyNumber}`);
    document.getElementById("policyNumber").value = policyNumber;
    document.getElementById("policyName").value = policyRow.querySelector('.name').textContent;
    document.getElementById("premium").value = policyRow.querySelector('.premium').textContent;
    document.getElementById("coverage").value = policyRow.querySelector('.coverage').textContent;
}

function deletePolicy(policyNumber) {
    const policyRow = document.getElementById(`policy-${policyNumber}`);
    policyRow.remove();
}
