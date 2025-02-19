@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manage Employees</h2>
    <button class="create-user-btn" onclick="showCreateUserModal()">Create User</button>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>strikes</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody id="employee-table-body">
            <!-- Users will be loaded dynamically -->
        </tbody>
    </table>
</div>

<!-- Create User Modal -->
<div id="createUserModal" style="display:none;">
    <h3>Add New User</h3>
    <form id="createUserForm">
        <input type="text" name="username" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <select name="role_id" id="roleDropdown" required>
            <option value="">Select Role</option>
        </select>
        <input type="password" name="password" placeholder="Password" required>

        <button type="button" onclick="createUser()">Create</button>
        <button type="button" onclick="hideCreateUserModal()">Close</button>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    fetchRoles();
    loadUsers();
});

// ✅ Fetch Roles and Populate Dropdown
function fetchRoles() {
    fetch("{{ url('/api/roles') }}")
        .then(response => response.json())
        .then(data => {
            let roleDropdown = document.getElementById("roleDropdown");
            roleDropdown.innerHTML = '<option value="">Select Role</option>';
            data.roles.forEach(role => {
                roleDropdown.innerHTML += `<option value="${role.id}">${role.name}</option>`;
            });
        })
        .catch(error => console.error("Error fetching roles:", error));
}

// ✅ Load Users into the Table
function loadUsers() {
    fetch("{{ url('/api/users') }}", {
        headers: {
            "Authorization": "Bearer {{ auth()->user()->createToken('API Token')->plainTextToken }}"
        }
    })
    .then(response => response.json())
    .then(data => {
        let tableBody = document.getElementById("employee-table-body");
        tableBody.innerHTML = "";
        data.forEach(user => {
            tableBody.innerHTML += `
                <tr>
                    <td>${user.name}</td>
                    <td>${user.email}</td>
                    <td>${user.phone_number}</td>
                    <td>${user.role ? user.role.name : 'N/A'}</td>
                    <td>
                        <button onclick="editUser(${user.id})">Edit</button>
                        <button onclick="deleteUser(${user.id})">Delete</button>
                    </td>
                </tr>
            `;
        });
    })
    .catch(error => console.error("Error loading users:", error));
}

// ✅ Create User Function
function createUser() {
    let formData = new FormData(document.getElementById("createUserForm"));

    fetch("{{ url('/api/users') }}", {
        method: "POST",
        headers: {
            "Authorization": "Bearer {{ auth()->user()->createToken('API Token')->plainTextToken }}",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("User created successfully!");
            hideCreateUserModal();
            loadUsers(); // Reload users in the table
        } else {
            alert("Error: " + data.message);
        }
    })
    .catch(error => console.error("Error creating user:", error));
}

// ✅ Delete User
function deleteUser(userId) {
    if (!confirm("Are you sure you want to delete this user?")) return;

    fetch("{{ url('/api/users') }}/" + userId, {
        method: "DELETE",
        headers: {
            "Authorization": "Bearer {{ auth()->user()->createToken('API Token')->plainTextToken }}",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("User deleted successfully!");
            loadUsers(); // Refresh the table
        } else {
            alert("Error: " + data.message);
        }
    })
    .catch(error => console.error("Error deleting user:", error));
}

// ✅ Show and Hide Modal Functions
function showCreateUserModal() {
    document.getElementById("createUserModal").style.display = "block";
}

function hideCreateUserModal() {
    document.getElementById("createUserModal").style.display = "none";
}
</script>
@endsection
