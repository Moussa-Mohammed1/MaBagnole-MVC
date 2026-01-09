<?php
session_start();
require_once '/../../../../vendor/autoload.php';


?>


<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>MaBagnole - Article Details</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet" />
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Theme Config -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#277bf1",
                        "background-light": "#f6f7f8",
                        "background-dark": "#101722",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"],
                        "body": ["Noto Sans", "sans-serif"],
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-50 font-display antialiased selection:bg-primary/30 selection:text-primary">
    <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
        <!-- Top Navigation -->
        <header class="sticky top-0 z-50 flex items-center justify-between whitespace-nowrap border-b border-solid border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-background-dark/80 backdrop-blur-md px-10 py-3">
            <div class="flex items-center gap-8">
                <div class="flex items-center gap-4 text-slate-900 dark:text-white">
                    <div class="size-8 text-primary flex items-center justify-center">
                        <span class="material-symbols-outlined text-3xl">directions_car</span>
                    </div>
                    <h2 class="text-slate-900 dark:text-white text-xl font-bold leading-tight tracking-[-0.015em]">MaBagnole</h2>
                </div>
                <div class="hidden md:flex items-center gap-9">
                    <a class="text-slate-700 dark:text-slate-300 hover:text-primary transition-colors text-sm font-medium leading-normal" href="../cars.php">Home</a>
                    <a class="text-slate-700 dark:text-slate-300 hover:text-primary transition-colors text-sm font-medium leading-normal" href="../cars.php">Fleet</a>
                    <a class="text-slate-900 dark:text-white font-bold text-sm leading-normal" href="ArticlesList.php">Blog</a>
                    <a class="text-slate-700 dark:text-slate-300 hover:text-primary transition-colors text-sm font-medium leading-normal" href="../cars.php">Contact</a>
                </div>
            </div>
            <div class="flex flex-1 justify-end gap-6 items-center">
                <label class="hidden sm:flex flex-col min-w-40 !h-10 max-w-64 group">
                    <div class="flex w-full flex-1 items-stretch rounded-lg h-full bg-slate-100 dark:bg-slate-800 focus-within:ring-2 ring-primary/50 transition-all">
                        <div class="text-slate-400 flex border-none items-center justify-center pl-4 rounded-l-lg border-r-0">
                            <span class="material-symbols-outlined text-[20px]">search</span>
                        </div>
                        <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-slate-900 dark:text-white focus:outline-0 focus:ring-0 border-none bg-transparent h-full placeholder:text-slate-400 px-4 rounded-l-none border-l-0 pl-2 text-sm font-normal leading-normal" placeholder="Search articles..." />
                    </div>
                </label>
                <button class="relative bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 ring-2 ring-transparent hover:ring-primary/50 transition-all" data-alt="User profile avatar showing a smiling person" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA94SySautAg9IBug4A77RLRAtWKJG79OH7_msC20DNUsX54y6T8aCx83ZtmUezPGsU7iimC5UvZ7IwrbEa1ODPhNIdl7jvL0-wFRYV_o_UNxR4UlvjJ_Wj2EWPz4E63-kCOFAIx1gVbvymLwtBMlnwa22oxZ0PznXLXddc-6MSxeoURtr4M4KEMWl1w-xjEp_FhhRSU_manY0f-aCXO87u8OUpJIlrk5kef140oHI3JmvOw700Dnf_sL-19EEQgZdIITkODakWQOY");'></button>
            </div>
        </header>
        <!-- Main Content Layout -->
        <main class="flex-1 flex justify-center py-8 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col max-w-[800px] w-full gap-8">
                <!-- Breadcrumbs -->
                <nav class="flex flex-wrap gap-2 text-sm">
                    <a class="text-slate-500 hover:text-primary transition-colors" href="../cars.php">Home</a>
                    <span class="text-slate-400">/</span>
                    <a class="text-slate-500 hover:text-primary transition-colors" href="ArticlesList.php">Blog</a>
                    <span class="text-slate-400">/</span>
                    <a class="text-slate-500 hover:text-primary transition-colors" href="ArticlesList.php">Travel Tips</a>
                    <span class="text-slate-400">/</span>
                    <span class="text-slate-900 dark:text-white font-medium line-clamp-1">Road Trip Guide: The Best Scenic Routes in Provence</span>
                </nav>
                <!-- Article Header Section -->
                <article class="flex flex-col gap-6">
                    <!-- Title & Tags -->
                    <div class="flex flex-col gap-4">
                        <div class="flex gap-2 flex-wrap">
                            <span class="inline-flex items-center rounded-full bg-primary/10 px-3 py-1 text-xs font-medium text-primary ring-1 ring-inset ring-primary/20">TravelTips</span>
                            <span class="inline-flex items-center rounded-full bg-slate-100 dark:bg-slate-800 px-3 py-1 text-xs font-medium text-slate-600 dark:text-slate-300 ring-1 ring-inset ring-slate-500/10">France</span>
                            <span class="inline-flex items-center rounded-full bg-slate-100 dark:bg-slate-800 px-3 py-1 text-xs font-medium text-slate-600 dark:text-slate-300 ring-1 ring-inset ring-slate-500/10">LuxuryCars</span>
                        </div>
                        <h1 class="text-4xl md:text-5xl font-black leading-[1.1] tracking-tight text-slate-900 dark:text-white">
                            Road Trip Guide: The Best Scenic Routes in Provence
                        </h1>
                        <p class="text-lg text-slate-500 dark:text-slate-400 leading-relaxed">
                            Discover the hidden gems of the French countryside, from lavender fields to coastal cliffs, in your perfect rental ride.
                        </p>
                    </div>
                    <!-- Author & Actions Bar -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between border-y border-slate-200 dark:border-slate-800 py-4 gap-4">
                        <div class="flex items-center gap-3">
                            <div class="size-12 rounded-full bg-slate-200 bg-cover bg-center" data-alt="Portrait of the author Sarah Jenkins" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDKIT-7--Tj74DMyR2Cc44Sn0bn5dHScweoq7u0ojU7V_sb1ElzZc_ffBQpJIUso2ABC2p-nCSt7vwuTc2Lymu4I730GJK4YT-lz9nwDkPZlDjVI2uG22e7DeGKXqankZB8unC50BTeyFzJOn81S8y1Oo7CeBaULJ3Cl2RnPKLP1M3MHBGc7dXHJgNbhU1Urt3iiiIpa9prjd1S-Xj11iBb_D8iTyqoIxCV1WmlQpn7hXfKKG858yKAzdpgsH2CCX8KlgqG6KVNZ74");'></div>
                            <div class="flex flex-col">
                                <span class="text-slate-900 dark:text-white font-bold leading-none">Sarah Jenkins</span>
                                <span class="text-slate-500 dark:text-slate-400 text-sm mt-1">Oct 24, 2023 • 5 min read</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <button class="flex items-center gap-2 px-4 py-2 rounded-full bg-slate-100 dark:bg-slate-800 hover:bg-red-50 hover:text-red-500 dark:hover:bg-red-900/20 dark:hover:text-red-400 transition-colors group">
                                <span class="material-symbols-outlined text-[20px] group-hover:scale-110 transition-transform">favorite_border</span>
                                <span class="text-sm font-medium">Save</span>
                            </button>
                            <button class="flex items-center gap-2 px-4 py-2 rounded-full bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors">
                                <span class="material-symbols-outlined text-[20px]">share</span>
                                <span class="text-sm font-medium">Share</span>
                            </button>
                            <a class="flex items-center gap-2 px-4 py-2 rounded-full bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 transition-colors text-slate-600 dark:text-slate-300" href="#comments">
                                <span class="material-symbols-outlined text-[20px]">chat_bubble</span>
                                <span class="text-sm font-medium">14</span>
                            </a>
                        </div>
                    </div>
                    <!-- Feature Image -->
                    <div class="relative w-full aspect-video rounded-xl overflow-hidden shadow-sm">
                        <div class="absolute inset-0 bg-cover bg-center" data-alt="A convertible car driving on a winding road through lavender fields in Provence during sunset" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBIAO-y6sCJObkrppvVEZhID0nNKyMfWsIFW8FpU4toO180_1E6lyg4Gpmuz2HOXgdoSJmoFKvMOtbqAsYn2dleHsAz4DLF-ROOkBnmn20zpdyxm5KONP0hUJCAiQZZN784TobvgC7Pw75WseMNpZ84n2oXuE2Emv5pbcXmlFH8sRr_9J7Wd2RTw9KHqzjx0Bedu5httT3VsRUKjGg8vzmzT6VNn35i5t_pO29TwaTjLin7UXONOZcog9nxC0wLIHOMhv6CNgLfNZc");'></div>
                    </div>
                    <!-- Content Body -->
                    <div class="prose prose-lg prose-slate dark:prose-invert max-w-none mt-4 font-body">
                        <p>
                            Provence is a region that demands to be explored at a leisurely pace. The winding roads, the scent of pine and lavender in the air, and the golden light that has inspired artists for centuries create the perfect backdrop for a road trip. Whether you're behind the wheel of a sporty convertible or a comfortable SUV from our <a class="text-primary no-underline hover:underline" href="../cars.php">premium fleet</a>, these routes promise an unforgettable journey.
                        </p>
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white mt-8 mb-4">The Lavender Route: Valensole to Sault</h2>
                        <p>
                            Starting in late June, the Plateau de Valensole transforms into a sea of purple. This route takes you through the heart of lavender country. We recommend starting early in the morning to catch the sunrise over the fields—a photographer's dream.
                        </p>
                        <div class="my-8 rounded-xl overflow-hidden bg-slate-100 dark:bg-slate-800 p-6 flex flex-col md:flex-row gap-6 items-center border border-slate-200 dark:border-slate-700">
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Recommended Car: Mercedes-Benz C-Class Cabriolet</h3>
                                <p class="text-sm text-slate-600 dark:text-slate-300 mb-4">Perfect for soaking in the sun and scents of the region. Provides a smooth ride on winding country roads.</p>
                                <button class="bg-primary hover:bg-blue-600 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">Check Availability</button>
                            </div>
                            <div class="w-full md:w-48 aspect-[4/3] rounded-lg bg-cover bg-center" data-alt="Side view of a white luxury convertible car" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA7i5r6IM18q1sNSXkXadN5WUf54EJDs__pdpeeIbdBz1kshkYMiTXvXsMNBKlMCs1qdGU2mJ0aNJuEsjm7t1bGGgvtkBJBD_wnCV0fuj6C1dCRnHzmyml6CghuEGKUW7nf8bg4btZ3Em32Xz5TliCVFK6O-NcL4pFSXiC-52ChmfTpsB000uC6l0tQi6PDpl9K6BwS1vNPYTNJuj0J1OR7uTm-fUJvQgfAgSgCKCYALjVYqVsVPeUioBMuQYGY0AKpXtsKAnOX6Y8");'></div>
                        </div>
                        <p>
                            Don't forget to stop at the small distilleries along the way. Many local farmers open their doors to visitors, explaining the process of extracting essential oils from the flowers.
                        </p>
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white mt-8 mb-4">The Coastal Corniche: Cassis to La Ciotat</h2>
                        <p>
                            For those who prefer the sparkle of the Mediterranean, the Route des Crêtes offers breathtaking views. It's the highest maritime cliff road in Europe. Be prepared for some steep climbs and sharp turns—this is where having a car with good handling really pays off.
                        </p>
                        <blockquote class="border-l-4 border-primary pl-4 italic text-slate-700 dark:text-slate-300 my-6">
                            "The view from Cap Canaille is simply unmatched. You can see the calanques stretching out into the turquoise water."
                        </blockquote>
                        <p>
                            Make sure to pack a picnic basket. There are several viewpoints (belvédères) where you can pull over safely and enjoy a baguette with some local cheese while watching the boats far below.
                        </p>
                    </div>
                    <!-- Tags Footer -->
                    <div class="flex flex-wrap gap-2 pt-8 border-t border-slate-200 dark:border-slate-800 mt-8">
                        <span class="text-sm text-slate-500 font-medium mr-2">Tags:</span>
                        <a class="text-sm text-slate-600 dark:text-slate-300 hover:text-primary transition-colors" href="ArticlesList.php">#RoadTrip</a>
                        <a class="text-sm text-slate-600 dark:text-slate-300 hover:text-primary transition-colors" href="ArticlesList.php">#Provence</a>
                        <a class="text-sm text-slate-600 dark:text-slate-300 hover:text-primary transition-colors" href="ArticlesList.php">#SummerTravel</a>
                    </div>
                </article>
                <!-- Comments Section -->
                <section class="bg-white dark:bg-slate-900/50 rounded-xl p-6 md:p-8 shadow-sm ring-1 ring-slate-200 dark:ring-slate-800 mt-4" id="comments">
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">Discussion <span class="text-slate-400 font-normal text-lg ml-1">(14)</span></h3>
                        <!-- Sort Dropdown trigger -->
                        <button class="flex items-center gap-1 text-sm font-medium text-slate-500 hover:text-slate-800 dark:hover:text-slate-200">
                            Newest
                            <span class="material-symbols-outlined text-[18px]">expand_more</span>
                        </button>
                    </div>
                    <!-- Input Area -->
                    <div class="flex gap-4 mb-10">
                        <div class="shrink-0 size-10 rounded-full bg-slate-200 bg-cover bg-center hidden sm:block" data-alt="Current user avatar" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBBD7aTIyQnxh8PCGCelhO7j7C6fV_wrBMy6Qj7vBtUvFtiI7C9OQscsN7MNXEbUI5xuygjc9BPWctPts2dAVTJWLAocyS067lkplnAMwbs9DzmOVfh4VQ_0IiIY5g7vUXlHAQHN70EE7UMnD7vj1oMcsedMPY3AAVbpNYMkBbiHOzKndp-7A30u9T1fZ15TWLd8GANiBafJFoXGxWimVebuq0o3sUEGXKb26ZpFqgR48hrq_Tt4eBo9_X_K3zCax4ZLKJORISemR8");'></div>
                        <div class="flex-1">
                            <textarea class="w-full rounded-lg bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 text-slate-900 dark:text-white placeholder:text-slate-400 focus:ring-2 focus:ring-primary focus:border-transparent min-h-[100px] p-4 resize-y text-sm" placeholder="Share your thoughts or ask a question..."></textarea>
                            <div class="flex justify-end mt-2">
                                <button class="bg-primary hover:bg-blue-600 text-white font-medium px-6 py-2 rounded-lg transition-colors text-sm">Post Comment</button>
                            </div>
                        </div>
                    </div>
                    <!-- Comments List -->
                    <div class="flex flex-col gap-8">
                        <!-- Comment 1 -->
                        <div class="flex gap-4 group/comment">
                            <div class="shrink-0 size-10 rounded-full bg-slate-200 bg-cover bg-center" data-alt="Avatar of user Marcus T" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAwOQSfKw8oq3op-7sNz-Z4SN-3oa2xDNOQXMBbXps2er3HffOAE2PTWPt5kz2Pb65Kc1m0bfa0AymKw7OJ0Dzim6cbO_RcGo1FElGXr_waQSOzAqYRbGqn5rSwyFi5Y6YVPDLEevUO6RxUcu2RiYGcMtvGBvK_GLrjUITpvCboRtalOx-viOzTuwan-A2ZhnnYn9MGKc4n8AOMVbC9ZH5o7P66FmUjPV7jSy8QlocAer5aAZsgrGUKo64vYexHFTmj4GlVrYfWgy0");'></div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-slate-900 dark:text-white">Marcus T.</span>
                                        <span class="text-xs text-slate-400">2 days ago</span>
                                    </div>
                                </div>
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">
                                    Great tip about the coastal road! I drove the Route des Crêtes last summer and it was unforgettable. Would you recommend the C-Class for that specific route as well, or something smaller?
                                </p>
                                <div class="flex items-center gap-4 mt-3">
                                    <button class="flex items-center gap-1 text-slate-400 hover:text-primary text-xs font-medium transition-colors">
                                        <span class="material-symbols-outlined text-[16px]">thumb_up</span>
                                        12
                                    </button>
                                    <button class="text-slate-400 hover:text-primary text-xs font-medium transition-colors">Reply</button>
                                </div>
                            </div>
                        </div>
                        <!-- Comment 2 (Nested/Reply style visual) -->
                        <div class="flex gap-4 ml-0 sm:ml-14 pl-4 border-l-2 border-slate-100 dark:border-slate-800">
                            <div class="shrink-0 size-8 rounded-full bg-slate-200 bg-cover bg-center" data-alt="Avatar of author Sarah Jenkins" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuC75j7XLl1_dqm1ySg6kAdAU9gNxLUcJKdxeWkxwmKlxRNbsoHgbegut61PqHEf_F9gVl9ViONSbSREtLV71wbGbUOdmg8erlBB2ro7E3FwBt4f9_ZRv2sbK35C4oaJH0ssFWH5rTu75xrq9KGCY0IUmWQ_4T9dOP4UchA9_-pnqmYDAfKNc14qLGsXdVZ3LTBs6kZuDMp5Tbh7ryDxLzQez7I-dHlfASyRpHdetCwUETEsFtPfhvmgZfZwmxzn_mJC4oRVF7vqKIA");'></div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-primary">Sarah Jenkins</span>
                                        <span class="bg-primary/10 text-primary text-[10px] px-1.5 py-0.5 rounded font-bold uppercase tracking-wide">Author</span>
                                        <span class="text-xs text-slate-400">1 day ago</span>
                                    </div>
                                </div>
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">
                                    Hi Marcus! The C-Class is manageable, but if you want to zip around the corners more easily, a Mini Cooper Convertible from our fleet is incredibly fun on those tight turns!
                                </p>
                                <div class="flex items-center gap-4 mt-3">
                                    <button class="flex items-center gap-1 text-slate-400 hover:text-primary text-xs font-medium transition-colors">
                                        <span class="material-symbols-outlined text-[16px]">thumb_up</span>
                                        4
                                    </button>
                                    <button class="text-slate-400 hover:text-primary text-xs font-medium transition-colors">Reply</button>
                                </div>
                            </div>
                        </div>
                        <!-- Comment 3 -->
                        <div class="flex gap-4">
                            <div class="shrink-0 size-10 rounded-full bg-slate-200 bg-cover bg-center" data-alt="Avatar of user Elena R" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCasWzvenwANuxGrvpBYxKhC2BhhVMmyL3LbhXEmQ3tJ5ua0X5Kt8OK6ZACetT-4y8kKkzw4_hkN5qvPvCPXsgdVyodPt4rg7_8XrmsIMO-b9NxQbcHMHMc9FWU_RVIGpKUvCPOjZc6HpUdzELs-kefkVKGFG-CJ9hbQ7JCWTNkJW4HNG3HONU43xS1FcoDwtyA1IQIu2x10GX6RqeXNMSp10x8YoowOLm5F90hYgDjvAPSGhXCqe6P4HUjJb9Tt_xQ0Ks5MZE6uG4");'></div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-slate-900 dark:text-white">Elena R.</span>
                                        <span class="text-xs text-slate-400">Oct 25, 2023</span>
                                    </div>
                                </div>
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">
                                    Added this to my favorites! Planning a trip in September. Is that still a good time for Lavender or is it all harvested by then?
                                </p>
                                <div class="flex items-center gap-4 mt-3">
                                    <button class="flex items-center gap-1 text-slate-400 hover:text-primary text-xs font-medium transition-colors">
                                        <span class="material-symbols-outlined text-[16px]">thumb_up</span>
                                        2
                                    </button>
                                    <button class="text-slate-400 hover:text-primary text-xs font-medium transition-colors">Reply</button>
                                </div>
                            </div>
                        </div>
                        <button class="w-full py-3 text-sm font-medium text-slate-500 hover:text-primary bg-slate-50 dark:bg-slate-800/50 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors border border-dashed border-slate-200 dark:border-slate-700">
                            Load more comments
                        </button>
                    </div>
                </section>
                <!-- Related Articles -->
                <section class="mt-8 border-t border-slate-200 dark:border-slate-800 pt-10">
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">You might also like</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Card 1 -->
                        <a class="group flex flex-col gap-3" href="article.php">
                            <div class="w-full aspect-[4/3] rounded-lg bg-cover bg-center overflow-hidden" data-alt="Scenic view of the Amalfi coast in Italy" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCOHPZwspv9DImYDVXLOt2OakhkzPvBA7UU9Cft8KuiQdTp6SCxd4XY0Eek1C-RhSJhmO_KTxhNOe3MJLh_Or2isOYfvpaR27s8-_EkcwrXc_FTNmGpAhoJobaQOOnijvEwKrmvh90Yp52tJ3oKCAbhGt7nNuoUlaWscZgtiHoEmZSlKJmkW59SYnl20FNHI2h59lqX4Ehx3bYRimtgRIQ8NVBuHNnCdmQgBzqljwXhc1WtcNqs-DnM7qDK-aGpRflXqZ_XbgQRS74");'>
                                <div class="w-full h-full bg-black/0 group-hover:bg-black/10 transition-colors"></div>
                            </div>
                            <div class="flex flex-col gap-1">
                                <span class="text-xs font-bold text-primary uppercase tracking-wider">Italy</span>
                                <h4 class="text-base font-bold text-slate-900 dark:text-white group-hover:text-primary transition-colors leading-snug">Driving the Amalfi Coast: A Survival Guide</h4>
                                <span class="text-xs text-slate-500">4 min read</span>
                            </div>
                        </a>
                        <!-- Card 2 -->
                        <a class="group flex flex-col gap-3" href="article.php">
                            <div class="w-full aspect-[4/3] rounded-lg bg-cover bg-center overflow-hidden" data-alt="A rugged 4x4 vehicle in the Scottish Highlands" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA4g09EcdPZ2U-nONmuX9Zr8_EReDRzJwrQ8x31BcwmQpyBHQWS3usPo34jIjMKyk6B_tI1M4gAiG7ibeE71pVeKQe0pEoWRs9AOqw3WhhBhWcLVg2VvwHRha98EE-0NCxiK2X5ZDNexzNye5DCDCH1VBL6KLWWGczQXgE6Smh4DmlC0gmk2SXHofDFCWZtyG_Xn0MeTYvOrMnfvrfWxr7UbHohWgkKS2GA0EcD2HyGb9J3H71anaDYU4D5RGJsoz3TRde5PAWM9mQ");'>
                                <div class="w-full h-full bg-black/0 group-hover:bg-black/10 transition-colors"></div>
                            </div>
                            <div class="flex flex-col gap-1">
                                <span class="text-xs font-bold text-primary uppercase tracking-wider">Scotland</span>
                                <h4 class="text-base font-bold text-slate-900 dark:text-white group-hover:text-primary transition-colors leading-snug">Highlands Adventure: Best 4x4 Routes</h4>
                                <span class="text-xs text-slate-500">7 min read</span>
                            </div>
                        </a>
                        <!-- Card 3 -->
                        <a class="group flex flex-col gap-3" href="article.php">
                            <div class="w-full aspect-[4/3] rounded-lg bg-cover bg-center overflow-hidden" data-alt="A luxury sedan parked in front of a modern winery in Napa Valley" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBqJHTdJHExx0D7a1c6nqie0gqLQrLpIcM8AYujE7OXgRsa7KiRT0xzsVJ697FaC6ZQRzsffdTVEiTGDgbTS1JwEupxwUsT4YFBLkOn58ePLLNO5x7xK0kAvcwEol9B-arpxvwPlBh4pp5Hq9hJKqVwhBHXubLwgS1Qy2MQLqPs4OsVdcwL9YZrzSVQmpUJ1apU6u5e4810zqCXP6XmTWZXSeOuZEtrwpPGFsMxQxqPOA70-0tiYYUViAzFzdTKX-JKB9twMZpIaHY");'>
                                <div class="w-full h-full bg-black/0 group-hover:bg-black/10 transition-colors"></div>
                            </div>
                            <div class="flex flex-col gap-1">
                                <span class="text-xs font-bold text-primary uppercase tracking-wider">USA</span>
                                <h4 class="text-base font-bold text-slate-900 dark:text-white group-hover:text-primary transition-colors leading-snug">Napa Valley Wine Tour by Car</h4>
                                <span class="text-xs text-slate-500">6 min read</span>
                            </div>
                        </a>
                    </div>
                </section>
            </div>
        </main>
        <!-- Simple Footer -->
        <footer class="mt-20 border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-background-dark py-8 px-10">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-2 text-slate-900 dark:text-white">
                    <span class="material-symbols-outlined text-xl text-primary">directions_car</span>
                    <span class="font-bold text-lg">MaBagnole</span>
                </div>
                <div class="text-slate-500 text-sm">
                    © 2024 MaBagnole Inc. All rights reserved.
                </div>
            </div>
        </footer>
    </div>
</body>

</html>