@extends('layouts.app')

@section('title', 'Our Projects')

@section('metaDescription', 'Explore TrustProp Aluminium\'s portfolio of completed projects. View our work in residential, commercial, and industrial aluminium and glass installations across Zimbabwe.')

@push('styles')
<style>
    /* Page Header */
    .page-header {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--royal-blue) 100%);
        padding: 80px 24px 100px;
        margin: 0 -24px 80px;
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 40% 60%, rgba(252, 211, 77, 0.1) 0%, transparent 60%);
    }

    .page-header-content {
        position: relative;
        z-index: 1;
        max-width: 800px;
        margin: 0 auto;
    }

    .page-header h1 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: clamp(2.5rem, 5vw, 3.5rem);
        font-weight: 800;
        margin-bottom: 16px;
        letter-spacing: -1.5px;
    }

    .page-header p {
        font-size: 1.2rem;
        opacity: 0.95;
        line-height: 1.6;
    }

    /* Stats Bar */
    .stats-bar {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 24px;
        margin-bottom: 60px;
        padding: 40px;
        background: var(--bg-light);
        border-radius: 16px;
        border: 1px solid var(--border-light);
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary-blue);
        margin-bottom: 8px;
        line-height: 1;
    }

    .stat-label {
        font-size: 0.95rem;
        color: var(--text-medium);
        font-weight: 500;
    }

    /* Filter Tabs */
    .filter-tabs {
        display: flex;
        gap: 12px;
        justify-content: center;
        flex-wrap: wrap;
        margin-bottom: 48px;
    }

    .filter-tab {
        padding: 12px 28px;
        background: white;
        border: 1.5px solid var(--border-light);
        border-radius: 50px;
        font-weight: 600;
        font-size: 14px;
        color: var(--text-medium);
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .filter-tab:hover {
        border-color: var(--primary-blue);
        color: var(--primary-blue);
        transform: translateY(-2px);
    }

    .filter-tab.active {
        background: var(--primary-blue);
        border-color: var(--primary-blue);
        color: white;
        box-shadow: 0 4px 12px rgba(30, 64, 175, 0.25);
    }

    /* Projects Grid */
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
        gap: 32px;
        margin-bottom: 60px;
    }

    .project-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid var(--border-light);
        transition: all 0.4s ease;
        cursor: pointer;
        position: relative;
    }

    .project-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(30, 64, 175, 0.15);
        border-color: var(--primary-blue);
    }

    .project-image {
        position: relative;
        height: 280px;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--royal-blue) 100%);
        overflow: hidden;
    }

    .project-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at center, rgba(252, 211, 77, 0.15) 0%, transparent 70%);
        z-index: 1;
    }

    .project-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 64px;
        color: rgba(255, 255, 255, 0.8);
        position: relative;
        z-index: 0;
    }

    .project-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .project-card:hover .project-image img {
        transform: scale(1.1);
    }

    .project-category {
        position: absolute;
        top: 16px;
        left: 16px;
        padding: 6px 16px;
        background: var(--accent-yellow);
        color: var(--text-dark);
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        z-index: 2;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    .project-content {
        padding: 28px 24px;
    }

    .project-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.4rem;
        color: var(--text-dark);
        margin-bottom: 12px;
        font-weight: 700;
        letter-spacing: -0.5px;
        line-height: 1.3;
    }

    .project-description {
        font-size: 0.95rem;
        line-height: 1.6;
        color: var(--text-medium);
        margin-bottom: 20px;
    }

    .project-meta {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        padding-top: 16px;
        border-top: 1px solid var(--border-light);
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.85rem;
        color: var(--text-light);
    }

    .meta-item i {
        color: var(--primary-blue);
        font-size: 14px;
    }

    /* Project Types Grid */
    .types-section {
        margin-top: 80px;
        padding: 60px 48px;
        background: var(--bg-light);
        border-radius: 20px;
        border: 1px solid var(--border-light);
    }

    .types-section h2 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: clamp(2rem, 4vw, 2.75rem);
        color: var(--text-dark);
        text-align: center;
        margin-bottom: 48px;
        font-weight: 700;
        letter-spacing: -1px;
    }

    .types-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 24px;
    }

    .type-card {
        background: white;
        padding: 32px 24px;
        border-radius: var(--border-radius);
        border: 1px solid var(--border-light);
        text-align: center;
        transition: all 0.3s ease;
    }

    .type-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 28px rgba(30, 64, 175, 0.15);
        border-color: var(--primary-blue);
    }

    .type-icon {
        width: 72px;
        height: 72px;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--royal-blue) 100%);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 32px;
        color: white;
        box-shadow: 0 8px 16px rgba(30, 64, 175, 0.2);
    }

    .type-card h3 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.2rem;
        color: var(--text-dark);
        margin-bottom: 8px;
        font-weight: 700;
    }

    .type-card p {
        font-size: 0.9rem;
        color: var(--text-medium);
        line-height: 1.6;
    }

    /* CTA Section */
    .projects-cta {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--royal-blue) 100%);
        padding: 80px 48px;
        border-radius: 20px;
        text-align: center;
        color: white;
        margin-top: 80px;
        position: relative;
        overflow: hidden;
    }

    .projects-cta::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(252, 211, 77, 0.2) 0%, transparent 70%);
        border-radius: 50%;
    }

    .projects-cta-content {
        position: relative;
        z-index: 1;
    }

    .projects-cta h2 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: clamp(2rem, 4vw, 2.8rem);
        margin-bottom: 20px;
        font-weight: 700;
        letter-spacing: -1px;
    }

    .projects-cta p {
        font-size: 1.15rem;
        margin-bottom: 32px;
        opacity: 0.95;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.7;
    }

    /* Hidden Class for Filtering */
    .project-card.hidden {
        display: none;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
        display: none;
    }

    .empty-state.show {
        display: block;
    }

    .empty-state i {
        font-size: 64px;
        color: var(--text-light);
        margin-bottom: 24px;
    }

    .empty-state h3 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.5rem;
        color: var(--text-dark);
        margin-bottom: 12px;
    }

    .empty-state p {
        color: var(--text-medium);
        font-size: 1.05rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header {
            padding: 60px 16px 80px;
            margin: 0 -16px 60px;
        }

        .stats-bar {
            grid-template-columns: repeat(2, 1fr);
            padding: 32px 20px;
            gap: 20px;
        }

        .filter-tabs {
            gap: 8px;
        }

        .filter-tab {
            padding: 10px 20px;
            font-size: 13px;
        }

        .projects-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .types-section,
        .projects-cta {
            padding: 60px 24px;
        }

        .types-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
    }
</style>
@endpush

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="page-header-content">
        <h1>Our Projects</h1>
        <p>Excellence delivered across Zimbabwe's most prestigious developments</p>
    </div>
</div>

<div class="container">
    <!-- Stats Bar -->
    <div class="stats-bar" data-animate>
        <div class="stat-item">
            <div class="stat-number">1000+</div>
            <div class="stat-label">Projects Completed</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">500+</div>
            <div class="stat-label">Happy Clients</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">15+</div>
            <div class="stat-label">Years Experience</div>
        </div>
        <div class="stat-item">
            <div class="stat-number">100%</div>
            <div class="stat-label">Quality Assured</div>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="filter-tabs" data-animate>
        <button class="filter-tab active" data-filter="all">All Projects</button>
        <button class="filter-tab" data-filter="residential">Residential</button>
        <button class="filter-tab" data-filter="commercial">Commercial</button>
        <button class="filter-tab" data-filter="industrial">Industrial</button>
        <button class="filter-tab" data-filter="hospitality">Hospitality</button>
    </div>

    <!-- Projects Grid -->
      <!-- Projects Grid -->
      <div class="projects-grid">
        <!-- Residential Project 1: Pomona City Flats -->
        <div class="project-card" data-category="residential" data-animate>
            <div class="project-image">
                <span class="project-category">Residential</span>
                <img src="{{ asset('project/image01.jpg') }}" alt="Pomona City Flats aluminium and glass project">
            </div>
            <div class="project-content">
                <h3 class="project-title">Pomona City Flats – Aluminium &amp; Glass Project</h3>
                <p class="project-description">
                    Custom aluminium windows, sliding doors, balcony enclosures, and shopfront-style glazing for Pomona City Flats, a modern residential development in Harare North.
                </p>
                <div class="project-meta">
                    <div class="meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Pomona City, Harare North</span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-calendar"></i>
                        <span>2024</span>
                    </div>
                </div>
                {{-- <a class="project-link" href="https://www.westprop.com/developments/pomona-city-flats/" target="_blank" rel="noopener">
                    View development details
                </a> --}}
            </div>
        </div>
    
        <!-- Residential Project 2: Pokugara Townhouses -->
        <div class="project-card" data-category="residential" data-animate>
            <div class="project-image">
                <span class="project-category">Residential</span>
                <img src="{{ asset('project/image02.jpg') }}" alt="Pokugara Townhouses aluminium and glass project">
            </div>
            <div class="project-content">
                <h3 class="project-title">Pokugara Townhouses – Aluminium &amp; Glass Project</h3>
                <p class="project-description">
                    High-end aluminium sliding doors, patio doors, windows, and balcony enclosures tailored for the prestigious Pokugara Townhouses in Borrowdale West.
                </p>
                <div class="project-meta">
                    <div class="meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Borrowdale West, Harare</span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-calendar"></i>
                        <span>2024</span>
                    </div>
                </div>
                {{-- <a class="project-link" href="https://www.westprop.com/developments/pokugara/" target="_blank" rel="noopener">
                    View development details
                </a> --}}
            </div>
        </div>
    
        <!-- Residential Project 3: Millennium Heights Apartments -->
        <div class="project-card" data-category="residential" data-animate>
            <div class="project-image">
                <span class="project-category">Residential</span>
                <img src="{{ asset('project/image03.webp') }}" alt="Millennium Heights Apartments aluminium and glass project">
            </div>
            <div class="project-content">
                <h3 class="project-title">Millennium Heights Apartments – Aluminium &amp; Glass Project</h3>
                <p class="project-description">
                    Bespoke glass balconies, sliding doors, and high-performance aluminium windows for Millennium Heights Block 6 in Borrowdale West.
                </p>
                <div class="project-meta">
                    <div class="meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Borrowdale West, Harare</span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-calendar"></i>
                        <span>2023</span>
                    </div>
                </div>
                {{-- <a class="project-link" href="https://www.westprop.com/developments/millenium-heights/millenium-heights-block-6/" target="_blank" rel="noopener">
                    View development details
                </a> --}}
            </div>
        </div>
    
        <!-- Residential Project 4: The Hills Lifestyle Estate (In Progress) -->
        <div class="project-card" data-category="residential" data-animate>
            <div class="project-image">
                <span class="project-category">Residential</span>
                <img src="{{ asset('project/image04.png') }}" alt="The Hills Lifestyle Estate aluminium and glass project">
            </div>
            <div class="project-content">
                <h3 class="project-title">The Hills Lifestyle Estate – Aluminium &amp; Glass Project (In Progress)</h3>
                <p class="project-description">
                    Ongoing supply of aluminium windows, sliding doors, glass balustrades, and panoramic glazing systems for Harare’s premier golf-focused residential estate.
                </p>
                <div class="project-meta">
                    <div class="meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Borrowdale Brooke, Harare</span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-calendar"></i>
                        <span>In Progress</span>
                    </div>
                </div>
                {{-- <a class="project-link" href="https://www.westprop.com/developments/the-hills-lifestyle-estate/" target="_blank" rel="noopener">
                    View development details
                </a> --}}
            </div>
        </div>
    
        <!-- Existing Industrial Project 1 -->
        <div class="project-card" data-category="industrial" data-animate>
            <div class="project-image">
                <span class="project-category">Industrial</span>
                <img src="{{ asset('project/image01.jpg') }}" alt="Industrial manufacturing facility aluminium and glass project">
            </div>
            <div class="project-content">
                <h3 class="project-title">Manufacturing Facility</h3>
                <p class="project-description">
                    Industrial-grade aluminium windows, doors, and partitioning systems for production facility.
                </p>
                <div class="project-meta">
                    <div class="meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Msasa, Harare</span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-calendar"></i>
                        <span>2023</span>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Existing Commercial Project 3 -->
        <div class="project-card" data-category="commercial" data-animate>
            <div class="project-image">
                <span class="project-category">Commercial</span>
                <img src="{{ asset('project/image02.jpg') }}" alt="Business park aluminium and glass project">
            </div>
            <div class="project-content">
                <h3 class="project-title">Business Park Development</h3>
                <p class="project-description">
                    Curtain walling, entrance systems, and glass partitions for multi-tenant business park.
                </p>
                <div class="project-meta">
                    <div class="meta-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Eastlea, Harare</span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-calendar"></i>
                        <span>2024</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Empty State (Hidden by default) -->
    <div class="empty-state" id="emptyState">
        <i class="fas fa-search"></i>
        <h3>No Projects Found</h3>
        <p>Try selecting a different category to see more projects.</p>
    </div>

    <!-- Project Types Section -->
    <div class="types-section" data-animate>
        <h2>Project Types We Deliver</h2>
        <div class="types-grid">
            <div class="type-card">
                <div class="type-icon">
                    <i class="fas fa-home"></i>
                </div>
                <h3>Residential</h3>
                <p>Luxury homes, estates, and apartments</p>
            </div>

            <div class="type-card">
                <div class="type-icon">
                    <i class="fas fa-building"></i>
                </div>
                <h3>Commercial</h3>
                <p>Offices, retail spaces, and business centers</p>
            </div>

            <div class="type-card">
                <div class="type-icon">
                    <i class="fas fa-industry"></i>
                </div>
                <h3>Industrial</h3>
                <p>Factories, warehouses, and production facilities</p>
            </div>

            <div class="type-card">
                <div class="type-icon">
                    <i class="fas fa-hotel"></i>
                </div>
                <h3>Hospitality</h3>
                <p>Hotels, lodges, and restaurants</p>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="projects-cta" data-animate>
        <div class="projects-cta-content">
            <h2>Start Your Project With Us</h2>
            <p>
                Ready to bring your vision to life? Let's discuss how we can deliver exceptional 
                aluminium and glass solutions for your next project.
            </p>
            <div class="cta-buttons">
                <a href="{{ route('contact') }}" class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i> Get a Free Quote
                </a>
                <a href="{{ route('services') }}" class="btn btn-outline">
                    <i class="fas fa-tools"></i> View Our Services
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterTabs = document.querySelectorAll('.filter-tab');
        const projectCards = document.querySelectorAll('.project-card');
        const emptyState = document.getElementById('emptyState');
        
        // Filter functionality
        filterTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');
                
                // Update active tab
                filterTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                
                // Filter projects
                let visibleCount = 0;
                
                projectCards.forEach(card => {
                    const category = card.getAttribute('data-category');
                    
                    if (filter === 'all' || category === filter) {
                        card.classList.remove('hidden');
                        visibleCount++;
                        
                        // Animate entrance
                        setTimeout(() => {
                            card.style.opacity = '0';
                            card.style.transform = 'translateY(20px)';
                            requestAnimationFrame(() => {
                                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                                card.style.opacity = '1';
                                card.style.transform = 'translateY(0)';
                            });
                        }, 10);
                    } else {
                        card.classList.add('hidden');
                    }
                });
                
                // Show/hide empty state
                if (visibleCount === 0) {
                    emptyState.classList.add('show');
                } else {
                    emptyState.classList.remove('show');
                }
            });
        });

        // Counter animation for stats
        const statNumbers = document.querySelectorAll('.stat-number');
        
        const animateCounter = (element) => {
            const text = element.textContent;
            const isPercentage = text.includes('%');
            const number = parseInt(text.replace(/\D/g, ''));
            const duration = 2000;
            const increment = number / (duration / 16);
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= number) {
                    element.textContent = text;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current) + (isPercentage ? '%' : '+');
                }
            }, 16);
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    statNumbers.forEach(stat => animateCounter(stat));
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });
        
        const statsBar = document.querySelector('.stats-bar');
        if (statsBar) {
            observer.observe(statsBar);
        }
    });
</script>
@endpush
{{-- @endsection --}}
