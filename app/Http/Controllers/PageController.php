<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display the home page.
     */
    public function home(): View
    {
        return view('home', [
            'title' => 'Home',
            'metaDescription' => 'Welcome to our glass and aluminium services',
        ]);
    }

    /**
     * Display the about page.
     */
    public function about(): View
    {
        return view('about', [
            'title' => 'About Us',
            'metaDescription' => 'Learn more about our company and expertise',
        ]);
    }

    /**
     * Display the services page.
     */
    public function services(): View
    {
        $services = $this->getServices();

        return view('services', [
            'title' => 'Our Services',
            'metaDescription' => 'Explore our range of glass and aluminium services',
            'services' => $services,
        ]);
    }

    /**
     * Display the projects page.
     */
    public function projects(): View
    {
        return view('projects', [
            'title' => 'Our Projects',
            'metaDescription' => 'View our completed projects and portfolio',
        ]);
    }

    /**
     * Display the contact page.
     */
    public function contact(): View
    {
        return view('contact', [
            'title' => 'Contact Us',
            'metaDescription' => 'Get in touch with us for your glass and aluminium needs',
        ]);
    }

    /**
     * Handle contact form submission.
     */
    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        // Handle the contact form submission
        // e.g., send email, store in database, etc.

        return redirect()->route('contact')
            ->with('success', 'Thank you for your message. We will get back to you soon!');
    }

    /**
     * Get the list of services.
     */
    private function getServices(): array
    {
        return [
            [
                'id' => 'glass-replacement',
                'name' => 'Glass Replacement',
                'icon' => 'fa-glass',
                'description' => 'Professional glass replacement services for residential and commercial properties',
            ],
            [
                'id' => 'aluminium-pergolas',
                'name' => 'Aluminium Pergolas',
                'icon' => 'fa-home',
                'description' => 'Custom-designed aluminium pergolas to enhance your outdoor space',
            ],
            [
                'id' => 'garage-doors',
                'name' => 'Garage Doors',
                'icon' => 'fa-warehouse',
                'description' => 'High-quality garage door installation and repairs',
            ],
            [
                'id' => 'aluminium-windows-doors',
                'name' => 'Aluminium Windows & Doors',
                'icon' => 'fa-door-open',
                'description' => 'Sliding, folding, and hinged aluminium windows and doors',
                'types' => ['Sliding', 'Folding', 'Hinged'],
            ],
            [
                'id' => 'glass-balustrades',
                'name' => 'Glass Balustrades',
                'icon' => 'fa-border-style',
                'description' => 'Modern and elegant glass balustrade solutions',
            ],
            [
                'id' => 'stainless-steel-balustrades',
                'name' => 'Stainless Steel Balustrades',
                'icon' => 'fa-grip-lines',
                'description' => 'Durable stainless steel balustrades for safety and style',
            ],
        ];
    }
}
