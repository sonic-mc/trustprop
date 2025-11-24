@extends('layouts.app')

@section('title', 'Our Services')

@section('metaDescription', 'TrustProp Aluminium offers comprehensive aluminium and glass solutions including windows, doors, pergolas, balustrades, glass replacement, and garage doors in Zimbabwe.')

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
        background: radial-gradient(circle at 70% 50%, rgba(252, 211, 77, 0.1) 0%, transparent 60%);
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

    /* Services Grid */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
        gap: 32px;
        margin-bottom: 80px;
    }

    .service-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid var(--border-light);
        transition: all 0.4s ease;
        display: flex;
        flex-direction: column;
    }

    .service-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(30, 64, 175, 0.15);
        border-color: var(--primary-blue);
    }

    .service-image {
        position: relative;
        height: 240px;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--royal-blue) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .service-image i {
        font-size: 80px;
        color: rgba(255, 255, 255, 0.9);
        transition: transform 0.4s ease;
    }

    .service-card:hover .service-image i {
        transform: scale(1.1) rotate(-5deg);
    }

    .service-image::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at center, rgba(252, 211, 77, 0.15) 0%, transparent 70%);
    }

    .service-content {
        padding: 32px 28px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .service-card h3 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.5rem;
        color: var(--text-dark);
        margin-bottom: 16px;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .service-card p {
        font-size: 0.98rem;
        line-height: 1.7;
        color: var(--text-medium);
        margin-bottom: 24px;
        flex-grow: 1;
    }

    .service-features {
        list-style: none;
        margin-bottom: 24px;
    }

    .service-features li {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        font-size: 0.9rem;
        color: var(--text-medium);
        margin-bottom: 10px;
        line-height: 1.5;
    }

    .service-features i {
        color: var(--accent-yellow);
        font-size: 14px;
        margin-top: 3px;
        flex-shrink: 0;
    }

    .service-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--primary-blue);
        font-weight: 600;
        font-size: 0.95rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .service-link:hover {
        color: var(--royal-blue);
        gap: 12px;
    }

    /* Why Choose Section */
    .why-choose-section {
        background: var(--bg-light);
        padding: 80px 48px;
        border-radius: 20px;
        margin: 80px 0;
    }

    .why-choose-section h2 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: clamp(2rem, 4vw, 2.75rem);
        color: var(--text-dark);
        text-align: center;
        margin-bottom: 48px;
        font-weight: 700;
        letter-spacing: -1px;
    }

    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 28px;
    }

    .benefit-item {
        background: white;
        padding: 32px 24px;
        border-radius: var(--border-radius);
        border: 1px solid var(--border-light);
        text-align: center;
        transition: all 0.3s ease;
    }

    .benefit-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 28px rgba(30, 64, 175, 0.12);
        border-color: var(--primary-blue);
    }

    .benefit-icon {
        width: 64px;
        height: 64px;
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--royal-blue) 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 28px;
        color: white;
        box-shadow: 0 4px 12px rgba(30, 64, 175, 0.2);
    }

    .benefit-item h4 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.15rem;
        color: var(--text-dark);
        margin-bottom: 12px;
        font-weight: 700;
    }

    .benefit-item p {
        font-size: 0.9rem;
        line-height: 1.6;
        color: var(--text-medium);
    }

    /* CTA Section */
    .services-cta {
        background: linear-gradient(135deg, var(--primary-blue) 0%, var(--royal-blue) 100%);
        padding: 80px 48px;
        border-radius: 20px;
        text-align: center;
        color: white;
        margin-top: 80px;
    }

    .services-cta h2 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: clamp(2rem, 4vw, 2.8rem);
        margin-bottom: 20px;
        font-weight: 700;
        letter-spacing: -1px;
    }

    .services-cta p {
        font-size: 1.15rem;
        margin-bottom: 32px;
        opacity: 0.95;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.7;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header {
            padding: 60px 16px 80px;
            margin: 0 -16px 60px;
        }

        .services-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .why-choose-section,
        .services-cta {
            padding: 60px 24px;
        }

        .benefits-grid {
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
        <h1>Our Services</h1>
        <p>Comprehensive aluminium and glass solutions for every need</p>
    </div>
</div>

<div class="container">
    <!-- Services Grid -->
    <div class="services-grid">
        <!-- Glass Replacement -->
        <div class="service-card" id="glass-replacement" data-animate>
            <div class="service-image">
                <i class="fas fa-glass-whiskey"></i>
            </div>
            <div class="service-content">
                <h3>Glass Replacement</h3>
                <p>
                    Professional glass replacement services for residential and commercial properties. 
                    We provide quick, efficient replacement of broken or damaged glass with high-quality materials.
                </p>
                <ul class="service-features">
                    <li><i class="fas fa-check"></i> Emergency glass replacement</li>
                    <li><i class="fas fa-check"></i> All types of glass available</li>
                    <li><i class="fas fa-check"></i> Professional installation</li>
                    <li><i class="fas fa-check"></i> Competitive pricing</li>
                </ul>
                <a href="{{ route('contact') }}" class="service-link">
                    Get a Quote <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Aluminium Pergolas -->
        <div class="service-card" id="aluminium-pergolas" data-animate>
            <div class="service-image">
                <i class="fas fa-home"></i>
            </div>
            <div class="service-content">
                <h3>Aluminium Pergolas</h3>
                <p>
                    Custom-designed aluminium pergolas that enhance your outdoor living space. 
                    Durable, weather-resistant, and aesthetically pleasing structures.
                </p>
                <ul class="service-features">
                    <li><i class="fas fa-check"></i> Custom designs</li>
                    <li><i class="fas fa-check"></i> Weather-resistant materials</li>
                    <li><i class="fas fa-check"></i> Modern & traditional styles</li>
                    <li><i class="fas fa-check"></i> Low maintenance</li>
                </ul>
                <a href="{{ route('contact') }}" class="service-link">
                    Get a Quote <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Garage Doors -->
        <div class="service-card" id="garage-doors" data-animate>
            <div class="service-image">
                <i class="fas fa-warehouse"></i>
            </div>
            <div class="service-content">
                <h3>Garage Doors</h3>
                <p>
                    High-quality garage door installation and repair services. 
                    We offer a wide range of styles and automation options for convenience and security.
                </p>
                <ul class="service-features">
                    <li><i class="fas fa-check"></i> Sectional & roller doors</li>
                    <li><i class="fas fa-check"></i> Automated systems available</li>
                    <li><i class="fas fa-check"></i> Various designs & colors</li>
                    <li><i class="fas fa-check"></i> Installation & maintenance</li>
                </ul>
                <a href="{{ route('contact') }}" class="service-link">
                    Get a Quote <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Windows & Doors -->
        <div class="service-card" id="windows-doors" data-animate>
            <div class="service-image">
                <i class="fas fa-door-open"></i>
            </div>
            <div class="service-content">
                <h3>Aluminium Windows & Doors</h3>
                <p>
                    Complete range of aluminium windows and doors including sliding, folding, and hinged options. 
                    Energy-efficient and built to last.
                </p>
                <ul class="service-features">
                    <li><i class="fas fa-check"></i> Sliding windows & doors</li>
                    <li><i class="fas fa-check"></i> Folding (Bifold) systems</li>
                    <li><i class="fas fa-check"></i> Hinged windows & doors</li>
                    <li><i class="fas fa-check"></i> Energy-efficient designs</li>
                </ul>
                <a href="{{ route('contact') }}" class="service-link">
                    Get a Quote <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Glass Balustrades -->
        <div class="service-card" id="glass-balustrades" data-animate>
            <div class="service-image">
                <i class="fas fa-border-style"></i>
            </div>
            <div class="service-content">
                <h3>Glass Balustrades</h3>
                <p>
                    Modern and elegant glass balustrade solutions for balconies, stairs, and pool areas. 
                    Safe, stylish, and virtually maintenance-free.
                </p>
                <ul class="service-features">
                    <li><i class="fas fa-check"></i> Frameless & semi-frameless</li>
                    <li><i class="fas fa-check"></i> Toughened safety glass</li>
                    <li><i class="fas fa-check"></i> Indoor & outdoor applications</li>
                    <li><i class="fas fa-check"></i> Modern aesthetic appeal</li>
                </ul>
                <a href="{{ route('contact') }}" class="service-link">
                    Get a Quote <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Stainless Steel Balustrades -->
        <div class="service-card" id="balustrades" data-animate>
            <div class="service-image">
                <i class="fas fa-grip-lines"></i>
            </div>
            <div class="service-content">
                <h3>Stainless Steel Balustrades</h3>
                <p>
                    Durable stainless steel balustrade systems offering superior strength and longevity. 
                    Perfect for both modern and traditional settings.
                </p>
                <ul class="service-features">
                    <li><i class="fas fa-check"></i> Corrosion-resistant</li>
                    <li><i class="fas fa-check"></i> Various design options</li>
                    <li><i class="fas fa-check"></i> Long-lasting durability</li>
                    <li><i class="fas fa-check"></i> Easy to maintain</li>
                </ul>
                <a href="{{ route('contact') }}" class="service-link">
                    Get a Quote <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Why Choose Us -->
    <div class="why-choose-section" data-animate>
        <h2>Why Choose TrustProp?</h2>
        
        <div class="benefits-grid">
            <div class="benefit-item">
                <div class="benefit-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <h4>Quality Materials</h4>
                <p>High-quality imported systems and premium materials</p>
            </div>

            <div class="benefit-item">
                <div class="benefit-icon">
                    <i class="fas fa-users-cog"></i>
                </div>
                <h4>Expert Team</h4>
                <p>Skilled professionals with years of experience</p>
            </div>

            <div class="benefit-item">
                <div class="benefit-icon">
                    <i class="fas fa-drafting-compass"></i>
                </div>
                <h4>Custom Solutions</h4>
                <p>Tailored designs to meet your specific needs</p>
            </div>

            <div class="benefit-item">
                <div class="benefit-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h4>Timely Delivery</h4>
                <p>Projects completed on schedule</p>
            </div>

            <div class="benefit-item">
                <div class="benefit-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h4>Warranty Support</h4>
                <p>Comprehensive after-sales service</p>
            </div>

            <div class="benefit-item">
                <div class="benefit-icon">
                    <i class="fas fa-tag"></i>
                </div>
                <h4>Competitive Pricing</h4>
                <p>Best value without compromising quality</p>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="services-cta" data-animate>
        <h2>Ready to Get Started?</h2>
        <p>
            Contact us today for a free consultation and quote. Our team is ready to help you 
            bring your vision to life with our premium aluminium and glass solutions.
        </p>
        <div class="cta-buttons">
            <a href="{{ route('contact') }}" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> Request a Quote
            </a>
            <a href="{{ route('projects') }}" class="btn btn-outline">
                <i class="fas fa-images"></i> View Our Work
            </a>
        </div>
    </div>
</div>
@endsection
