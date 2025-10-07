<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<div class="mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0 text-gray-800">
                <i class="fas fa-chart-bar me-2"></i>रिपोर्ट्स
            </h1>
            <p class="text-muted mb-0">विस्तृत विश्लेषण और रिपोर्ट्स देखें</p>
        </div>
        <div>
            <button class="btn btn-primary" onclick="generateReport()">
                <i class="fas fa-chart-line me-2"></i>नई रिपोर्ट बनाएं
            </button>
        </div>
    </div>
</div>

<!-- Summary Cards -->
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
                            <?= $stats['total_users'] ?>
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
                            कुल आवेदन
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $stats['total_applications'] ?>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-success">
                            <i class="fas fa-clipboard-list text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">स्वीकृत आवेदन</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $stats['approved_applications'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">कुल वितरित राशि</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">₹<?= number_format($stats['total_amount']) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row mb-4">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">मासिक आवेदन ट्रेंड</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="monthlyApplicationsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">आवेदन प्रकार वितरण</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="applicationTypeChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">हाल की गतिविधि</h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-sm me-3">
                                    <span class="avatar-initial rounded-circle bg-label-success">
                                        <i class="fas fa-user-plus"></i>
                                    </span>
                                </div>
                                <div>
                                    <h6 class="mb-0">नया सदस्य पंजीकृत</h6>
                                    <small class="text-muted">2 घंटे पहले</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-sm me-3">
                                    <span class="avatar-initial rounded-circle bg-label-primary">
                                        <i class="fas fa-clipboard"></i>
                                    </span>
                                </div>
                                <div>
                                    <h6 class="mb-0">नया आवेदन प्राप्त</h6>
                                    <small class="text-muted">5 घंटे पहले</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-sm me-3">
                                    <span class="avatar-initial rounded-circle bg-label-warning">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </div>
                                <div>
                                    <h6 class="mb-0">आवेदन स्वीकृत</h6>
                                    <small class="text-muted">1 दिन पहले</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">त्वरित कार्य</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary" onclick="downloadUserReport()">
                            <i class="fas fa-users me-2"></i>उपयोगकर्ता रिपोर्ट डाउनलोड करें
                        </button>
                        <button class="btn btn-outline-success" onclick="downloadApplicationReport()">
                            <i class="fas fa-clipboard-list me-2"></i>आवेदन रिपोर्ट डाउनलोड करें
                        </button>
                        <button class="btn btn-outline-info" onclick="downloadFinancialReport()">
                            <i class="fas fa-chart-line me-2"></i>वित्तीय रिपोर्ट डाउनलोड करें
                        </button>
                        <button class="btn btn-outline-warning" onclick="generateMonthlyReport()">
                            <i class="fas fa-calendar me-2"></i>मासिक रिपोर्ट बनाएं
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.avatar-sm {
    width: 32px;
    height: 32px;
}
.avatar-initial {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
}
.bg-label-success { background-color: #28a745 !important; color: white; }
.bg-label-primary { background-color: #667eea !important; color: white; }
.bg-label-warning { background-color: #ffc107 !important; color: white; }
.border-left-primary { border-left: 0.25rem solid #667eea !important; }
.border-left-success { border-left: 0.25rem solid #28a745 !important; }
.border-left-warning { border-left: 0.25rem solid #ffc107 !important; }
.border-left-info { border-left: 0.25rem solid #17a2b8 !important; }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Sample data for charts
const monthlyData = {
    labels: ['जन', 'फर', 'मार', 'अप्र', 'मई', 'जून'],
    datasets: [{
        label: 'आवेदन',
        data: [12, 19, 3, 5, 2, 3],
        borderColor: '#667eea',
        backgroundColor: 'rgba(102, 126, 234, 0.1)',
        fill: true
    }]
};

const typeData = {
    labels: ['विवाह सहायता', 'मृत्यु सहायता'],
    datasets: [{
        data: [65, 35],
        backgroundColor: ['#667eea', '#764ba2'],
        borderWidth: 2
    }]
};

// Monthly Applications Chart
const monthlyCtx = document.getElementById('monthlyApplicationsChart').getContext('2d');
new Chart(monthlyCtx, {
    type: 'line',
    data: monthlyData,
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Application Type Chart
const typeCtx = document.getElementById('applicationTypeChart').getContext('2d');
new Chart(typeCtx, {
    type: 'doughnut',
    data: typeData,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});

// Report Functions
function generateReport() {
    alert('रिपोर्ट जेनरेशन फीचर जल्द ही उपलब्ध होगा');
}

function downloadUserReport() {
    window.location.href = '/admin/reports/users';
}

function downloadApplicationReport() {
    window.location.href = '/admin/reports/applications';
}

function downloadFinancialReport() {
    window.location.href = '/admin/reports/financial';
}

function generateMonthlyReport() {
    const month = prompt('कौन सा महीना? (1-12)');
    if (month) {
        window.location.href = `/admin/reports/monthly/${month}`;
    }
}
</script>

<?= $this->endSection() ?>