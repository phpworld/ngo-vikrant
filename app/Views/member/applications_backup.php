<?= $this->extend('member/dashboard') ?>

<?= $this->section('content') ?>

<!-- Override page header -->
<div class="page-header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1><i class="fas fa-file-alt me-3"></i><?= esc($title) ?></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/">होम</a></li>
                        <li class="breadcrumb-item"><a href="/member/dashboard">डैशबोर्ड</a></li>
                        <li class="breadcrumb-item active" aria-current="page">आवेदन</li>
                    </ol>
                </nav>
            </div>
            <div class="text-end">
                <a href="/member/apply-vivah-help" class="btn btn-light me-2">
                    <i class="fas fa-ring me-1"></i>विवाह सहायता
                </a>
                <a href="/member/apply-death-help" class="btn btn-light">
                    <i class="fas fa-hands-praying me-1"></i>मृत्यु सहायता
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <!-- Filters -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="btn-group" role="group">
                <input type="radio" class="btn-check" name="filter" id="all" autocomplete="off" checked>
                <label class="btn btn-outline-primary" for="all">
                    <i class="fas fa-list me-1"></i>सभी (<?= count($applications) ?>)
                </label>
                
                <input type="radio" class="btn-check" name="filter" id="pending" autocomplete="off">
                <label class="btn btn-outline-warning" for="pending">
                    <i class="fas fa-clock me-1"></i>लंबित
                </label>
                
                <input type="radio" class="btn-check" name="filter" id="approved" autocomplete="off">
                <label class="btn btn-outline-success" for="approved">
                    <i class="fas fa-check me-1"></i>स्वीकृत
                </label>
                
                <input type="radio" class="btn-check" name="filter" id="rejected" autocomplete="off">
                <label class="btn btn-outline-danger" for="rejected">
                    <i class="fas fa-times me-1"></i>अस्वीकृत
                </label>
            </div>
        </div>
        <div class="col-md-4 text-end">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="खोजें..." id="searchInput">
                <button class="btn btn-outline-secondary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Applications Table -->
    <div class="card-modern">
        <div class="card-body p-0">
            <?php if (!empty($applications)): ?>
                <div class="table-responsive">
                    <table class="table table-modern" id="applicationsTable">
                        <thead>
                            <tr>
                                <th>आवेदन संख्या</th>
                                <th>प्रकार</th>
                                <th>आवेदक नाम</th>
                                <th>राशि</th>
                                <th>स्थिति</th>
                                <th>आवेदन दिनांक</th>
                                <th>अपडेट</th>
                                <th>कार्य</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($applications as $application): ?>
                                <tr data-status="<?= $application['status'] ?>" data-type="<?= $application['application_type'] ?>">
                                    <td><span class="fw-bold text-primary">#<?= $application['id'] ?></span></td>
                                    <td>
                                        <?php
                                        $types = [
                                            'vivah_help' => '<span class="badge bg-info"><i class="fas fa-ring me-1"></i>विवाह सहायता</span>',
                                            'death_help' => '<span class="badge bg-dark"><i class="fas fa-hands-praying me-1"></i>मृत्यु सहायता</span>',
                                            'education_help' => '<span class="badge bg-success"><i class="fas fa-graduation-cap me-1"></i>शिक्षा सहायता</span>'
                                        ];
                                        echo $types[$application['application_type']] ?? $application['application_type'];
                                        ?>
                                    </td>
                                    <td><?= esc($application['applicant_name']) ?></td>
                                    <td><span class="fw-bold">₹<?= number_format($application['application_amount']) ?></span></td>
                                    <td>
                                        <?php
                                        $statusClasses = [
                                            'pending' => 'badge-pending',
                                            'approved' => 'badge-approved',
                                            'rejected' => 'badge-rejected'
                                        ];
                                        $statusText = [
                                            'pending' => 'लंबित',
                                            'approved' => 'स्वीकृत',
                                            'rejected' => 'अस्वीकृत'
                                        ];
                                        ?>
                                        <span class="badge-status <?= $statusClasses[$application['status']] ?? 'badge-pending' ?>">
                                            <?= $statusText[$application['status']] ?? $application['status'] ?>
                                        </span>
                                    </td>
                                    <td><?= date('d/m/Y', strtotime($application['created_at'])) ?></td>
                                    <td><?= date('d/m/Y', strtotime($application['updated_at'])) ?></td>
                                    <td>
                                        <button class="btn btn-outline-gradient btn-sm" onclick="viewApplication(<?= $application['id'] ?>)">
                                            <i class="fas fa-eye me-1"></i>देखें
                                        </button>
                                        <?php if ($application['status'] === 'approved' && !empty($application['approved_amount'])): ?>
                                            <span class="badge bg-success ms-1">₹<?= number_format($application['approved_amount']) ?></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="fas fa-file-alt fa-4x text-muted mb-4"></i>
                    <h5 class="text-muted mb-3">कोई आवेदन नहीं मिला</h5>
                    <p class="text-muted mb-4">आप अभी तक कोई आवेदन नहीं किया है। नीचे दिए गए विकल्पों में से चुनें।</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="/member/apply-vivah-help" class="btn btn-gradient">
                            <i class="fas fa-ring me-2"></i>विवाह सहायता आवेदन
                        </a>
                        <a href="/member/apply-death-help" class="btn btn-outline-gradient">
                            <i class="fas fa-hands-praying me-2"></i>मृत्यु सहायता आवेदन
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Application Details Modal -->
<div class="modal fade" id="applicationModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">आवेदन विवरण</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="applicationDetails">
                <!-- Content loaded via JavaScript -->
            </div>
        </div>
    </div>
</div>

<script>
// Filter functionality
document.querySelectorAll('input[name="filter"]').forEach(radio => {
    radio.addEventListener('change', () => {
        const filter = radio.id;
        const rows = document.querySelectorAll('#applicationsTable tbody tr');
        
        rows.forEach(row => {
            const status = row.getAttribute('data-status');
            
            if (filter === 'all' || filter === status) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});

// Search functionality
document.getElementById('searchInput').addEventListener('input', (e) => {
    const searchTerm = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('#applicationsTable tbody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? '' : 'none';
    });
});

// View application details
function viewApplication(id) {
    // This would typically fetch data via AJAX
    document.getElementById('applicationDetails').innerHTML = `
        <div class="text-center py-4">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">लोड हो रहा है...</span>
            </div>
            <p class="mt-2">आवेदन विवरण लोड हो रहा है...</p>
        </div>
    `;
    
    new bootstrap.Modal(document.getElementById('applicationModal')).show();
    
    // Simulate loading
    setTimeout(() => {
        document.getElementById('applicationDetails').innerHTML = `
            <div class="row">
                <div class="col-md-6">
                    <h6>आवेदन संख्या</h6>
                    <p class="fw-bold">#${id}</p>
                </div>
                <div class="col-md-6">
                    <h6>स्थिति</h6>
                    <span class="badge-status badge-pending">लंबित</span>
                </div>
            </div>
            <hr>
            <p class="text-muted">पूर्ण विवरण जल्द ही उपलब्ध होगा...</p>
        `;
    }, 1000);
}
</script>

<?= $this->endSection() ?>