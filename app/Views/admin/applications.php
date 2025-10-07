<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-file-alt me-2"></i>आवेदन प्रबंधन
            </h1>
            <p class="text-muted mb-0">सभी आवेदनों की स्थिति और प्रबंधन</p>
        </div>
        <div>
            <button class="btn btn-success" onclick="exportApplications()">
                <i class="fas fa-download me-2"></i>एक्सपोर्ट करें
            </button>
        </div>
    </div>
</div>

<!-- Workflow Information -->
<div class="alert alert-info d-flex align-items-center mb-4">
    <i class="fas fa-info-circle me-3 fa-lg"></i>
    <div>
        <strong>कार्यप्रणाली:</strong> 
        आवेदनों को स्वीकृत/अस्वीकृत करने के लिए पहले "विवरण देखें" बटन पर क्लिक करें। 
        विस्तृत जानकारी देखने के बाद ही आप उचित निर्णय ले सकेंगे।
    </div>
</div>

<!-- Statistics Cards -->
<div class="row g-3 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            कुल आवेदन
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= count($applications) ?>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-info">
                            <i class="fas fa-clipboard-list text-white"></i>
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
                            लंबित आवेदन
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= count(array_filter($applications, function($app) { return $app['status'] == 'pending'; })) ?>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-warning">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">स्वीकृत आवेदन</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= count(array_filter($applications, function($app) { return $app['status'] == 'approved'; })) ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">अस्वीकृत आवेदन</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= count(array_filter($applications, function($app) { return $app['status'] == 'rejected'; })) ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Applications Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">आवेदनों की सूची</h6>
            <div class="d-flex gap-2">
                <select class="form-select" id="statusFilter" style="width: 150px;">
                    <option value="">सभी स्थिति</option>
                    <option value="pending">लंबित</option>
                    <option value="approved">स्वीकृत</option>
                    <option value="rejected">अस्वीकृत</option>
                </select>
                <select class="form-select" id="typeFilter" style="width: 150px;">
                    <option value="">सभी प्रकार</option>
                    <option value="vivah_help">विवाह सहायता</option>
                    <option value="death_help">मृत्यु सहायता</option>
                </select>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="applicationsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>आवेदक का नाम</th>
                            <th>आवेदन प्रकार</th>
                            <th>राशि</th>
                            <th>स्थिति</th>
                            <th>आवेदन दिनांक</th>
                            <th>विवरण देखें</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($applications)): ?>
                            <?php foreach ($applications as $application): ?>
                                <tr data-app-id="<?= $application['id'] ?>">
                                    <td><?= esc($application['id']) ?></td>
                                    <td>
                                        <div>
                                            <h6 class="mb-0"><?= esc($application['applicant_name']) ?></h6>
                                            <small class="text-muted"><?= esc($application['email']) ?></small>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">
                                            <?= $application['application_type'] == 'vivah_help' ? 'विवाह सहायता' : 'मृत्यु सहायता' ?>
                                        </span>
                                    </td>
                                    <td>₹<?= number_format($application['application_amount']) ?></td>
                                    <td>
                                        <span class="badge 
                                            <?= $application['status'] == 'pending' ? 'bg-warning' : 
                                                ($application['status'] == 'approved' ? 'bg-success' : 'bg-danger') ?>">
                                            <?= $application['status'] == 'pending' ? 'लंबित' : 
                                                ($application['status'] == 'approved' ? 'स्वीकृत' : 'अस्वीकृत') ?>
                                        </span>
                                    </td>
                                    <td><?= date('d/m/Y', strtotime($application['created_at'])) ?></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-primary" onclick="viewApplication(<?= $application['id'] ?>)" 
                                                    title="विवरण देखें">
                                                <i class="fas fa-eye me-1"></i>विवरण देखें
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="fas fa-clipboard-list fa-3x mb-3"></i>
                                        <p>कोई आवेदन नहीं मिला</p>
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

<!-- Application Details Modal -->
<div class="modal fade" id="applicationDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">आवेदन विवरण</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="applicationDetailsContent">
                <!-- Application details will be loaded here -->
            </div>
        </div>
    </div>
</div>

<style>
.border-left-primary { border-left: 0.25rem solid #667eea !important; }
.border-left-success { border-left: 0.25rem solid #28a745 !important; }
.border-left-warning { border-left: 0.25rem solid #ffc107 !important; }
.border-left-info { border-left: 0.25rem solid #17a2b8 !important; }
.border-left-danger { border-left: 0.25rem solid #dc3545 !important; }
</style>

<script>
function filterApplications() {
    const statusFilter = document.getElementById('statusFilter').value;
    const typeFilter = document.getElementById('typeFilter').value;
    const rows = document.querySelectorAll('#applicationsTable tbody tr[data-app-id]');
    
    rows.forEach(row => {
        const status = row.cells[4].textContent.toLowerCase();
        const type = row.cells[2].textContent.toLowerCase();
        
        const matchesStatus = !statusFilter || 
            (statusFilter === 'pending' && status.includes('लंबित')) ||
            (statusFilter === 'approved' && status.includes('स्वीकृत')) ||
            (statusFilter === 'rejected' && status.includes('अस्वीकृत'));
            
        const matchesType = !typeFilter ||
            (typeFilter === 'vivah_help' && type.includes('विवाह')) ||
            (typeFilter === 'death_help' && type.includes('मृत्यु'));
        
        row.style.display = matchesStatus && matchesType ? '' : 'none';
    });
}

document.getElementById('statusFilter').addEventListener('change', filterApplications);
document.getElementById('typeFilter').addEventListener('change', filterApplications);

function viewApplication(applicationId) {
    // Redirect to application details page
    window.location.href = '/admin/application-details/' + applicationId;
}

function exportApplications() {
    // Implementation for exporting applications
    window.location.href = '/admin/export-applications';
}
</script>

<?= $this->endSection() ?>