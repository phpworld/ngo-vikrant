<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-users me-2"></i>उपयोगकर्ता प्रबंधन
            </h1>
            <p class="text-muted mb-0">सभी सदस्यों की सूची और उनकी जानकारी</p>
        </div>
        <div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="fas fa-plus me-2"></i>नया उपयोगकर्ता जोड़ें
            </button>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row g-3 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            कुल सदस्य
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= count($users) ?>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-primary">
                            <i class="fas fa-users text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            सक्रिय सदस्य
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= count(array_filter($users, function($user) { return $user['status'] == 'active'; })) ?>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-success">
                            <i class="fas fa-user-check text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            निष्क्रिय सदस्य
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= count(array_filter($users, function($user) { return $user['status'] == 'inactive'; })) ?>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-warning">
                            <i class="fas fa-user-times text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            आज के नए सदस्य
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= count(array_filter($users, function($user) { 
                                return date('Y-m-d', strtotime($user['created_at'])) == date('Y-m-d'); 
                            })) ?>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-info">
                            <i class="fas fa-calendar text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

<!-- Users Table -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-list me-2"></i>सदस्यों की सूची
        </h6>
        <div class="d-flex gap-2">
            <div class="input-group" style="width: 250px;">
                <input type="text" class="form-control" id="searchUsers" placeholder="नाम या ईमेल खोजें...">
                <button class="btn btn-outline-secondary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <select class="form-select" id="statusFilter" style="width: 150px;">
                <option value="">सभी स्थिति</option>
                <option value="active">सक्रिय</option>
                <option value="inactive">निष्क्रिय</option>
            </select>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="usersTable">
                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">नाम</th>
                        <th class="px-4 py-3">उपयोगकर्ता नाम</th>
                        <th class="px-4 py-3">ईमेल</th>
                        <th class="px-4 py-3">फोन</th>
                        <th class="px-4 py-3">स्थिति</th>
                        <th class="px-4 py-3">पंजीकरण दिनांक</th>
                        <th class="px-4 py-3">कार्य</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr data-user-id="<?= $user['id'] ?>">
                                <td class="px-4 py-3"><?= esc($user['id']) ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar me-2">
                                                <div class="avatar-initial rounded-circle bg-label-primary">
                                                    <?= strtoupper(substr(esc($user['full_name']), 0, 1)) ?>
                                                </div>
                                            </div>
                                            <div>
                                                <h6 class="mb-0"><?= esc($user['full_name']) ?></h6>
                                                <small class="text-muted">आधार: <?= esc($user['aadhar_number']) ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= esc($user['username']) ?></td>
                                    <td><?= esc($user['email']) ?></td>
                                    <td><?= esc($user['phone']) ?></td>
                                    <td>
                                        <span class="badge <?= $user['status'] == 'active' ? 'bg-success' : 'bg-warning' ?>">
                                            <?= $user['status'] == 'active' ? 'सक्रिय' : 'निष्क्रिय' ?>
                                        </span>
                                    </td>
                                    <td><?= date('d/m/Y', strtotime($user['created_at'])) ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#" onclick="viewUser(<?= $user['id'] ?>)">
                                                    <i class="fas fa-eye me-2"></i>विवरण देखें
                                                </a></li>
                                                <li><a class="dropdown-item" href="#" onclick="editUser(<?= $user['id'] ?>)">
                                                    <i class="fas fa-edit me-2"></i>संपादित करें
                                                </a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="/admin/toggle-user-status/<?= $user['id'] ?>">
                                                    <i class="fas fa-toggle-<?= $user['status'] == 'active' ? 'off' : 'on' ?> me-2"></i>
                                                    <?= $user['status'] == 'active' ? 'निष्क्रिय करें' : 'सक्रिय करें' ?>
                                                </a></li>
                                                <li><a class="dropdown-item text-danger" href="#" onclick="deleteUser(<?= $user['id'] ?>)">
                                                    <i class="fas fa-trash me-2"></i>हटाएं
                                                </a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="fas fa-users fa-3x mb-3"></i>
                                        <p>कोई सदस्य नहीं मिला</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">नया उपयोगकर्ता जोड़ें</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addUserForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">पूरा नाम</label>
                                <input type="text" class="form-control" name="full_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">उपयोगकर्ता नाम</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">ईमेल</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">फोन नंबर</label>
                                <input type="tel" class="form-control" name="phone" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">पता</label>
                        <textarea class="form-control" name="address" rows="3" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">आधार नंबर</label>
                                <input type="text" class="form-control" name="aadhar_number" maxlength="12" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">पासवर्ड</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">रद्द करें</button>
                <button type="button" class="btn btn-primary" onclick="addUser()">उपयोगकर्ता जोड़ें</button>
            </div>
        </div>
    </div>
</div>

<!-- User Details Modal -->
<div class="modal fade" id="userDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">उपयोगकर्ता विवरण</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="userDetailsContent">
                <!-- User details will be loaded here -->
            </div>
        </div>
    </div>
</div>

<style>
.avatar {
    width: 40px;
    height: 40px;
}
.avatar-initial {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    color: white;
}
.bg-label-primary {
    background-color: #667eea !important;
}
.border-left-primary {
    border-left: 0.25rem solid #667eea !important;
}
.border-left-success {
    border-left: 0.25rem solid #28a745 !important;
}
.border-left-warning {
    border-left: 0.25rem solid #ffc107 !important;
}
.border-left-info {
    border-left: 0.25rem solid #17a2b8 !important;
}
</style>

<script>
function searchUsers() {
    const searchTerm = document.getElementById('searchUsers').value.toLowerCase();
    const statusFilter = document.getElementById('statusFilter').value;
    const rows = document.querySelectorAll('#usersTable tbody tr[data-user-id]');
    
    rows.forEach(row => {
        const name = row.cells[1].textContent.toLowerCase();
        const email = row.cells[3].textContent.toLowerCase();
        const status = row.cells[5].textContent.toLowerCase();
        
        const matchesSearch = name.includes(searchTerm) || email.includes(searchTerm);
        const matchesStatus = !statusFilter || status.includes(statusFilter === 'active' ? 'सक्रिय' : 'निष्क्रिय');
        
        row.style.display = matchesSearch && matchesStatus ? '' : 'none';
    });
}

document.getElementById('searchUsers').addEventListener('input', searchUsers);
document.getElementById('statusFilter').addEventListener('change', searchUsers);

function viewUser(userId) {
    // Implementation for viewing user details
    console.log('View user:', userId);
}

function editUser(userId) {
    // Implementation for editing user
    console.log('Edit user:', userId);
}

function deleteUser(userId) {
    if (confirm('क्या आप वाकई इस उपयोगकर्ता को हटाना चाहते हैं?')) {
        window.location.href = '/admin/delete-user/' + userId;
    }
}

function addUser() {
    // Implementation for adding new user
    const form = document.getElementById('addUserForm');
    const formData = new FormData(form);
    
    // Add form submission logic here
    console.log('Add user form submitted');
}
</script>

<?= $this->endSection() ?>