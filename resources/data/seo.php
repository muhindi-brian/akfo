<?php

declare(strict_types=1);

/**
 * Central SEO configuration — titles, descriptions, sitemap hints, structured data.
 * Override per-request in controllers for dynamic pages (e.g. news articles).
 */
return [
    'defaults' => [
        'title_suffix' => ' | Agnes Kagure Foundation',
        'site_name' => 'Agnes Kagure Foundation',
        'locale' => 'en_KE',
        'language' => 'en-KE',
        'twitter_site' => '@itsagneskagure',
        'keywords' => 'Agnes Kagure Foundation, AKFO, Kenya charity, Nairobi NGO, youth empowerment, GBV prevention, education scholarships, community health, women empowerment, donate Kenya',
        'og_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA82dF8w5MitLB4ZmEfSVNkTAYujCK0HY1DuAoIuO016PSdjz4fxR-rnEOd6gt-_WZ-uUzgII3WPZsuQkXHfhaSZLlRFDcBkpMRxvT6edkgGnHeRw5lSwebDDjep7dYBTRmbKOYE36LNCEzZKGXRdYgq-s6WsYkfKCJDarw9Thd87cbTE-8gy2VFT9nPu3OTuYtiNlOXqfkfd24U-hFKevOFW1r8UFVBvCqGMOkWKK0Bhbnz6hAG-widA',
        'og_type' => 'website',
        'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
    ],

    'organization' => [
        '@type' => 'NGO',
        'name' => 'Agnes Kagure Foundation',
        'alternateName' => 'AKFO',
        'description' => 'Kenyan NGO turning potentials into possibilities through livelihoods, education, gender equality, and health programmes across Nairobi.',
        'foundingDate' => '2019',
        'areaServed' => [
            '@type' => 'City',
            'name' => 'Nairobi',
            'containedInPlace' => ['@type' => 'Country', 'name' => 'Kenya'],
        ],
        'knowsAbout' => [
            'Youth empowerment',
            'Gender-based violence prevention',
            'Education scholarships',
            'Community health',
            'Women empowerment',
            'Livelihoods',
        ],
    ],

    'pages' => [
        '/' => [
            'title' => 'AKFO | Turning Potentials into Possibilities',
            'description' => 'Agnes Kagure Foundation empowers Nairobi through education, GBV prevention, youth hubs, scholarships, and health programmes. Donate or volunteer today.',
            'keywords' => 'Agnes Kagure Foundation, AKFO Kenya, Nairobi charity, donate, volunteer',
            'priority' => '1.0',
            'changefreq' => 'weekly',
            'breadcrumb' => [],
            'include_website_schema' => true,
        ],
        '/about' => [
            'title' => 'About Us',
            'description' => 'Learn about AKFO — our mission, vision, founder Agnes Kagure, and commitment to transparent, community-led development in Nairobi and Kenya.',
            'keywords' => 'About AKFO, Agnes Kagure, foundation mission, Nairobi NGO',
            'priority' => '0.9',
            'changefreq' => 'monthly',
            'breadcrumb' => [['name' => 'About Us', 'path' => '/about']],
        ],
        '/programs' => [
            'title' => 'Our Programs',
            'description' => 'Explore AKFO programmes: livelihoods, education, gender equality & GBV response, health & nutrition, special groups care, and innovation hubs in Nairobi.',
            'keywords' => 'AKFO programs, education Kenya, GBV campaign Nairobi, youth mentorship',
            'priority' => '0.9',
            'changefreq' => 'monthly',
            'breadcrumb' => [['name' => 'Programs', 'path' => '/programs']],
        ],
        '/impact' => [
            'title' => 'Our Impact',
            'description' => 'See how AKFO transforms lives across Nairobi\'s 85 wards — impact stories, transparency reports, and outcomes in education, health, and empowerment.',
            'keywords' => 'AKFO impact, community impact Nairobi, foundation transparency',
            'priority' => '0.8',
            'changefreq' => 'weekly',
            'breadcrumb' => [['name' => 'Impact', 'path' => '/impact']],
        ],
        '/news' => [
            'title' => 'Stories of Change',
            'description' => 'Latest AKFO news — GBV campaigns, scholarships, youth strategy, community health partnerships, and welfare programmes across Kenya.',
            'keywords' => 'AKFO news, Kenya foundation stories, GBV Nairobi news',
            'priority' => '0.8',
            'changefreq' => 'daily',
            'breadcrumb' => [['name' => 'Stories', 'path' => '/news']],
        ],
        '/partners' => [
            'title' => 'Partners & Alliances',
            'description' => 'Partner with the Agnes Kagure Foundation for CSR, strategic alliances, and collaborative development across Kenya. Submit a partnership inquiry today.',
            'keywords' => 'AKFO partners, corporate partnership Kenya, NGO collaboration',
            'priority' => '0.7',
            'changefreq' => 'monthly',
            'breadcrumb' => [['name' => 'Partners', 'path' => '/partners']],
        ],
        '/contact' => [
            'title' => 'Contact Us',
            'description' => 'Contact AKFO at Aristocrats House, Nairobi. Call +254 111 927 044 or email info@akfo.org for partnerships, donations, and programme inquiries.',
            'keywords' => 'contact AKFO, Agnes Kagure Foundation phone, info@akfo.org',
            'priority' => '0.8',
            'changefreq' => 'monthly',
            'breadcrumb' => [['name' => 'Contact', 'path' => '/contact']],
            'og_image' => null, // uses contact hero via controller
        ],
        '/donate' => [
            'title' => 'Donate',
            'description' => 'Donate to the Agnes Kagure Foundation and support scholarships, GBV survivor support, youth innovation hubs, and community health programmes in Nairobi, Kenya.',
            'keywords' => 'donate AKFO, charity donation Kenya, support Nairobi NGO',
            'priority' => '0.9',
            'changefreq' => 'monthly',
            'breadcrumb' => [['name' => 'Donate', 'path' => '/donate']],
        ],
        '/get-involved' => [
            'title' => 'Get Involved',
            'description' => 'Volunteer with the Agnes Kagure Foundation, become a brand ambassador, or request a corporate partnership. Join the movement for sustainable change in Kenya.',
            'keywords' => 'volunteer Kenya, AKFO volunteer, get involved NGO Nairobi',
            'priority' => '0.8',
            'changefreq' => 'monthly',
            'breadcrumb' => [['name' => 'Get Involved', 'path' => '/get-involved']],
        ],
        '/events' => [
            'title' => 'Events & Opportunities',
            'description' => 'Upcoming Agnes Kagure Foundation events, community health drives, leadership forums, and volunteer opportunities across Nairobi and Kenya.',
            'keywords' => 'AKFO events, community events Nairobi, foundation workshops',
            'priority' => '0.7',
            'changefreq' => 'weekly',
            'breadcrumb' => [['name' => 'Events', 'path' => '/events']],
        ],
        '/gallery' => [
            'title' => 'Impact Gallery',
            'description' => 'Photos and videos of community transformation through AKFO programmes — education, health, empowerment, and environmental restoration in Kenya.',
            'keywords' => 'AKFO gallery, foundation photos Kenya, impact stories visual',
            'priority' => '0.6',
            'changefreq' => 'monthly',
            'breadcrumb' => [['name' => 'Gallery', 'path' => '/gallery']],
        ],
        '/privacy' => [
            'title' => 'Privacy Policy',
            'description' => 'Privacy policy for the Agnes Kagure Foundation website — how we collect, use, and protect your personal information.',
            'priority' => '0.3',
            'changefreq' => 'yearly',
            'breadcrumb' => [['name' => 'Privacy Policy', 'path' => '/privacy']],
        ],
        '/terms' => [
            'title' => 'Terms of Service',
            'description' => 'Terms of service for using the Agnes Kagure Foundation website and online donation forms.',
            'priority' => '0.3',
            'changefreq' => 'yearly',
            'breadcrumb' => [['name' => 'Terms of Service', 'path' => '/terms']],
        ],
    ],
];
