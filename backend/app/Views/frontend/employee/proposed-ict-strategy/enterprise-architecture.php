<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<style>
.section-card {
    background: var(--panel);
    border: 1px solid #dde4ed;
    border-radius: 10px;
    box-shadow: 0 12px 26px rgba(15, 23, 42, .05);
    overflow: hidden;
    margin-bottom: 20px;
}

.section-header {
    background: linear-gradient(180deg, #566d8b 0%, var(--brand) 100%);
    color: #fff;
    padding: 14px 18px;
    border-bottom: 1px solid rgba(255,255,255,.1);
}

.section-header .section-title {
    font-size: .98rem;
    font-weight: 700;
    margin: 0;
    color: #fff;
}

.section-header .section-subtitle {
    font-size: .76rem;
    color: rgba(255,255,255,.82);
    margin: 4px 0 0;
}

.section-body {
    padding: 18px;
}

.info-banner {
    background: linear-gradient(135deg, #e8f4f8 0%, #f0f6fa 100%);
    border-left: 4px solid var(--brand);
    border-radius: 6px;
    padding: 12px 16px;
    margin-bottom: 16px;
    color: var(--ink);
    font-size: .82rem;
}

.info-banner i {
    color: var(--brand);
    margin-right: 8px;
}

.form-section-label {
    font-size: .85rem;
    font-weight: 600;
    color: var(--brand-dark);
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: .02em;
}

.form-label {
    font-size: .82rem;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 4px;
}

.form-control, .form-select {
    border: 1px solid #d0dae6;
    border-radius: 6px;
    font-size: .82rem;
    padding: 8px 12px;
    transition: all 0.2s ease;
}

.form-control:focus, .form-select:focus {
    border-color: var(--brand);
    box-shadow: 0 0 0 3px rgba(79, 101, 132, .1);
}

.form-text {
    font-size: .74rem;
    color: var(--muted);
    margin-top: 4px;
}

.action-bar {
    background: var(--panel);
    border: 1px solid #dde4ed;
    border-radius: 10px;
    padding: 16px 18px;
    box-shadow: 0 12px 26px rgba(15, 23, 42, .05);
    position: sticky;
    bottom: 14px;
    z-index: 100;
}

.file-upload-area {
    border: 2px dashed #d0dae6;
    border-radius: 8px;
    padding: 24px;
    text-align: center;
    background: #fafbfc;
    transition: all 0.2s ease;
}

.file-upload-area:hover {
    border-color: var(--brand);
    background: #f8fafc;
}

.file-upload-area i {
    font-size: 1.5rem;
    color: var(--brand);
    margin-bottom: 8px;
}

.file-upload-area p {
    font-size: .8rem;
    color: var(--muted);
    margin: 0;
}
</style>

<div class="row">
    <div class="col-12">
        <div class="page-header mb-3">
            <h1 class="page-title">B. Enterprise Architecture</h1>
            <p class="page-subtitle">Proposed enterprise architecture structure and operation</p>
        </div>
        
        <div class="info-banner">
            <i class="fa-solid fa-info-circle"></i>
            Illustrate your agency's proposed enterprise architecture that defines your structure and operation. This includes identifying and rationalizing legacy systems, business processes, data assets, and ICT infrastructure; designing interoperable, secure, and scalable digital government solutions; guiding digital investment decisions and aligning them with your agency's strategic outcomes and public service delivery goals.
        </div>
    </div>
</div>

<form action="<?= site_url('employee/proposed-ict-strategy/enterprise-architecture/save') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <!-- Enterprise Architecture Diagram -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">B.i Enterprise Architecture Diagram</h5>
                    <p class="section-subtitle">Visual representation of the proposed architecture</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-diagram-project me-2"></i>Architecture Visualization
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="file-upload-area">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                <p>Upload enterprise architecture diagram showing structure and operation</p>
                                <input type="file" class="form-control mt-2" name="ea_diagram" accept="image/*,.pdf">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-align-left me-1"></i>Description</label>
                            <textarea class="form-control" name="ea_description" rows="4" placeholder="Describe the enterprise architecture structure and operation..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Legacy Systems -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">B.ii Legacy Systems</h5>
                    <p class="section-subtitle">Identification and rationalization of existing systems</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-server me-2"></i>Systems Inventory
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-list me-1"></i>Legacy Systems Inventory</label>
                            <textarea class="form-control" name="legacy_systems" rows="6" placeholder="List and identify existing legacy systems that need to be rationalized or modernized..."></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-lightbulb me-1"></i>Rationalization Strategy</label>
                            <textarea class="form-control" name="legacy_rationalization" rows="4" placeholder="Describe the strategy for rationalizing legacy systems (retire, rehost, replatform, refactor, etc.)..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Business Processes -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">B.iii Business Processes</h5>
                    <p class="section-subtitle">Current processes and optimization strategies</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-sitemap me-2"></i>Process Management
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-tasks me-1"></i>Current Business Processes</label>
                            <textarea class="form-control" name="current_processes" rows="4" placeholder="Describe current business processes and workflows..."></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-rocket me-1"></i>Process Optimization Strategy</label>
                            <textarea class="form-control" name="process_optimization" rows="4" placeholder="Describe strategies for optimizing and automating business processes..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Assets -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">B.iv Data Assets</h5>
                    <p class="section-subtitle">Data inventory and management strategy</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-database me-2"></i>Data Management
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-list-check me-1"></i>Data Assets Inventory</label>
                            <textarea class="form-control" name="data_assets" rows="6" placeholder="List and categorize key data assets and their importance..."></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-chart-line me-1"></i>Data Management Strategy</label>
                            <textarea class="form-control" name="data_management" rows="4" placeholder="Describe strategies for data management, governance, and quality..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ICT Infrastructure -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">B.v ICT Infrastructure</h5>
                    <p class="section-subtitle">Current infrastructure and modernization plans</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-network-wired me-2"></i>Infrastructure Planning
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-server me-1"></i>Current ICT Infrastructure</label>
                            <textarea class="form-control" name="current_infrastructure" rows="4" placeholder="Describe current ICT infrastructure components..."></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-arrow-up-right-dots me-1"></i>Infrastructure Modernization Plan</label>
                            <textarea class="form-control" name="infrastructure_modernization" rows="4" placeholder="Describe plans for infrastructure modernization and scalability..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Digital Solutions -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">B.vi Digital Government Solutions</h5>
                    <p class="section-subtitle">Proposed interoperable and scalable solutions</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-laptop-code me-2"></i>Digital Solutions
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-lightbulb me-1"></i>Proposed Digital Solutions</label>
                            <textarea class="form-control" name="digital_solutions" rows="6" placeholder="Describe proposed interoperable, secure, and scalable digital government solutions..."></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-project-diagram me-1"></i>Interoperability Framework</label>
                            <textarea class="form-control" name="interoperability" rows="4" placeholder="Describe how systems will interoperate and share data..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Strategic Alignment -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">B.vii Strategic Alignment</h5>
                    <p class="section-subtitle">Alignment with strategic outcomes and investment decisions</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-bullseye me-2"></i>Strategic Planning
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-coins me-1"></i>Digital Investment Decisions</label>
                            <textarea class="form-control" name="investment_decisions" rows="4" placeholder="Describe how digital investment decisions will be guided..."></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-flag-checkered me-1"></i>Alignment with Strategic Outcomes</label>
                            <textarea class="form-control" name="strategic_outcomes" rows="4" placeholder="Describe alignment with agency's strategic outcomes and public service delivery goals..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="action-bar">
                <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save me-2"></i>Save Progress
                        </button>
                        <a href="<?= site_url('employee/dashboard') ?>" class="btn btn-outline-secondary">
                            <i class="fa-solid fa-house me-2"></i>Dashboard
                        </a>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="<?= site_url('employee/proposed-ict-strategy/network-infrastructure') ?>" class="btn btn-outline-secondary">
                            <i class="fa-solid fa-arrow-left me-2"></i>Back: Network Infrastructure
                        </a>
                        <a href="<?= site_url('employee/proposed-ict-strategy/ict-human-capital') ?>" class="btn btn-success">
                            Next: ICT Human Capital <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection() ?>
