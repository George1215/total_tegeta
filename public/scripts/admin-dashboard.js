document.addEventListener("DOMContentLoaded", function () {
    const contentArea = document.getElementById("content-area");
    const employeesTab = document.querySelector(".employees-tab");

    if (employeesTab) {
        employeesTab.addEventListener("click", function () {
            loadEmployees();
        });
    }

    // Attach event listeners globally for modal and form submission
    document.addEventListener("click", function (event) {
        if (event.target && event.target.id === "openCreateUserModal") {
            showCreateUserModal();
        }
        if (event.target && event.target.id === "modalOverlay") {
            closeCreateUserModal();
        }
    });

    // document.addEventListener("submit", function (event) {
    //     if (event.target && event.target.id === "createUserForm") {
    //         event.preventDefault();
    //         createUser(); // Call the function when form is submitted
    //     }
    // });

    function loadEmployees() {
        console.log("Loading employees...");
        contentArea.innerHTML = `
            <div class="employee-container">
                <div class="employee-left">
                    <h2 class="employee-title">Create and Manage Employees</h2>
                    <button class="create-user-btn" id="openCreateUserModal">Create User</button>

                    <table class="employee-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th>Role</th>
                                <th>Strikes</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="employee-table-body"></tbody>
                    </table>
                </div>

                <div class="employee-right">
                    <h3 class="overview-title">Detailed Overview</h3>
                    <div class="rank-container">
                        <div class="gauge"><div class="gauge-cover">-</div></div>
                        <p class="monthly-rank">Monthly rank</p>
                    </div>

                    <div class="sales-performance">
                        <div class="liters-container">
                            <p class="sales-text"><strong>2343434</strong> AGO</p>
                            <p class="sales-text"><strong>2343434</strong> MSP</p>
                        </div>
                        <a href="#" class="sales-link">Liters Sold / Month</a>
                    </div>

                    <div class="employee-background">
                        <h4 class="background-title">Background</h4>
                        <p><span class="label">Name:</span> <span id="emp-name">-</span></p>
                        <p><span class="label">Email:</span> <span id="emp-email">-</span></p>
                        <p><span class="label">Phone:</span> <span id="emp-phone">-</span></p>
                        <p><span class="label">Role:</span> <span id="emp-role">-</span></p>
                        <p><span class="label">Strikes:</span> <span id="emp-strikes">-</span></p>
                        <p><span class="label">Status:</span> <span id="emp-status">-</span></p>
                    </div>
                </div>
            </div>
        `;

        // loadEmployeeData();
        loadRoles();
    }

    // function loadEmployeeData() {
    //     fetch('/api/users', {
    //         method: 'GET',
    //         headers: {
    //             "Authorization": "Bearer " + localStorage.getItem('authToken') // ✅ ADD TOKEN HERE
    //         }
    //     })
    //     .then(response => {
    //         if (!response.ok) {
    //             throw new Error("HTTP error! Status: " + response.status);
    //         }
    //         return response.json();
    //     })
    //     .then(data => {
    //         console.log("✅ User Data Loaded:", data);
            
    //         if (!data.success) {
    //             console.error("❌ API Error:", data.message);
    //             return;
    //         }
    
    //         const employeeTableBody = document.getElementById("employee-table-body");
    //         employeeTableBody.innerHTML = data.users.map(user => `
    //             <tr onclick="updateEmployeeOverview(${user.id})">
    //                 <td>${user.name}</td>
    //                 <td>${user.email ?? '-'}</td>
    //                 <td>${user.phone_number ?? '-'}</td>
    //                 <td>${user.role ? user.role.name : '-'}</td>
    //                 <td>${user.strikes ?? '0'}</td>
    //                 <td>${user.status ?? 'Active'}</td>
    //             </tr>
    //         `).join('');
    //     })
    //     .catch(error => console.error('❌ Error loading users:', error));
    // }
    

    function createUser(event) {
        event.preventDefault();
        
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const phone_number = document.getElementById("phone_number").value;
        const role = document.getElementById("role").value;
        const password = document.getElementById("password").value;
    
        const requestData = {
            name: name,
            email: email,
            phone_number: phone_number,
            role_id: role, // ✅ Ensure role_id is used correctly
            password: password
        };
    
        console.log("🔵 Sending User Creation Request:", requestData);
    
        fetch("http://127.0.0.1:8000/api/users", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "Authorization": "Bearer " + localStorage.getItem('authToken') // ✅ ADD TOKEN HERE
            },
            body: JSON.stringify(requestData)
        })
        .then(response => response.json())
        .then(data => {
            console.log("🟢 API Response:", data);
    
            if (data.success) {
                alert("✅ User created successfully!");
                closeCreateUserModal(); // ✅ Close modal
            } else {
                alert(`❌ Error: ${data.message}`);
            }
        })
        .catch(error => {
            console.error("❌ Error creating user:", error);
            alert("❌ Failed to create user. Check console for details.");
        });
    }
    
    // ✅ Ensure the form submission calls `createUser()`
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("createUserForm").addEventListener("submit", function(event) {
            event.preventDefault();
            createUser(event);
        });
    
        loadRoles(); // ✅ Ensure roles are preloaded on page load
    });
    
    
    
    function updateEmployeeOverview(userId) {
        fetch(`/api/users/${userId}`)
            .then(response => response.json())
            .then(user => {
                document.getElementById("emp-name").textContent = user.name;
                document.getElementById("emp-email").textContent = user.email || "-";
                document.getElementById("emp-phone").textContent = user.phone_number || "-";
                document.getElementById("emp-role").textContent = user.role.name;
                document.getElementById("emp-strikes").textContent = user.strikes ?? '0';
                document.getElementById("emp-status").textContent = user.status ?? 'Active';

                const rankGauge = document.querySelector(".gauge");
                const rankCover = document.querySelector(".gauge-cover");

                let rank = user.rank || 7; 
                rankGauge.style.background = `conic-gradient(green ${rank * 10}%, lightgray ${100 - rank * 10}%)`;
                rankCover.textContent = rank;
            })
            .catch(error => console.error('Error fetching user details:', error));
    }

    function showCreateUserModal() {
        loadRoles(); // ✅ Ensure roles load when modal opens
        document.getElementById("createUserModal").style.display = "flex";
        document.getElementById("modalOverlay").style.display = "block";
    }
    
    
    function closeCreateUserModal() {
        document.getElementById("createUserModal").style.display = "none";
        document.getElementById("modalOverlay").style.display = "none";
    }

    function loadRoles() {
        fetch('/api/roles')
            .then(response => response.json())
            .then(data => {
                const roleDropdown = document.getElementById("role");
                roleDropdown.innerHTML = '<option value="">Select Role</option>'; // Reset first
    
                data.roles.forEach(role => {
                    roleDropdown.innerHTML += `<option value="${role.id}">${role.name}</option>`;
                });
    
                console.log("✅ Roles loaded successfully:", data.roles);
            })
            .catch(error => console.error("❌ Error loading roles:", error));
    }
    
});

// ✅ Ensure modal + overlay are outside `loadEmployees()` to prevent re-creation
document.body.insertAdjacentHTML('beforeend', `
    <div id="modalOverlay" class="modal-overlay"></div>
    <div id="createUserModal" class="modal">
        <div class="modal-content">
            <h2>Create New User</h2>
            <form id="createUserForm">
                <label>Name:</label>
                <input type="text" id="name" required>

                <label>Email:</label>
                <input type="email" id="email" required>

                <label>Phone No:</label>
                <input type="text" id="phone_number" required>

                <label>Role:</label>
                <select id="role" required></select>

                <label>Password:</label>
                <input type="password" id="password" required>

                <button type="submit">Create User</button>
            </form>
        </div>
    </div>
`);
