document.getElementById("policyForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const PolicyID = document.getElementById("PolicyID").value;
    const PkgID = document.getElementById("PkgID").value;
    const Policytype = document.getElementById("Policytype").value;
    const Policystatus = document.getElementById("Policystatus").value;
    const EffectiveDate = document.getElementById("EffectiveDate").value;
    const ExpirationDate = document.getElementById("ExpirationDate").value;

    // Check if policy already exists to update or create new
    const existingPolicyRow = document.querySelector(`#policy-${PolicyID}`);
    if (existingPolicyRow) {
        // Update policy
        existingPolicyRow.querySelector('.PkgID').textContent = PkgID;
        existingPolicyRow.querySelector('.Policytype').textContent = Policytype;
        existingPolicyRow.querySelector('.Policystatus').textContent = Policystatus;
        existingPolicyRow.querySelector('.EffectiveDate').textContent = EffectiveDate;
        existingPolicyRow.querySelector('.ExpirationDate').textContent = ExpirationDate;
        alert("Already existing.");
    } else {
        // Add new policy
        addPolicyToTable(PolicyID, PkgID, Policytype, Policystatus, EffectiveDate, ExpirationDate);
    }

    // Reset form
    document.getElementById("policyForm").reset();
});

function addPolicyToTable(PolicyID, PkgID, Policytype, Policystatus, EffectiveDate, ExpirationDate) {
    const tableBody = document.getElementById("policyTableBody");

    const row = document.createElement("tr");
    row.setAttribute("id", `policy-${PolicyID}`);
    row.innerHTML = `
        <td>${PolicyID}</td>
        <td class="PkgID">${PkgID}</td>
        <td class="Policytype">${Policytype}</td>
        <td class="Policystatus">${Policystatus}</td>
        <td class="EffectiveDate">${EffectiveDate}</td>
        <td class="ExpirationDate">${ExpirationDate}</td>
        <td class="actions">
            <button class="update" onclick="updatePolicy('${PolicyID}')">Update</button>
            <button onclick="deletePolicy('${PolicyID}')">Delete</button>
        </td>
    `;

    tableBody.appendChild(row);
}

function updatePolicy(policyID) {
    const policyRow = document.getElementById(`policy-${policyID}`);
    document.getElementById("PolicyID").value = policyID;
    document.getElementById("PkgID").value = policyRow.querySelector('.PkgID').textContent;
    document.getElementById("Policytype").value = policyRow.querySelector('.Policytype').textContent;
    document.getElementById("Policystatus").value = policyRow.querySelector('.Policystatus').textContent;
    document.getElementById("EffectiveDate").value = policyRow.querySelector('.EffectiveDate').textContent;
    document.getElementById("ExpirationDate").value = policyRow.querySelector('.ExpirationDate').textContent;
}

function deletePolicy(policyID) {
    const policyRow = document.getElementById(`policy-${policyID}`);
    policyRow.remove();
}
