<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'एडमिन पैनल' ?> - एनजीओ विक्रांत</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Sans Devanagari', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 15px 20px;
            border-radius: 0;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }
        .sidebar .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            color: white;
            border-left: 3px solid #ffc107;
        }
        .sidebar .nav-link.active {
            background-color: rgba(255,255,255,0.2);
            color: white;
            border-left: 3px solid #ffc107;
        }
        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
        }
        .main-content {
            padding: 20px;
        }
        .navbar-brand {
            font-weight: 600;
            color: #495057;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .stats-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .stats-card-2 {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }
        .stats-card-3 {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
        }
        .stats-card-4 {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            color: white;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }

        /* Clean Dashboard Styles */
        .dashboard-header {
            background: #fff;
            padding: 1.5rem 0;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid #e3e6f0;
        }
        
        .stats-card {
            transition: all 0.3s ease;
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }
        
        .stats-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.25rem 2rem 0 rgba(58, 59, 69, 0.2);
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }
        
        .app-type-card {
            padding: 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .app-type-card:hover {
            background-color: #f8f9fa;
        }
        
        .app-type-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        .quick-action-card {
            transition: all 0.3s ease;
            border-radius: 10px;
        }
        
        .quick-action-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.25rem 2rem 0 rgba(58, 59, 69, 0.2);
        }
        
        .quick-action-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }
        
        .text-gray-800 {
            color: #5a5c69 !important;
        }
        
        .font-weight-bold {
            font-weight: 700 !important;
        }
        
        .text-xs {
            font-size: 0.7rem;
        }
        
        .shadow-sm {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }
        
        .list-group-item {
            transition: all 0.3s ease;
        }
        
        .list-group-item:hover {
            background-color: #f8f9fa;
        }
        
        .avatar-sm {
            width: 2rem;
            height: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .dashboard-header h1 {
                font-size: 1.5rem;
            }
            
            .quick-action-card .card-body {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0">
                <div class="sidebar">
                    <div class="p-4 text-center">
                        <h4 class="text-white mb-0">एनजीओ विक्रांत</h4>
                        <p class="text-white-50 mb-0">एडमिन पैनल</p>
                    </div>
                    <hr class="text-white-50">
                    <nav class="nav flex-column">
                        <a class="nav-link <?= (current_url(true)->getSegment(2) == 'dashboard' || current_url(true)->getSegment(2) == '') ? 'active' : '' ?>" href="/admin/dashboard">
                            <i class="fas fa-tachometer-alt"></i>डैशबोर्ड
                        </a>
                        <a class="nav-link <?= (current_url(true)->getSegment(2) == 'users') ? 'active' : '' ?>" href="/admin/users">
                            <i class="fas fa-users"></i>उपयोगकर्ता
                        </a>
                        <a class="nav-link <?= (current_url(true)->getSegment(2) == 'applications') ? 'active' : '' ?>" href="/admin/applications">
                            <i class="fas fa-file-alt"></i>आवेदन
                        </a>
                        <a class="nav-link <?= (current_url(true)->getSegment(2) == 'reports') ? 'active' : '' ?>" href="/admin/reports">
                            <i class="fas fa-chart-bar"></i>रिपोर्ट्स
                        </a>
                        <a class="nav-link <?= (current_url(true)->getSegment(2) == 'settings') ? 'active' : '' ?>" href="/admin/settings">
                            <i class="fas fa-cog"></i>सेटिंग्स
                        </a>
                        <hr class="text-white-50">
                        <a class="nav-link" href="/">
                            <i class="fas fa-home"></i>मुख्य वेबसाइट
                        </a>
                        <a class="nav-link" href="/logout">
                            <i class="fas fa-sign-out-alt"></i>लॉगआउट
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10">
                <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
                    <div class="container-fluid">
                        <span class="navbar-brand mb-0 h1"><?= $title ?? 'एडमिन पैनल' ?></span>
                        <div class="navbar-nav ms-auto">
                            <span class="nav-item">
                                <span class="nav-link">
                                    <i class="fas fa-user-circle"></i> स्वागत, <?= $user_name ?? 'एडमिन' ?>
                                </span>
                            </span>
                        </div>
                    </div>
                </nav>

                <div class="main-content">
                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i><?= session()->getFlashdata('error') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?= $this->renderSection('content') ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Dashboard Animation Script -->
    <script>
        // Animate numbers on page load
        document.addEventListener('DOMContentLoaded', function() {
            const statNumbers = document.querySelectorAll('.stat-number');
            
            statNumbers.forEach(function(element) {
                const target = parseInt(element.getAttribute('data-target') || element.textContent);
                let current = 0;
                const increment = target / 50;
                const timer = setInterval(function() {
                    current += increment;
                    if (current >= target) {
                        element.textContent = target;
                        clearInterval(timer);
                    } else {
                        element.textContent = Math.floor(current);
                    }
                }, 50);
            });

            // Animate progress bars
            setTimeout(function() {
                const progressBars = document.querySelectorAll('.stat-progress .progress-bar');
                progressBars.forEach(function(bar) {
                    const width = bar.style.width;
                    bar.style.width = '0%';
                    setTimeout(function() {
                        bar.style.width = width;
                    }, 100);
                });
            }, 500);
        });

        // Refresh functionality
        function refreshDashboard() {
            const refreshBtn = document.querySelector('.btn-refresh');
            if (refreshBtn) {
                refreshBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>रिफ्रेश हो रहा है...';
                setTimeout(function() {
                    location.reload();
                }, 1000);
            }
        }

        // Add click handler for refresh button
        document.addEventListener('DOMContentLoaded', function() {
            const refreshBtn = document.querySelector('.btn-refresh');
            if (refreshBtn) {
                refreshBtn.addEventListener('click', refreshDashboard);
            }
        });
    </script>
    
    <?= $this->renderSection('scripts') ?>
</body>
</html>